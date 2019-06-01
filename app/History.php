<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = [
        'account_id',
        'name',
        'amount',
        'created_at',
        'updated_at'
    ];

    //скрывает поля при сериализации в toArray
    protected $hidden =[
        'account_id',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return Carbon::parse($date)->format('d.m.Y');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
