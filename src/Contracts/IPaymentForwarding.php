<?php

namespace PostMix\LaravelBitaps\Contracts;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Entities\AddressState;
use PostMix\LaravelBitaps\Models\Address;

interface IPaymentForwarding
{
    /**
     * Create a new forwarding address
     *
     * @param string $forwardingAddress
     * @param int $confirmations
     *
     * @return Address
     */
    public function createAddress(
        string $forwardingAddress,
        int $confirmations = 3
    ): Address;

    /**
     * Request status and statistics of the payment address.
     *
     * @param Address $address
     *
     * @return AddressState
     */
    public function getAddressState(Address $address): AddressState;

    /**
     * Request list of payment address transactions.
     *
     * @param Address $address
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTransactionsByAddress(
        Address $address,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection;
}
