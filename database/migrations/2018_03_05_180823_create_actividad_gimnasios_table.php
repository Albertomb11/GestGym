<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadGimnasiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_gimnasios', function (Blueprint $table) {
        // Definimos los campos
        $table->integer('actividades_id')->unsigned();
        $table->integer('gimnasios_id')->unsigned();

        // Definimos la clave principal
        $table->primary(['actividades_id', 'gimnasios_id']);

        // Definimos las claves foráneas
        $table->foreign('actividades_id')->references('id')->on('actividades')->onDelete('cascade');
        $table->foreign('gimnasios_id')->references('id')->on('gimnasios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_gimnasios');
    }
}
