<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'payment_code',
        'callback_link',
        'forwarding_address',
        'domain_hash',
        'confirmations',
        'address',
        'legacy_address',
        'domain',
        'invoice',
        'currency',
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'confirmations' => 'integer',
    ];

    /**
     * Got unencrypted value of payment code
     *
     * @param $value
     *
     * @return string
     */
    public function getPaymentCodeAttribute($value)
    {
        return decrypt($value);
    }

    /**
     * Encrypt value of payment code
     *
     * @param $value
     */
    public function setPaymentCodeAttribute($value)
    {
        $this->attributes['payment_code'] = encrypt($value);
    }

    /**
     * Domain of the current address
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function domain()
    {
        return $this->hasOne(Domain::class);
    }
}
