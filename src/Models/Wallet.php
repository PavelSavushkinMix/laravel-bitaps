<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'wallet_id',
        'wallet_hash',
        'password',
        'callback_link',
        'currency',
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
}
