<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @var string
     */
    protected $table = 'bitaps_addresses';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'currency_id',
        'domain_id',
        'wallet_id',
        'payment_code',
        'callback_link',
        'forwarding_address',
        'confirmations',
        'address',
        'invoice',
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

    /**
     * Wallet of the current address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
