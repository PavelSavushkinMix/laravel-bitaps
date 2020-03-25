<?php

namespace PostMix\LaravelBitaps;

use Illuminate\Support\ServiceProvider;
use PostMix\LaravelBitaps\Contracts\ICallbackLog;
use PostMix\LaravelBitaps\Contracts\IDomainAuthorization;
use PostMix\LaravelBitaps\Contracts\IPaymentForwarding;
use PostMix\LaravelBitaps\Contracts\IWallet;
use PostMix\LaravelBitaps\Services\CallbackLog;
use PostMix\LaravelBitaps\Services\Domain;
use PostMix\LaravelBitaps\Services\PaymentForwarding;
use PostMix\LaravelBitaps\Services\Wallet;

class LaravelBitapsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPaymentForwarding::class, function ($app, $params) {
            return new PaymentForwarding($this->parseProvidedCurrency($params['currency']));
        });
        $this->app->bind(ICallbackLog::class, CallbackLog::class);
        $this->app->bind(IDomainAuthorization::class, Domain::class);
        $this->app->bind(IWallet::class, function ($app, $params) {
            return new Wallet($this->parseProvidedCurrency($params['currency']));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadTranslationsFrom(__DIR__ . '/../lang/', 'bitaps');
        $this->publishes([
            __DIR__ . '/../config/bitaps.php' => config_path('bitaps.php'),
            __DIR__ . '/../lang/' => resource_path('lang/vendor/bitaps'),
        ]);
    }

    /**
     * Parse provided currency
     *
     * @param string|null $currency
     *
     * @return string
     */
    private function parseProvidedCurrency(string $currency = null): string
    {
        $currency = $currency ?? 'btc';
        if (config('bitaps.debug') && $currency === 'btc') {
            $currency = 'tbtc';
        }

        return $currency;
    }
}
