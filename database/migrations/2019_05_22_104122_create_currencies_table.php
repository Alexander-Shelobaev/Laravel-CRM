<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id')
                ->comment('Первичный ключ');
            $table->string('name_currency_en', 255)
                ->comment('Название валюты на английском языке');
            $table->string('name_currency_ru', 255)
                ->comment('Название валюты на русском языке');
            $table->string('iso_4217_code_currency_literal', 4)
                ->comment('Код ISO 4217 буквенный для данной валюты');
            $table->integer('iso_4217_code_currency_numeric')
                ->comment('Код ISO 4217 цифровой для данной валюты');
            $table->integer('rounding_currency')
                ->comment('Величина (кол-во знаков после запятой), до которой округляется валюты');
            $table->integer('method_rounding_currency')->nullable()
                ->comment('Признак метода округления (0 - округление не производится, 1 - производится)');
            $table->string('unicode', 10)->nullable()
                ->comment('Знак валюты в формате юникод');
            
            // колонка необходима для создание связи, позже должна быть удалена
            $table->string('iso_code_state', 4)->nullable()
                ->comment('Код ISO 3166-1 буквенный государства');
                
            // колонка необходима для создание связи, позже должна быть удалена    
            $table->string('iso_numeric_state', 4)->nullable()
                ->comment('Код ISO 3166-1 цифровой государства');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}

