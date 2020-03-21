<?php

Route::group([
    'prefix' => config('bitaps.routes_prefix'),
], function () {
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
                'uses' => 'PaymentsForwardingCallbackController@getCallback',
            ]);
            Route::post('callback', [
                'as' => 'callback',
                'uses' => 'PaymentsForwardingCallbackController@postCallback',
            ]);
        });

        Route::group([
            'as' => 'wallet.',
            'prefix' => 'wallet',
        ], function () {
            Route::get('callback', [
                'uses' => 'WalletCallbackController@getCallback',
            ]);
            Route::post('callback', [
                'as' => 'callback',
                'uses' => 'WalletCallbackController@getCallback',
            ]);
            Route::post('callback-address', [
                'as' => 'callback-address',
                'uses' => 'WalletCallbackController@postCallback',
            ]);
        });

        Route::group([
            'as' => 'domain.',
            'prefix' => 'domain',
        ], function () {
            Route::get('callback', [
                'as' => 'callback',
                'uses' => 'DomainCallbackController@callback',
            ]);
            Route::post('callback', [
                'uses' => 'DomainCallbackController@callback',
            ]);
        });
    });
});
