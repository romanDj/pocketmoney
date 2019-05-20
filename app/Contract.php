<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';
    protected $fillable = [
        'account_id',
        'period',
        'expirationDate',
        'amount',
        'percent',
        'created_by',
        'modified_by'
    ];

    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
