<?php

namespace PostMix\LaravelBitaps\Traits;

use PostMix\LaravelBitaps\Models\Address;

trait BitapsHelpers
{

    /**
     * Check if provided cryptocurrency available
     *
     * @param string $cryptocurrencyCode
     *
     * @throws Exception
     */
    protected function checkCryptocurrency(string $cryptocurrencyCode)
    {
        if (!in_array($cryptocurrencyCode,
            $this->getAvailableCryptocurrencies())) {
            throw new Exception($cryptocurrencyCode . ' is not supported');
        }
    }

    /**
     * Get access headers for requests
     *
     * @param Address $address
     *
     * @return array
     */
    protected function getAccessHeaders(Address $address): array
    {
        return [
            'Payment-Code' => $address->payment_code,
        ];
    }

    /**
     * Fill query array
     *
     * @param array $query
     * @param string $key
     * @param mixed $value
     *
     * @return array
     */
    protected function fillQuery(array &$query, string $key, $value)
    {
        if (!is_null($value)) {
            $query[$key] = $value;
        }

        return $query;
    }

    /**
     * List of available cryptocurrencies
     *
     * @return array
     */
    public function getAvailableCryptocurrencies(): array
    {
        return [
            'btc',
            'ltc',
            'bch',
            'eth',
        ];
    }

    /**
     * Get service fee by cryptocurrency code
     *
     * @param string $cryptocurrencyCode
     *
     * @return float
     * @throws Exception
     */
    public function getServiceFee(string $cryptocurrencyCode): float
    {
        $this->checkCryptocurrency($cryptocurrencyCode);
        $fees = [
            'btc' => 0.0002,
            'bch' => 0.0004,
            'ltc' => 0.0004,
            'eth' => 0.002,
        ];

        return $fees[$cryptocurrencyCode];
    }
}
