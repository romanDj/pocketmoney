<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
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
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return Carbon::parse($date)->format('d.m.Y');
    }

}
