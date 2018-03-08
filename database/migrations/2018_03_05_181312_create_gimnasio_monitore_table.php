<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGimnasioMonitoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gimnasio_monitore', function (Blueprint $table) {
            // Definimos los campos
            $table->integer('gimnasio_id')->unsigned();
            $table->integer('monitore_id')->unsigned();

            // Definimos la clave principal
            $table->primary(['gimnasio_id', 'monitore_id']);

            // Definimos las claves foráneas
            $table->foreign('gimnasio_id')->references('id')->on('gimnasios')->onDelete('cascade');
            $table->foreign('monitore_id')->references('id')->on('monitores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gimnasio_monitore');
    }
}
