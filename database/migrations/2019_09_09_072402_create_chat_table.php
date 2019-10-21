<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');
            $table->boolean('view');
            
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('recipient_id')->unsigned();

            $table->timestamps();
            
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('recipient_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat');
    }
}
