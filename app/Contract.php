<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
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
        'expirationDate',
        'created_at',
        'updated_at',
        'expirationDate'
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return Carbon::parse($date)->format('d.m.Y');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

}
