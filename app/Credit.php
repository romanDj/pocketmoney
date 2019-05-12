<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    //связывание с таблицей из бд
    protected $table = 'credits';
    protected $fillable = [
        'name',
        'percent',
        'min_term',
        'requirements',
        'created_by',
        'modified_by'
    ];
}
