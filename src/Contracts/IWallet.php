<?php

namespace PostMix\LaravelBitaps\Contracts;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Entities\WalletState;
use PostMix\LaravelBitaps\Models\Address;
use PostMix\LaravelBitaps\Models\Wallet;

interface IWallet
{
    /**
     * Create a new wallet
     *
     * @param string $password
     * @param string|null $callbackLink
     *
     * @return Wallet
     */
    public function create(
        string $password,
        string $callbackLink = null
    ): Wallet;

    /**
     * Create a new payment address of the wallet
     *
     * @param Wallet $wallet
     * @param string|null $callbackLink
     * @param int $confirmations
     *
     * @return Address
     */
    public function createPaymentAddress(
        Wallet $wallet,
        string $callbackLink = null,
        int $confirmations = 3
    ): Address;

    /**
     * Make a new payment to receivers
     * Format of the receivers list: [{"address": "...", "amount": 123}, ...]
     *
     * @param Wallet $wallet
     * @param array $receiversList
     * @param string|null $message
     *
     * @return Collection
     */
    public function sendPayment(
        Wallet $wallet,
        array $receiversList,
        string $message = null
    ): Collection;

    /**
     * Get a state of the provided wallet
     *
     * @param Wallet $wallet
     *
     * @return WalletState
     */
    public function getState(Wallet $wallet): WalletState;

    /**
     * Get list of the transactions by specified wallet
     *
     * @param Wallet $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return array
     */
    public function getTransactions(
        Wallet $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): array;

    /**
     * Get list of the addresses by specified wallet
     *
     * @param Wallet $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getAddresses(
        Wallet $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection;

    /**
     * Transactions of the wallet's address
     *
     * @param Wallet $wallet
     * @param Address $address
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return array
     */
    public function getTransactionsByAddress(
        Wallet $wallet,
        Address $address,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): array;

    /**
     * Get daily statistic of the specified wallet
     *
     * @param Wallet $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getDailyStatistic(
        Wallet $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection;
}
