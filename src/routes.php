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
                'uses' => 'PaymentsCallbackController@getCallback',
            ]);
            Route::post('callback', [
                'as' => 'callback',
                'uses' => 'PaymentsCallbackController@postCallback',
            ]);
        });
        Route::group([
            'as' => 'wallet.',
            'prefix' => 'wallet',
        ], function () {
            Route::get('callback', [
                'uses' => 'PaymentsCallbackController@getCallback',
            ]);
            Route::post('callback', [
                'as' => 'callback',
                'uses' => 'PaymentsCallbackController@getCallback',
            ]);
            Route::post('callback-address', [
                'as' => 'callback-address',
                'uses' => 'PaymentsCallbackController@postCallback',
            ]);
        });
    });
});
