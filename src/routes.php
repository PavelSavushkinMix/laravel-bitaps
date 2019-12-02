<?php

Route::group([
    'as' => 'bitaps.',
    'prefix' => 'bitaps',
    'namespace' => 'PostMix\Controllers',
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
