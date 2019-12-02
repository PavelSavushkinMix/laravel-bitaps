<?php

Route::group([
    'as' => 'bitaps.',
    'prefix' => 'bitaps',
    'namespace' => 'PostMix\LaravelBitaps\Controllers',
], function () {
    Route::group([
        'as' => 'payments-forwarding.',
        'prefix' => 'payments-forwarding',
    ], function () {
        Route::get('callback', [
            'as' => 'callback',
            'uses' => 'PaymentsForwardingController@getCallback',
        ]);
    });
});
