<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = ['name_state_en', 'name_state_ru', 'iso_code_3_state', 'iso_code_2_state', 'currency_id', 'solid_currency_id'];

    public function currency(){
        return $this->hasOne('App\Currency', 'currency_id', 'id'); // часть полей можно опустить
        // return $this->hasOne('App\Currency');
    }
}
