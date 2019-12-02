<?php

namespace PostMix\LaravelBitaps\Traits;

use PostMix\LaravelBitaps\Models\Address;

trait PaymentForwardingHelpers
{
    /**
     * Get access headers for requests
     *
     * @param Address $address
     *
     * @return array
     */
    protected function getPaymentForwardingAccessHeaders(Address $address): array
    {
        return [
            'Payment-Code' => $address->payment_code,
        ];
    }
}
