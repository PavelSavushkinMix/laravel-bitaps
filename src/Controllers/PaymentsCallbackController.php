<?php

namespace PostMix\LaravelBitaps\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use PostMix\LaravelBitaps\Events\TransactionConfirmed;
use PostMix\LaravelBitaps\Models\Transaction;

class PaymentsCallbackController extends Controller
{
    /**
     * Return hash from the request
     *
     * @param Request $request
     */
    public function getCallback(Request $request)
    {
        echo $request->get('hash');

        return response()->noContent(Response::HTTP_OK);
    }

    /**
     * Process callback of the Bitaps service
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCallback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|exists:bitaps_addresses',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => trans('bitaps::messages.address_is_not_valid'),
            ]);
        }

        if ($request->get('event') === 'unconfirmed') {
            Transaction::create([
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
        } else if ((int)$request->get('confirmations') > 0) {
            /** @var Transaction $trx */
            $trx = Transaction::where('address', $request->get('address'))
                ->where('tx_hash', $request->get('tx_hash'))
                ->first();
            $trx->update([
                'status' => $request->get('event'),
                'hash' => $request->get('code'),
            ]);

            if ($request->get('event') === 'confirmed') {
                event(new TransactionConfirmed($trx));
            } else if ($request->get('event') === 'payout confirmed' && $request->filled('payout_tx_hash')) {
                $trx->outs()->create([
                    'amount' => $request->get('amount'),
                    'tx_out' => $request->get('tx_out'),
                    'address' => $request->get('address'),
                    'payout_tx_hash' => $request->get('payout_tx_hash'),
                ]);
            }
        }

        return response()->json(['invoice' => $request->get('invoice')]);
    }
}
