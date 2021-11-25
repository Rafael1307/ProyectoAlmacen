<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('productos', function (Blueprint $table) {
            
            $table->engine="InnoDB";
            
            $table->bigIncrements('id');
            
            $table->string('foto');
            $table->string('Nombre');
            $table->string('Marca');
            $table->float('Precio', 8, 2);
            $table->text('Descripcion');
            $table->bigInteger('catId')->unsigned();

            $table->timestamps();

            $table->foreign('catId')->references('id')->on('categorias')->onDelete("cascade");
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
