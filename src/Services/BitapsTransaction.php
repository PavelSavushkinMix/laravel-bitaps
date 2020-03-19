<?php

namespace PostMix\LaravelBitaps\Services;

use PostMix\LaravelBitaps\Contracts\ITransaction;
use PostMix\LaravelBitaps\Models\Transaction;
use PostMix\LaravelBitaps\Models\TransactionOut;
use PostMix\LaravelBitaps\Events\TransactionConfirmed;
use PostMix\LaravelBitaps\Entities\AddressState;

class BitapsTransaction implements ITransaction
{

    /**
     * @param Transaction $transaction
     * @param $data
     * @return Transaction
     * @throws \Exception
     */
    public function makeTransaction(Transaction $transaction, $data): Transaction
    {
//        $date = Carbon::now();
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $status = $data['confirmations'] < env('BITAPS_CONFIRMATIONS_TX') ? 'pending' : 'confirmed';
        $getDataByAddress = $this->getDataByAddress($data['address']);
        $forwarding_address = $getDataByAddress['forwarding_address'] ? $getDataByAddress['forwarding_address'] : $getDataByAddress['address'];

        if ($data['event'] === "unconfirmed") {  // && $data['address'] !== $forwarding_address

            $transaction->address = $data['address'];
            $transaction->miner_fee = $data['payout_miner_fee'] ? $data['payout_miner_fee'] : 0;
            $transaction->tx_hash = $data['tx_hash'];
            $transaction->service_fee = $data['payout_service_fee'] ? $data['payout_service_fee'] : 0;
            $transaction->timestamp = $date;
            $transaction->time = $time;
            $transaction->status = $data['event'];
            $transaction->hash = $data['code'];
            $transaction->amount = $data['amount'];
            $transaction->tx_out = $data['tx_out'];
            $transaction->notification = '';
            $transaction->save();

        } elseif ($data['confirmations'] > 0) {
            $getTrx = $transaction->where('address', $data['address'])
                ->where('tx_hash', $data['tx_hash'])->update([
                    'status' => $data['event'],
                    'hash' => $data['code'],
                ]);            

            if ($data['event'] === 'confirmed' && $data['address'] === $forwarding_address) {
                $address = $this->getAddressByTxHash($data['tx_hash']);
                $currency = $data['currency'] === 'tBTC' ? 'BTC' : $data['currency'];
                $dataEvent = [
                    'amount' => $data['amount'],
                    'currency' => $currency,
                    'id_address' => $this->getAddressIdByAddress($address),
                ];
                
                event(new TransactionConfirmed($dataEvent));
            } elseif ($data['event'] === 'payout confirmed' && $data['payout_tx_hash']) {
                $transactionOut = new TransactionOut();

                $transactionOut->create([
                    'transaction_id' => $getTrx->id,
                    'amount' => $data['amount'],
                    'tx_out' => $data['tx_out'],
                    'address' => $data['address'],
                    'payout_tx_hash' => $data['payout_tx_hash'],
                ]);
            }
        }

        return $transaction;
    }

    /**
     * @param $id
     * @return int
     */
    public function getAddressIdByAddress($address): int
    {
        $result = \PostMix\LaravelBitaps\Models\Address::where('address', $address)->first()->id;
        return $result;
    }

    /**
     * @param $txHash
     * @return string
     */
    public function getAddressByTxHash($txHash): string
    {
        $result = \PostMix\LaravelBitaps\Models\TransactionOut::where('payout_tx_hash', $txHash)->first()->address;
        return \PostMix\LaravelBitaps\Models\TransactionOut::where('payout_tx_hash', $txHash)->first()->address;
    }

    /**
     * @param $address
     * @return array
     */
    public function getDataByAddress($address): array
    {
        $result = \PostMix\LaravelBitaps\Models\Address::where('address', $address)->first();
        return $result->attributesToArray();
    }
}
