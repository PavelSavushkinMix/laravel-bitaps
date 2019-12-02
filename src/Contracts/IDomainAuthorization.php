<?php

namespace PostMix\LaravelBitaps\Contracts;

interface IDomainAuthorization
{
    /**
     * Create domain access token
     * To get access token, you need to add the output of the authorization
     * code as plain / text when you receive a GET request through callback
     * link.
     *
     * @return string
     */
    public function createDomainAccessToken(): string;
}
