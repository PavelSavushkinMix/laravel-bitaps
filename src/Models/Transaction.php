<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * @var string
     */
    protected $table = 'bitaps_transactions';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'address',
        'miner_fee',
        'tx_hash',
        'service_fee',
        'timestamp',
        'time',
        'status',
        'hash',
        'amount',
        'tx_out',
        'notification',
        'created_at',
        'updated_at',
    ];

    /**
     * Outs of the transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outs()
    {
        return $this->hasMany(TransactionOut::class);
    }

    /**
     * Address of the current transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class, 'address', 'address');
    }

    /**
     * Currency of the transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function currency()
    {
        return $this->hasOneThrough(Currency::class, Address::class, 'address',
            'id', 'address', 'currency_id');
    }
}
