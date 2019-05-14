<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    //связывание с таблицей из бд
    protected $table = 'contributions';
    protected $fillable = [
        'name',
        'percent',
        'min_term',
        'isReplenishment',
        'isWithdrawal',
        'isCapitalization',
        'created_by',
        'modified_by'
    ];

}
