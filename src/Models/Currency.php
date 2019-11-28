<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * @var string
     */
    protected $table = 'bitaps_currencies';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'service_fee',
        'name',
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'service_fee' => 'float',
    ];

    /**
     * Filter by code
     *
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeCode($query, $value)
    {
        return $query->where('code', $value);
    }
}
