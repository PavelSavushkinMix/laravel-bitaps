<?php

namespace PostMix\LaravelBitaps\Services;

use PostMix\LaravelBitaps\Models\Currency;
use PostMix\LaravelBitaps\Traits\BitapsHelpers;

class BitapsBase
{
    use BitapsHelpers;

    /**
     * Base url of the Bitaps API
     */
    const BASE_URL = 'https://api.bitaps.com/';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * PaymentForwadring constructor.
     *
     * @param string $cryptoCurrency
     *
     * @throws \Exception
     */
    public function __construct(string $cryptoCurrency)
    {
        $this->checkCryptocurrency($cryptoCurrency);
        $this->currency = Currency::where('code', $cryptoCurrency)->first();

        $url = self::BASE_URL;
        switch ($cryptoCurrency) {
            default:
            case 'btc':
                $url .= 'btc';
                break;
            case 'tbtc':
                $url .= 'btc/testnet';
                break;
        }
        $url .= '/v1/';

        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $url,
            'timeout' => config('bitaps.timeout'),
        ]);
    }

    /**
     * Get current currency
     *
     * @return Currency
     */
    protected function getCurrency(): Currency
    {
        return $this->currency;
    }
}
