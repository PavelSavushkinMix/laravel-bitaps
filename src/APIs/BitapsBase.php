<?php

namespace PostMix\LaravelBitaps\APIs;

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
     * PaymentForwadring constructor.
     *
     * @param string $cryptoCurrency
     *
     * @throws \Exception
     */
    public function __construct(string $cryptoCurrency = 'btc')
    {
        $this->checkCryptocurrency($cryptoCurrency);

        $debugUrl = config('bitaps.debug') ? '/testnet' : '';

        $url = self::BASE_URL . $cryptoCurrency . $debugUrl . '/v1/';

        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $url,
            'timeout' => config('bitaps.timeout'),
        ]);
    }
}
