<?php

namespace PostMix\LaravelBitaps\Services;

use PostMix\LaravelBitaps\Contracts\IDomainAuthorization;
use PostMix\LaravelBitaps\Models\Domain as DomainModel;

class Domain extends BitapsBase implements IDomainAuthorization
{
    /**
     * Key of the cache for domain access token
     */
    const DOMAIN_ACCESS_TOKEN_CACHE_KEY = 'domain_access_token';

    /**
     * @var int
     */
    protected $cacheAccessTokenMinutes;

    /**
     * Domain constructor.
     *
     * @param string $cryptoCurrency
     *
     * @throws \Exception
     */
    public function __construct(string $cryptoCurrency = 'btc')
    {
        parent::__construct($cryptoCurrency);
        $this->cacheAccessTokenMinutes = config('bitaps.cache_domain_access_token_minutes',
            1);
    }

    /**
     * Create domain authorization code
     * To access the statistics on payments and addresses created for the
     * domain, you need to create an access token. To create a token, you must
     * authorize the request using the callback link. The first step is the
     * generation of an authorization code for the specified link.
     *
     * @param string $callbackLink
     *
     * @return DomainModel
     */
    protected function createDomainAuthorizationCode(string $callbackLink
    ): DomainModel {
        $responseBody = $this->client->post('create/domain/authorization/code',
            [
                'json' => [
                    'callback_link' => $callbackLink,
                ],
            ])
            ->getBody();
        $response = json_decode($responseBody->getContents());

        $domain = DomainModel::where('domain_hash', $response->domain_hash)
            ->first();
        if (is_null($domain)) {
            $domain = DomainModel::create([
                'domain' => $response->domain,
                'domain_hash' => $response->domain_hash,
                'authorization_code' => $response->authorization_code,
                'callback_link' => $callbackLink,
            ]);
        } else {
            $domain->authorization_code = $response->authorization_code;
            $domain->save();
        }

        return $domain;
    }

    /**
     * Create domain access token
     * To get access token, you need to add the output of the authorization
     * code as plain / text when you receive a GET request through callback
     * link.
     *
     * @return string
     */
    public function createDomainAccessToken(): string
    {
        //If you are using a local environment, add BITAPS_CALLBACKLINK_FORWARDING to your configuration
        $callbackLink = env('APP_ENV') === 'local' ? env('BITAPS_CALLBACKLINK_FORWARDING') : route('bitaps.payments-forwarding.callback');
        $domain = $this->createDomainAuthorizationCode($callbackLink);

        return \Cache::remember(self::DOMAIN_ACCESS_TOKEN_CACHE_KEY . $domain->domain_hash,
            $this->cacheAccessTokenMinutes, function () use ($domain) {
                $responseBody = $this->client->post('create/domain/access/token',
                    [
                        'json' => [
                            'callback_link' => $domain->callback_link . '?hash=' . $domain->authorization_code,
                        ],
                    ])
                    ->getBody();
                $response = json_decode($responseBody->getContents());

                return $response->access_token;
            });
    }
}
