<?php

namespace PostMix\LaravelBitaps\Contracts;

use PostMix\LaravelBitaps\Models\Domain;

interface IDomain
{
    /**
     * Create domain authorization code
     * To access the statistics on payments and addresses created for the
     * domain, you need to create an access token. To create a token, you must
     * authorize the request using the callback link. The first step is the
     * generation of an authorization code for the specified link.
     *
     * @param string $callbackLink
     *
     * @return Domain
     */
    public function createDomainAuthorizationCode(string $callbackLink): Domain;

    /**
     * Create domain access token
     * To get access token, you need to add the output of the authorization
     * code as plain / text when you receive a GET request through callback
     * link.
     *
     * @param Domain $domain
     * @param string $callbackLink
     *
     * @return string
     */
    public function createDomainAccessToken(
        Domain $domain,
        string $callbackLink
    ): string;
}
