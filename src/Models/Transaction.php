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
}
