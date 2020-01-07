<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $fillable = [
        'name_currency_en',
        'name_currency_ru',
        'iso_4217_code_currency_literal',
        'iso_4217_code_currency_numeric',
        'rounding_currency',
        'method_rounding_currency',
        'unicode'
    ];
}