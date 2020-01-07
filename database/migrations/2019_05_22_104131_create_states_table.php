<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id')
                ->comment('Первичный ключ');
            $table->string('name_state_en', 255)
                ->comment('Название государства на английском языке');
            $table->string('name_state_ru', 255)
                ->comment('Название государства на русском языке');
            $table->string('iso_code_3_state', 255)
                ->comment('Код государства ISO 3166-1 трехзначный');
            $table->string('iso_code_2_state', 255)
                ->comment('Код государства ISO 3166-1 двузначный');
            $table->bigInteger('currency_id')->unsigned()->nullable()
                ->comment('Ссылка на валюту которое использует данное государства');
            $table->bigInteger('solid_currency_id')->unsigned()->nullable()
                ->comment('Ссылка на валюту, принятую в данном государстве в качестве твердой валюты');
            $table->timestamps();
        });

        Schema::table('states', function($table) {
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('solid_currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}


