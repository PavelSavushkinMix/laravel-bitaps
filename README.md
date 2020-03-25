## Laravel Bitaps Wrapper

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

* [Install](#install)
* [Usage](#usage)
* [License](#license)

### Install

Require this package with composer using the following command:

```bash
composer require postmix/laravel-bitaps
```

After updating composer, add the service provider to the `providers` array in `config/app.php`

```php
PostMix\LaravelBitaps\LaravelBitapsServiceProvider::class,
```
**Laravel 5.5+** use Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

You can also publish the config file to change implementations (ie. interface to specific class).

```bash
php artisan vendor:publish --provider="PostMix\LaravelBitaps\LaravelBitapsServiceProvider"
```

The wrapper uses several tables to save data into DB. So, before usage, you need to migrate that tables with default command.

### Usage

If you would like to use testnet, you can add **BITAPS_DEBUG=true** to your .env file.

You are able to make implementations using **app()->make()** method. You can check available methods of the implementation via interfaces.
Available implementations:

```php
app()->make(PostMix\LaravelBitaps\Contracts\IPaymentForwarding::class);
app()->make(PostMix\LaravelBitaps\Contracts\ICallbackLog::class);
app()->make(PostMix\LaravelBitaps\Contracts\IDomainAuthorization::class);
// Default currency: btc. Supported: btc, tbtc, ltc, bch, eth.
app()->make(PostMix\LaravelBitaps\Contracts\IWallet::class, ['currency' => 'btc']);


// WIP
app()->make(PostMix\LaravelBitaps\Contracts\IDomainStatistic::class);
```

### License

The Laravel Bitaps is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


[ico-version]: https://img.shields.io/packagist/v/postmix/laravel-bitaps.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/postmix/laravel-bitaps.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/postmix/laravel-bitaps
[link-downloads]: https://packagist.org/packages/postmix/laravel-bitaps
