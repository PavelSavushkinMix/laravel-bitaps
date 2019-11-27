<?php

namespace PostMix\LaravelBitaps\Services;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Contracts\IWallet;
use PostMix\LaravelBitaps\Entities\WalletState;
use PostMix\LaravelBitaps\Models\Address;
use PostMix\LaravelBitaps\Models\Wallet as WalletModel;
use PostMix\LaravelBitaps\Traits\BitapsHelpers;

class Wallet extends BitapsBase implements IWallet
{
    use BitapsHelpers;

    /**
     * Create a new wallet
     *
     * @param string $password
     * @param string|null $callbackLink
     *
     * @return \PostMix\LaravelBitaps\Models\Wallet
     */
    public function create(
        string $password,
        string $callbackLink = null
    ): \PostMix\LaravelBitaps\Models\Wallet {
        $params = [
            'password' => $password,
        ];
        $this->fillQuery($params, 'callback_link', $callbackLink);

        $responseBody = $this->client->post('create/wallet', [
            'json' => $params,
        ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        return WalletModel::create([
            'currency_id' => $this->currency->id,
            'wallet_id' => $response['wallet_id'],
            'wallet_hash' => $response['wallet_hash'],
            'password' => $password,
            'callback_link' => $callbackLink,
        ]);
    }

    /**
     * Create a new payment address of the wallet
     *
     * @param \PostMix\LaravelBitaps\Models\Wallet $wallet
     * @param string|null $callbackLink
     * @param int $confirmations
     *
     * @return Address
     */
    public function createPaymentAddress(
        \PostMix\LaravelBitaps\Models\Wallet $wallet,
        string $callbackLink = null,
        int $confirmations = 3
    ): Address {
        $params = [
            'wallet_id' => $wallet->wallet_id,
        ];
        $this->fillQuery($params, 'callback_link', $callbackLink);
        $this->fillQuery($params, 'confirmations', $confirmations);

        $responseBody = $this->client->post('create/wallet/payment/address', [
            'json' => $params,
        ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        return Address::create([
            'currency_id' => $this->currency->id,
            'wallet_id' => $wallet->id,
            'payment_code' => $response['payment_code'],
            'callback_link' => $response['callback_link'],
            'forwarding_address' => $response['forwarding_address'],
            'confirmations' => $confirmations,
            'address' => $response['address'],
            'legacy_address' => $response['legacy_address'],
            'invoice' => $response['invoice'],
        ]);
    }

    /**
     * Make a new payment to receivers
     * Format of the receivers list: [{"address": "...", "amount": 123}, ...]
     *
     * @param \PostMix\LaravelBitaps\Models\Wallet $wallet
     * @param array $receiversList
     * @param string|null $message
     *
     * @return Collection
     */
    public function sendPayment(
        \PostMix\LaravelBitaps\Models\Wallet $wallet,
        array $receiversList,
        string $message = null
    ): Collection {
        // TODO: Implement sendPayment() method.
    }

    /**
     * Get a state of the provided wallet
     *
     * @param \PostMix\LaravelBitaps\Models\Wallet $wallet
     *
     * @return WalletState
     */
    public function getState(\PostMix\LaravelBitaps\Models\Wallet $wallet
    ): WalletState {
        // TODO: Implement getState() method.
    }

    /**
     * Get list of the transactions by specified wallet
     *
     * @param \PostMix\LaravelBitaps\Models\Wallet $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getTransactions(
        \PostMix\LaravelBitaps\Models\Wallet $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection {
        // TODO: Implement getTransactions() method.
    }

    /**
     * Get list of the addresses by specified wallet
     *
     * @param \PostMix\LaravelBitaps\Models\Wallet $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getAddresses(
        \PostMix\LaravelBitaps\Models\Wallet $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection {
        // TODO: Implement getAddresses() method.
    }

    /**
     * Transactions of the wallet's address
     *
     * @param \PostMix\LaravelBitaps\Models\Wallet $wallet
     * @param Address $address
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getTransactionsByAddress(
        \PostMix\LaravelBitaps\Models\Wallet $wallet,
        Address $address,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection {
        // TODO: Implement getTransactionsByAddress() method.
    }

    /**
     * Get daily statistic of the specified wallet
     *
     * @param \PostMix\LaravelBitaps\Models\Wallet $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getDailyStatistic(
        \PostMix\LaravelBitaps\Models\Wallet $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection {
        // TODO: Implement getDailyStatistic() method.
    }
}
