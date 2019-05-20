<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
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
        'created_at',
        'updated_at'
    ];

    //скрывает поля при сериализации в toArray
    protected $hidden =[
        'id',
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

    public function accounts()
    {
        return $this->morphMany('App\Account', 'offerable');
    }

}
