<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    //разрешает массовое присвооение аттрибутов
    protected $fillable = [
        'balance',
        'client_id',
        'offerable_id',
        'offerable_type',
        'created_at',
        'updated_at',
    ];

    //скрывает поля при сериализации в toArray
    protected $hidden =[
        'client_id',
        'offerable_id',
        'offerable_type',
        'updated_at',
    ];

    //указывает что эти поля являются датами
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    //формат вывода даты
    protected function serializeDate(DateTimeInterface $date) {
        return Carbon::parse($date)->format('d.m.Y');
    }

    //отношения
    public function offerable(){
        return $this->morphTo();
    }

    public function contract()
    {
        return $this->hasOne('App\Contract');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function history()
    {
        return $this->hasMany('App\History');
    }

}
