<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Userroles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('userroles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('idUser')->unsigned();
            $table->bigInteger('idRol')->unsigned();
            
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('idRol')->references('id')->on('roles')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
