<?php

namespace PostMix\LaravelBitaps;

use Illuminate\Support\ServiceProvider;
use PostMix\LaravelBitaps\Services\CallbackLog;
use PostMix\LaravelBitaps\Services\Domain;
use PostMix\LaravelBitaps\Services\PaymentForwarding;
use PostMix\LaravelBitaps\Contracts\ICallbackLog;
use PostMix\LaravelBitaps\Contracts\IDomainAuthorization;
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
        $this->app->bind(IDomainAuthorization::class, Domain::class);
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
