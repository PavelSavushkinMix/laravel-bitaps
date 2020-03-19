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

    /**
     * Count of confirmations for transactions to be approved
     */
    'confirmations_count' => env('BITAPS_CONFIRMATIONS_COUNT', 3),

    /**
     * Payment forwarding callback link
     */
    'payment_forwarding_callback_link' => env('BITAPS_PAYMENT_FORWARDING_CALLBACK_LINK',
        route('bitaps.payments-forwarding.callback')),

    /**
     * Wallet callback link
     */
    'wallet_callback_link' => env('BITAPS_WALLET_CALLBACK_LINK',
        route('bitaps.wallet.callback')),

    /**
     * Wallet callback link
     */
    'wallet_address_callback_link' => env('BITAPS_WALLET_ADDRESS_CALLBACK_LINK',
        route('bitaps.wallet.callback-address')),
];
