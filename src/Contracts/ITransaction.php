<?php


namespace PostMix\LaravelBitaps\Contracts;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Models\Transaction;

interface ITransaction
{
    /**
     * @param $data
     * @return Transaction
     */
    public function newTransaction(Transaction $transaction, $data);

    /**
     * @param $currency
     * @return int
     */
    public function getCurrencyId($currency):int;

    /**
     * @param $address
     * @return string
     */
    public function getUserByAdrress($address):string ;

}