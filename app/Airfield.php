<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airfield extends Model
{
    protected $table = 'airfields';
    protected $fillable = ['name_airfield_en', 'name_airfield_ru', 'iata_code_airfield', 'latitude', 'longitude', 'time_zone', 'city_id'];
}
