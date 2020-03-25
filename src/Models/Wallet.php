<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**
     * @var string
     */
    protected $table = 'bitaps_wallets';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'currency_id',
        'wallet_id',
        'wallet_hash',
        'password',
        'callback_link',
        'created_at',
        'updated_at',
    ];

    /**
     * Got unencrypted value of password
     *
     * @param $value
     *
     * @return string
     */
    public function getPasswordAttribute($value)
    {
        return decrypt($value);
    }

    /**
     * Encrypt value of password
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = encrypt($value);
    }

    /**
     * Addresses of the current wallet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Currency of the current wallet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
