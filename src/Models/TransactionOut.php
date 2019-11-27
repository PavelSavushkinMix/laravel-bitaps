<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionOut extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'transaction_id',
        'amount',
        'tx_out',
        'address',
        'created_at',
        'updated_at',
    ];

    /**
     * Transaction of the current out
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
