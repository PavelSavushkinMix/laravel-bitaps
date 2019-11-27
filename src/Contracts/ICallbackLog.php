<?php

namespace PostMix\LaravelBitaps\Contracts;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Models\Address;
use PostMix\LaravelBitaps\Models\Transaction;

interface ICallbackLog
{
    /**
     * Callback log for payment address
     *
     * @param Address $address
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getAddressCallbackLog(
        Address $address,
        int $limit = null,
        int $page = null
    ): Collection;

    /**
     * Callback logs for payment transaction hash
     *
     * @param Address $address
     * @param Transaction $transaction
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getTransactionCallbackLog(
        Address $address,
        Transaction $transaction,
        int $limit = null,
        int $page = null
    ): Collection;
}
