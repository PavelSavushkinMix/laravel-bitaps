<?php

namespace PostMix\LaravelBitaps\Services;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Contracts\IWallet;
use PostMix\LaravelBitaps\Entities\WalletAddress;
use PostMix\LaravelBitaps\Entities\WalletSentTransaction;
use PostMix\LaravelBitaps\Entities\WalletState;
use PostMix\LaravelBitaps\Entities\WalletStatistic;
use PostMix\LaravelBitaps\Entities\WalletTransaction;
use PostMix\LaravelBitaps\Models\Address;
use PostMix\LaravelBitaps\Models\Wallet as WalletModel;
use PostMix\LaravelBitaps\Traits\BitapsHelpers;
use PostMix\LaravelBitaps\Traits\WalletHelpers;

class Wallet extends BitapsBase implements IWallet
{
    use BitapsHelpers,
        WalletHelpers;

    /**
     * Create a new wallet
     *
     * @param string $password
     *
     * @return WalletModel
     */
    public function create(string $password): WalletModel
    {
        $callbackLink = route('bitaps.wallet.callback');
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
            'currency_id' => $this->getCurrency()->id,
            'wallet_id' => $response->wallet_id,
            'wallet_hash' => $response->wallet_id_hash,
            'password' => $password,
            'callback_link' => $callbackLink,
        ]);
    }

    /**
     * Create a new payment address of the wallet
     *
     * @param WalletModel $wallet
     * @param int $confirmations
     *
     * @return Address
     */
    public function createPaymentAddress(
        WalletModel $wallet,
        int $confirmations = 3
    ): Address {
        $callbackLink = route('bitaps.wallet.callback-address');

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
            'currency_id' => $this->getCurrency()->id,
            'wallet_id' => $wallet->id,
            'payment_code' => $response->payment_code,
            'callback_link' => $callbackLink,
            'confirmations' => $confirmations,
            'address' => $response->address,
            'legacy_address' => $response->legacy_address ?? null,
            'invoice' => $response->invoice,
        ]);
    }

    /**
     * Make a new payment to receivers
     * Format of the receivers list: [{"address": "...", "amount": 123}, ...]
     *
     * @param WalletModel $wallet
     * @param array $receiversList
     * @param string|null $message
     *
     * @return Collection
     */
    public function sendPayment(
        WalletModel $wallet,
        array $receiversList,
        string $message = null
    ): Collection {
        $params = [
            'receivers_list' => $receiversList,
        ];
        $headers = $this->getWalletAccessHeaders($wallet, $params);

        $responseBody = $this->client->post('wallet/send/payment/' . $wallet->wallet_hash,
            [
                'headers' => $headers,
                'json' => $params,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        $result = collect();
        foreach ($response->tx_list as $tx) {
            $result->push(new WalletSentTransaction(
                (string)$tx->address,
                (string)$tx->tx_hash,
                (int)$tx->out,
                (int)$tx->amount
            ));
        }

        return $result;
    }

    /**
     * Get a state of the provided wallet
     *
     * @param WalletModel $wallet
     *
     * @return WalletState
     */
    public function getState(WalletModel $wallet): WalletState
    {
        $headers = $this->getWalletAccessHeaders($wallet, []);
        $query = [];

        $responseBody = $this->client->post('wallet/state/' . $wallet->wallet_id,
            [
                'headers' => $headers,
                'query' => $query,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        return new WalletState(
            $wallet,
            (int)$response->balance_amount,
            (int)$response->address_count,
            (int)$response->create_date_timestamp,
            (int)$response->sent_tx,
            (int)$response->pending_sent_tx,
            (int)$response->service_fee_paid_amount,
            (int)$response->pending_received_amount,
            (int)$response->received_tx,
            (string)$response->create_date,
            (int)$response->invalid_tx,
            (int)$response->sent_amount,
            (int)$response->pending_received_tx,
            (int)$response->last_used_nonce,
            (int)$response->received_amount,
            (int)$response->pending_sent_amount
        );
    }

    /**
     * Get list of the transactions by specified wallet
     *
     * @param WalletModel $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return array
     */
    public function getTransactions(
        WalletModel $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): array {
        $headers = $this->getWalletAccessHeaders($wallet, []);
        $query = [];
        $this->fillQuery($query, 'from', $from);
        $this->fillQuery($query, 'to', $to);
        $this->fillQuery($query, 'limit', $limit);
        $this->fillQuery($query, 'page', $page);

        $responseBody = $this->client->post('wallet/transactions/' . $wallet->wallet_id,
            [
                'headers' => $headers,
                'query' => $query,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        $types = WalletTransaction::TRANSACTION_TYPES;
        $result = [];
        foreach ($types as $type) {
            $result[$type] = [];

            foreach ($response->$type->tx_list as $tx) {
                $result[$type][] = new WalletTransaction(
                    (int)$tx->timeline_sent_count,
                    (int)$tx->timestamp,
                    (int)$tx->block_height,
                    (int)$tx->create_timestamp,
                    (int)$tx->timeline_received_count,
                    (int)$tx->amount,
                    (string)$tx->hash,
                    (int)$tx->timeline_balance,
                    (int)$tx->out,
                    (int)$tx->fee,
                    (string)$tx->type,
                    (int)$tx->timeline_invalid_count,
                    (string)$tx->address,
                    (string)$tx->time
                );
            }
        }

        return $result;
    }

    /**
     * Get list of the addresses by specified wallet
     *
     * @param WalletModel $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getAddresses(
        WalletModel $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection {
        $headers = $this->getWalletAccessHeaders($wallet, []);
        $query = [];
        $this->fillQuery($query, 'from', $from);
        $this->fillQuery($query, 'to', $to);
        $this->fillQuery($query, 'limit', $limit);
        $this->fillQuery($query, 'page', $page);

        $responseBody = $this->client->post('wallet/addresses/' . $wallet->wallet_id,
            [
                'headers' => $headers,
                'query' => $query,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        $result = collect();
        foreach ($response->address_list as $tx) {
            $result->push(new WalletAddress(
                (int)$tx->received_amount,
                (int)$tx->received_tx,
                (int)$tx->pending_received_amount,
                (int)$tx->pending_received_tx,
                (int)$tx->timestamp,
                (string)$tx->time,
                (string)$tx->address
            ));
        }

        return $result;
    }

    /**
     * Transactions of the wallet's address
     *
     * @param WalletModel $wallet
     * @param Address $address
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return array
     */
    public function getTransactionsByAddress(
        WalletModel $wallet,
        Address $address,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): array {
        $headers = $this->getWalletAccessHeaders($wallet, []);
        $query = [];
        $this->fillQuery($query, 'from', $from);
        $this->fillQuery($query, 'to', $to);
        $this->fillQuery($query, 'limit', $limit);
        $this->fillQuery($query, 'page', $page);

        $responseBody = $this->client->post('wallet/address/transactions/' . $wallet->wallet_id . '/' . $address->address,
            [
                'headers' => $headers,
                'query' => $query,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        $types = WalletTransaction::TRANSACTION_TYPES;
        $result = [];
        foreach ($types as $type) {
            $result[$type] = [];

            foreach ($response->$type->tx_list as $tx) {
                $result[$type][] = new WalletTransaction(
                    (int)$tx->timeline_sent_count,
                    (int)$tx->timestamp,
                    (int)$tx->block_height,
                    (int)$tx->create_timestamp,
                    (int)$tx->timeline_received_count,
                    (int)$tx->amount,
                    (string)$tx->hash,
                    (int)$tx->timeline_balance,
                    (int)$tx->out,
                    (int)$tx->fee,
                    (string)$tx->type,
                    (int)$tx->timeline_invalid_count,
                    (string)$tx->address,
                    (string)$tx->time
                );
            }
        }

        return $result;
    }

    /**
     * Get daily statistic of the specified wallet
     *
     * @param WalletModel $wallet
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return Collection
     */
    public function getDailyStatistic(
        WalletModel $wallet,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): Collection {
        $headers = $this->getWalletAccessHeaders($wallet, []);
        $query = [];
        $this->fillQuery($query, 'from', $from);
        $this->fillQuery($query, 'to', $to);
        $this->fillQuery($query, 'limit', $limit);
        $this->fillQuery($query, 'page', $page);

        $responseBody = $this->client->post('wallet/daily/statistic/' . $wallet->wallet_id,
            [
                'headers' => $headers,
                'query' => $query,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        $result = collect();
        foreach ($response->day_list as $tx) {
            $result->push(new WalletStatistic(
                (int)$tx->balance_amount,
                (string)$tx->date,
                (int)$tx->datestamp,
                (int)$tx->address_count,
                (int)$tx->received_amount,
                (int)$tx->received_tx,
                (int)$tx->pending_received_amount,
                (int)$tx->pending_received_tx,
                (int)$tx->pending_received_amount_total,
                (int)$tx->pending_received_tx_total,
                (int)$tx->sent_amount,
                (int)$tx->sent_tx,
                (int)$tx->pending_sent_amount,
                (int)$tx->pending_sent_tx,
                (int)$tx->pending_sent_amount_total,
                (int)$tx->pending_sent_tx_total,
                (int)$tx->service_fee_paid_amount,
                (int)$tx->invalid_tx
            ));
        }

        return $result;
    }
}
