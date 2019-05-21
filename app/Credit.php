<?php

namespace App;


use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Credit extends Model
{
    //связывание с таблицей из бд
    protected $table = 'credits';
    protected $fillable = [
        'name',
        'percent',
        'min_term',
        'requirements',
        'created_at',
        'updated_at'
    ];

    //скрывает поля при сериализации в toArray
    protected $hidden =[
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
