<?php

namespace PostMix\LaravelBitaps\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    /**
     * @var string
     */
    protected $table = 'bitaps_domains';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'domain',
        'domain_hash',
        'authorization_code',
        'created_at',
        'updated_at',
    ];

    /**
     * Got unencrypted value of authorization code
     *
     * @param $value
     *
     * @return string
     */
    public function getAuthorizationCodeAttribute($value)
    {
        return decrypt($value);
    }

    /**
     * Encrypt value of authorization code
     *
     * @param $value
     */
    public function setAuthorizationCodeAttribute($value)
    {
        $this->attributes['authorization_code'] = encrypt($value);
    }
}
