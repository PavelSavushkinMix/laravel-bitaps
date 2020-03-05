<?php


namespace App\Services;

use PostMix\LaravelBitaps\Models\Transaction;
use \Carbon\Carbon;


class BitapsTransaction
{
    public function newTransaction($data)
    {
        $date = Carbon::now(); //$date->getTimestamp()
        $status = $data['confirmations'] < 3 ? 'pending' : 'confirmed';


        $transaction = new Transaction;

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
    }
}
