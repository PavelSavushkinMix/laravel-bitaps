<?php

namespace PostMix\LaravelBitaps\Services;

use PostMix\LaravelBitaps\Contracts\ITransaction;
use PostMix\LaravelBitaps\Models\Transaction;
use \Carbon\Carbon;
use Webpatser\Uuid\Uuid;

class BitapsTransaction implements ITransaction
{

    /**
     * @param Transaction $transaction
     * @param $data
     * @return Transaction|void
     */
    public function makeTransaction(Transaction $transaction, $data): Transaction
    {
        $date = Carbon::now();
        $status = $data['confirmations'] < env('BITAPS_CONFIRMATIONS_TX') ? 'pending' : 'confirmed';

        if ($data['confirmations'] == 0) {

            $transaction->address = $data['address'];
            $transaction->miner_fee = $data['payout_miner_fee'] ? $data['payout_miner_fee'] : 0;
            $transaction->tx_hash = $data['tx_hash'];
            $transaction->service_fee = $data['payout_service_fee'] ? $data['payout_service_fee'] : 0;
            $transaction->timestamp = $date->date;
            $transaction->time = $date->date;
            $transaction->status = $status;
            $transaction->hash = $data['code'];
            $transaction->amount = $data['amount'];
            $transaction->tx_out = $data['tx_out'];
            $transaction->notification = '';
            $transaction->created_at = $date->getTimestamp();
            $transaction->updated_at = $date->getTimestamp();
            $transaction->save();
        } elseif ($data['confirmations'] > 0) {
            $transaction = Transaction::where('address', $data['address'])
                ->where('tx_hash', $data['tx_hash'])
                ->update([
                    'status' => $status,
                    'hash' => $data['code'],
                ]);

            if ($status === 'confirmed') {
                $currency = $data['currency'] === 'tBTC' ? 'BTC' : $data['currency'];
                $currencyId = $this->getCurrencyId($currency)->id;
                $userId = $this->getUserByAddress($data['address']);

                $transaction->create([
                    'to_user_id' => $userId,
                    'currency_id' => $currencyId,
                    'trx_id' => Uuid::generate(),
                    'amount' => $data['amount'],
                ]);
            }
        }

        return $transaction;
    }

    /**
     * @param $currency
     * @return mixed
     * return current Currency Id
     */
    public function getCurrencyId($currency): int
    {
        return \App\Models\Currency::where('code', $currency)->first();
    }

    /**
     * @param $address
     * @return mixed
     * return current User Id by Address
     */
    public function getUserByAddress($address): string
    {
        $result = \PostMix\LaravelBitaps\Models\Address::where('address', $address)->first()->id;
        return \App\Models\UserBitapsAddress::where('bitaps_address_id', $result)->first()->user_id;
    }
}
