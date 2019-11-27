<?php

namespace PostMix\LaravelBitaps;

use Illuminate\Support\ServiceProvider;
use PostMix\LaravelBitaps\APIs\CallbackLog;
use PostMix\LaravelBitaps\APIs\PaymentForwarding;
use PostMix\LaravelBitaps\Contracts\ICallbackLog;
use PostMix\LaravelBitaps\Contracts\IPaymentForwarding;

class LaravelBitapsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPaymentForwarding::class, PaymentForwarding::class);
        $this->app->bind(ICallbackLog::class, CallbackLog::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '../config/bitaps.php' => config_path('bitaps.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__ . '../database/migrations');
    }
}
