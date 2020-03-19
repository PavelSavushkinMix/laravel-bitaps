<?php

namespace PostMix\LaravelBitaps\Traits;

use PostMix\LaravelBitaps\Models\Currency;

trait BitapsHelpers
{

    /**
     * Check if provided cryptocurrency available
     *
     * @param string $cryptocurrencyCode
     *
     * @throws \Exception
     */
    protected function checkCryptocurrency(string $cryptocurrencyCode)
    {
        if (Currency::code($cryptocurrencyCode)->count() === 0) {
            throw new \Exception(trans('bitaps::validation.cryptocurrency_is_not_supported',
                [
                    'cryptocurrency' => $cryptocurrencyCode,
                ]));
        }
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
     * Get service fee by cryptocurrency code
     *
     * @param string $cryptocurrencyCode
     *
     * @return float
     * @throws \Exception
     */
    public function getServiceFee(string $cryptocurrencyCode): float
    {
        $this->checkCryptocurrency($cryptocurrencyCode);

        return Currency::code($cryptocurrencyCode)
            ->first()
            ->service_fee;
    }
}
