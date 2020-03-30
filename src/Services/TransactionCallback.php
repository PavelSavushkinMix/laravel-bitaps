<?php

namespace PostMix\LaravelBitaps\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PostMix\LaravelBitaps\Events\ConfirmedTransaction;
use PostMix\LaravelBitaps\Events\PayoutConfirmedTransaction;
use PostMix\LaravelBitaps\Events\PayoutSentTransaction;
use PostMix\LaravelBitaps\Events\PendingTransaction;
use PostMix\LaravelBitaps\Events\UnconfirmedTransaction;
use PostMix\LaravelBitaps\Models\Transaction;

class TransactionCallback
{
    /**
     * Unconfirmed transaction event key
     */
    const TRANSACTION_UNCONFIRMED_EVENT = 'unconfirmed';

    /**
     * Pending transaction event key
     */
    const TRANSACTION_PENDING_EVENT = 'pending';

    /**
     * Confirmed transaction event key
     */
    const TRANSACTION_CONFIRMED_EVENT = 'confirmed';

    /**
     * Payout sent transaction event key
     */
    const TRANSACTION_PAYOUT_SENT_EVENT = 'payout sent';

    /**
     * Payout confirmed transaction event key
     */
    const TRANSACTION_PAYOUT_CONFIRMED_EVENT = 'payout confirmed';

    /**
     * Create a transaction based on request's data
     *
     * @param Request $request
     *
     * @return Transaction
     */
    private function makeTransaction(Request $request): Transaction
    {
        return Transaction::create([
            'address' => $request->get('address'),
            'miner_fee' => $request->get('payout_miner_fee') ?? 0,
            'tx_hash' => $request->get('tx_hash'),
            'service_fee' => $request->get('payout_service_fee') ?? 0,
            'timestamp' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'status' => $request->get('event'),
            'hash' => $request->get('code'),
            'amount' => $request->get('amount'),
            'tx_out' => $request->get('tx_out'),
            'notification' => '',
        ]);
    }

    /**
     * Handle callback for payment
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(Request $request): JsonResponse
    {
        $event = $request->get('event');
        if (strpos($event, self::TRANSACTION_PENDING_EVENT) !== false) {
            $event = self::TRANSACTION_PENDING_EVENT;
        }
        if (config('bitaps.debug')) {
            \Log::channel('stack')->debug('Income transaction: ' . json_encode($request->all()));
        }

        switch ($event) {
            case self::TRANSACTION_UNCONFIRMED_EVENT:
                $trx = $this->makeTransaction($request);

                event(new UnconfirmedTransaction($trx));
                break;
            case self::TRANSACTION_PENDING_EVENT:
                $trx = $this->updateTransactionByRequest($request);

                event(new PendingTransaction($trx));
                break;
            case self::TRANSACTION_CONFIRMED_EVENT:
                $trx = $this->updateTransactionByRequest($request);

                event(new ConfirmedTransaction($trx));
                break;
            case self::TRANSACTION_PAYOUT_SENT_EVENT:
                $trx = $this->makeTransaction($request);

                event(new PayoutSentTransaction($trx));
                break;
            case self::TRANSACTION_PAYOUT_CONFIRMED_EVENT:
                $trx = $this->updateTransactionByRequest($request);
                $trx->outs()->create([
                    'amount' => $request->get('amount'),
                    'tx_out' => $request->get('tx_out'),
                    'address' => $request->get('address'),
                    'payout_tx_hash' => $request->get('payout_tx_hash'),
                ]);

                event(new PayoutConfirmedTransaction($trx));
                break;
        }

        if (!isset($trx)) {
            throw new \Exception('Wrong event');
        }

        return response()->json(['invoice' => $request->get('invoice')]);
    }

    /**
     * Update transaction's data based on the request
     *
     * @param Request $request
     *
     * @return Transaction
     */
    private function updateTransactionByRequest(Request $request): Transaction
    {
        /** @var Transaction $trx */
        $trx = Transaction::where('tx_hash', $request->get('tx_hash'))
            ->first();
        $trx->update([
            'status' => $request->get('event'),
            'service_fee' => $request->get('payout_service_fee') ?? 0,
        ]);

        return $trx;
    }
}
