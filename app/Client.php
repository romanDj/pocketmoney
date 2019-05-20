<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'patronymic',
        'series',
        'number',
        'phone',
        'address',
        'dateOfIssues',
        'issued',
        'dateOfBirth',
        'requirements',
        'created_by',
        'modified_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }

}
