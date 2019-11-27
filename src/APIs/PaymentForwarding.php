<?php

namespace PostMix\LaravelBitaps\APIs;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Contracts\IPaymentForwarding;
use PostMix\LaravelBitaps\Entities\AddressState;
use PostMix\LaravelBitaps\Models\Address;
use PostMix\LaravelBitaps\Models\Transaction;
use PostMix\LaravelBitaps\Traits\BitapsHelpers;

class PaymentForwarding extends BitapsBase implements IPaymentForwarding
{
    use BitapsHelpers;

    /**
     * Create a new forwarding address
     *
     * @param string $forwardingAddress
     * @param string|null $callbackLink
     * @param int $confirmations
     *
     * @return Address
     */
    public function createAddress(
        string $forwardingAddress,
        string $callbackLink = null,
        int $confirmations = 3
    ): Address {
        $params = [
            'forwarding_address' => $forwardingAddress,
            'confirmations' => $confirmations,
        ];

        if (!is_null($callbackLink)) {
            $params['callback_link'] = $callbackLink;
        }

        $responseBody = $this->client->post('create/payment/address', [
            'json' => $params,
        ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        return Address::create([
            'payment_code' => (string)$response['payment_code'],
            'callback_link' => (string)$response['callback_link'],
            'forwarding_address' => (string)$response['forwarding_address'],
            'domain_hash' => (string)$response['domain_hash'],
            'confirmations' => (int)$response['confirmations'],
            'address' => (string)$response['address'],
            'legacy_address' => (string)$response['legacy_address'],
            'domain' => (string)$response['domain'],
            'invoice' => (string)$response['invoice'],
            'currency' => (string)$response['currency'],
        ]);
    }

    /**
     * Request status and statistics of the payment address.
     *
     * @param Address $address
     *
     * @return AddressState
     */
    public function getAddressState(Address $address): AddressState
    {
        $responseBody = $this->client->get('payment/address/state/' . $address->address,
            [
                'headers' => $this->getAccessHeaders($address),
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        return new AddressState(
            (string)$response['callback_link'],
            (int)$response['pending_received'],
            (int)$response['fee_paid'],
            (int)$response['create_date'],
            (int)$response['invalid_transaction_count'],
            (int)$response['paid'],
            (int)$response['received'],
            (string)$response['forwarding_address'],
            (int)$response['confirmations'],
            (string)$response['address'],
            (string)$response['legacy_address'],
            (string)$response['type'],
            (int)$response['transaction_count'],
            (int)$response['pending_paid'],
            (int)$response['pending_transaction_count'],
            (string)$response['currency'],
            (int)$response['create_date_timestamp']
        );
    }

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
    ): Collection {
        $query = [];
        $this->fillQuery($query, 'from', $from);
        $this->fillQuery($query, 'to', $to);
        $this->fillQuery($query, 'limit', $limit);
        $this->fillQuery($query, 'page', $page);

        $transactions = collect();
        $responseBody = $this->client->get('payment/address/transactions/' . $address->address,
            [
                'headers' => $this->getAccessHeaders($address),
                'query' => $query,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        foreach ($response['tx_list'] as $tx) {
            $trx = new Transaction([
                'miner_fee' => $tx['payout']['miner_fee'],
                'tx_hash' => $tx['payout']['tx_hash'],
                'service_fee' => $tx['payout']['service_fee'],
                'timestamp' => $tx['timestamp'],
                'time' => $tx['time'],
                'status' => $tx['status'],
                'hash' => $tx['hash'],
                'amount' => $tx['amount'],
                'tx_out' => $tx['tx_out'],
                'notification' => $tx['notification'],
            ]);
            foreach ($tx['outs'] as $out) {
                $trx->outs()->create([
                    'amount' => $out['amount'],
                    'tx_out' => $out['tx_out'],
                    'address' => $out['address'],
                ]);
            }
            $transactions->push($trx);
        }
        return $transactions;
    }
}
