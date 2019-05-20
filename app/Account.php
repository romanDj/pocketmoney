<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    protected $fillable = [
        'client_id',
        'balance',
        'created_by',
        'modified_by',
        'offerable_id',
        'offerable_type'
    ];

    public function offerable(){
        return $this->morphTo();
    }

    public function contract()
    {
        return $this->hasOne('App\Contract');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
