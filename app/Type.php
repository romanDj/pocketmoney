<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //связывание с таблицей из бд
    protected $table = 'types';
    protected $fillable = ['name'];
    public $timestamps = false;
}
