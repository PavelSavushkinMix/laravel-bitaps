<?php

namespace PostMix\LaravelBitaps;

use Illuminate\Support\ServiceProvider;

class LaravelBitapsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '../../config/bitaps.php' => config_path('bitaps.php'),
        ]);
    }
}
