<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Psalidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('psalidas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            
            $table->bigInteger('idSalida')->unsigned();
            $table->bigInteger('idProducto')->unsigned();
            $table->integer('cantidad');

            $table->timestamps();

            $table->foreign('idSalida')->references('id')->on('salidas')->onDelete("cascade");
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete("cascade");
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
