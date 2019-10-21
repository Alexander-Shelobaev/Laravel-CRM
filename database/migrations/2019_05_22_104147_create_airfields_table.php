<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirfieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airfields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_airfield_en', 255)->comment('Название авиаплощадоки на английском языке');
            $table->string('name_airfield_ru', 255)->nullable()->comment('Название авиаплощадки на русском языке');
            $table->string('iata_code_airfield', 4)->comment('IATA код площадки');

            $table->string('iata_code_city', 4)->nullable()->comment('IATA код города, в котором расположена авиаплощадки');   // колонка необходима для создание связи, позже должна быть удалена

            $table->string('latitude', 16)->nullable()->comment('Широта');
            $table->string('longitude', 16)->nullable()->comment('Долгота');
            $table->string('time_zone', 16)->nullable()->comment('Часовой пояс, в котором расположен авиаплощадки');
            $table->bigInteger('city_id')->unsigned()->nullable()->comment('Ссылка на город, в котором расположена авиаплощадки');
            $table->timestamps();
        });
        Schema::table('airfields', function($table) {
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airfields');
    }
}

/*
// Удаление лишних колонок
DB::insert('ALTER TABLE `currencies` DROP COLUMN `iso_code_state`');
DB::insert('ALTER TABLE `currencies` DROP COLUMN `iso_numeric_state`');
DB::insert('ALTER TABLE `cities` DROP COLUMN `code_state`');
DB::insert('ALTER TABLE `cities` DROP COLUMN `latitude`');
DB::insert('ALTER TABLE `cities` DROP COLUMN `longitude`');
DB::insert('ALTER TABLE `cities` DROP COLUMN `time_zone_city`');
DB::insert('ALTER TABLE `airfields` DROP COLUMN `iata_code_city`');
*/