<?php

namespace App;

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
}
