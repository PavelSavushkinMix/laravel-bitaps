<?php

namespace PostMix\LaravelBitaps\Services;

use Illuminate\Support\Collection;
use PostMix\LaravelBitaps\Contracts\ICallbackLog;
use PostMix\LaravelBitaps\Entities\CallbackLog as CallbackLogEntity;
use PostMix\LaravelBitaps\Entities\CallbackResponse;
use PostMix\LaravelBitaps\Entities\RequestIpLog;
use PostMix\LaravelBitaps\Models\Address;
use PostMix\LaravelBitaps\Models\Transaction;
use PostMix\LaravelBitaps\Traits\BitapsHelpers;
use PostMix\LaravelBitaps\Traits\PaymentForwardingHelpers;

class CallbackLog extends BitapsBase implements ICallbackLog
{
    use BitapsHelpers,
        PaymentForwardingHelpers;

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
    ): Collection {
        $query = [];
        $this->fillQuery($query, 'limit', $limit);
        $this->fillQuery($query, 'page', $page);

        $logs = collect();
        $responseBody = $this->client->get('payment/address/callback/log/' . $address->address,
            [
                'headers' => $this->getPaymentForwardingAccessHeaders($address),
                'query' => $query,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        foreach ($response['callback_list'] as $cb) {
            $logs->push(new CallbackLogEntity(
                is_array($cb['status']) ? $cb['status'] : [$cb['status']],
                new CallbackResponse(
                    (int)$cb['response']['request_status'],
                    new RequestIpLog(
                        (string)$cb['response']['request_ip_log']['ip'],
                        (int)$cb['response']['request_ip_log']['status'],
                        (int)$cb['response']['request_ip_log']['time']
                    ),
                    (string)$cb['response']['request_response'],
                    (bool)$cb['response']['request_success'],
                    (int)$cb['response']['request_id'],
                    (string)$cb['response']['request_error']
                ),
                (string)$cb['time'],
                (int)$cb['timestamp'],
                (string)$cb['event'],
                (int)$cb['confirmations'],
                (string)$cb['outpount'],
                (string)$cb['response_status'],
                (int)$cb['amount']
            ));
        }

        return $logs;
    }

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
    ): Collection {
        $query = [];
        $this->fillQuery($query, 'limit', $limit);
        $this->fillQuery($query, 'page', $page);

        $logs = collect();
        $responseBody = $this->client->get('payment/address/callback/log/' . $transaction->hash . '/' . $transaction->tx_out,
            [
                'headers' => $this->getPaymentForwardingAccessHeaders($address),
                'query' => $query,
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        foreach ($response['callback_list'] as $cb) {
            $logs->push(new CallbackLogEntity(
                is_array($cb['status']) ? $cb['status'] : [$cb['status']],
                new CallbackResponse(
                    (int)$cb['response']['request_status'],
                    new RequestIpLog(
                        (string)$cb['response']['request_ip_log']['ip'],
                        (int)$cb['response']['request_ip_log']['status'],
                        (int)$cb['response']['request_ip_log']['time']
                    ),
                    (string)$cb['response']['request_response'],
                    (bool)$cb['response']['request_success'],
                    (int)$cb['response']['request_id'],
                    (string)$cb['response']['request_error']
                ),
                (string)$cb['time'],
                (int)$cb['timestamp'],
                (string)$cb['event'],
                (int)$cb['confirmations'],
                (string)$cb['outpount'],
                (string)$cb['response_status'],
                (int)$cb['amount']
            ));
        }

        return $logs;
    }
}
