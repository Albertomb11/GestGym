<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadeGimnasioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividade_gimnasio', function (Blueprint $table) {
        // Definimos los campos
        $table->integer('actividade_id')->unsigned();
        $table->integer('gimnasio_id')->unsigned();

        // Definimos la clave principal
        $table->primary(['actividade_id', 'gimnasio_id']);

        // Definimos las claves foráneas
        $table->foreign('actividade_id')->references('id')->on('actividades')->onDelete('cascade');
        $table->foreign('gimnasio_id')->references('id')->on('gimnasios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividade_gimnasio');
    }
}
