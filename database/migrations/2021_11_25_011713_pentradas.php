<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pentradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pentradas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            
            $table->bigInteger('idEntrada')->unsigned();
            $table->bigInteger('idProducto')->unsigned();
            $table->integer('cantidad');

            $table->timestamps();

            $table->foreign('idEntrada')->references('id')->on('entradas')->onDelete("cascade");
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
