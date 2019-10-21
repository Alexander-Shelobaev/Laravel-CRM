<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name_city_en', 'name_city_ru', 'iata_code_city', 'state_id'];
}
