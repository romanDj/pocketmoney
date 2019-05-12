<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //связывание с таблицей из бд
    protected $table = 'offers';
    protected $fillable = [
        'type_id',
        'name',
        'percent',
        'min_term',
        'requirements',
        'isReplenishment',
        'isWithdrawal',
        'isCapitalization',
        'created_by',
        'modified_by'
    ];
}
