<?php

return [
    /**
     * Is used testnet
     */
    'debug' => env('BITAPS_DEBUG', false),

    /**
     * Timeout of the requests
     */
    'timeout' => 30,

    /**
     * Minutes to cache domain's access token
     */
    'cache_domain_access_token_minutes' => 5,

    /**
     * Prefix of the routes
     */
    'routes_prefix' => env('BITAPS_ROUTES_PREFIX', ''),
];
