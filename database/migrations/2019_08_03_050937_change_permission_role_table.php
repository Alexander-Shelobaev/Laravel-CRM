<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_role', function (Blueprint $table) {

            $table->bigInteger('role_id')->unsigned()->after('id');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->bigInteger('permission_id')->unsigned()->after('role_id');
            $table->foreign('permission_id')->references('id')->on('permissions');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            //
        });
    }
}
