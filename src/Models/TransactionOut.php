<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionOut extends Model
{
    /**
     * @var string
     */
    protected $table = 'bitaps_transaction_outs';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'transaction_id',
        'amount',
        'tx_out',
        'address',
        'payout_tx_hash',
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

    /**
     * Address model by address value
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wallet_address()
    {
        return $this->hasOne(Address::class, 'address', 'address');
    }
}
