<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_city_en', 255)
                ->comment('Название города на английском языке');
            $table->string('name_city_ru', 255)->nullable()
                ->comment('Название города на русском языке');
            $table->string('iata_code_city', 255)
                ->comment('IATA код города');
            // колонка необходима для создание связи, позже должна быть удалена    
            $table->string('code_state', 255)->nullable()
                ->comment('Код государства, в котором расположен город');
            // колонка необходима для создание связи, позже должна быть удалена    
            $table->string('latitude', 16)->nullable()
                ->comment('Ширина');
            // колонка необходима для создание связи, позже должна быть удалена    
            $table->string('longitude', 16)->nullable()
                ->comment('Долгота');
            // колонка необходима для создание связи, позже должна быть удалена    
            $table->bigInteger('time_zone_city')->nullable()
                ->comment('Часовой пояс, в котором расположен город');
            $table->bigInteger('state_id')->unsigned()->nullable()
                ->comment('Ссылка на государство, в котором расположен город');
            $table->timestamps();
        });

        Schema::table('cities', function($table) {
            $table->foreign('state_id')->references('id')->on('states');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
