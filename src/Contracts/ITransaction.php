<?php

namespace PostMix\LaravelBitaps\Contracts;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Models\Transaction;

interface ITransaction
{
    /**
     * @param Transaction $transaction
     * @param $data
     * @return Transaction
     */
    public function makeTransaction(Transaction $transaction, $data): Transaction;

    /**
     * @param $address
     * @return int
     */
    public function getAddressIdByAddress($address): int;

    /**
     * @param $txHash
     * @return string
     */
    public function getAddressByTxHash($txHash): string;

    /**
     * @param $address
     * @return array
     */
    public function getDataByAddress($address): array;
}
