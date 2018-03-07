<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadMonitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_monitor', function (Blueprint $table) {
            // Definimos los campos
            $table->integer('actividad_id')->unsigned();
            $table->integer('monitor_id')->unsigned();

            // Definimos la clave principal
            $table->primary(['actividad_id', 'monitor_id']);

            // Definimos las claves foráneas
            $table->foreign('actividad_id')->references('id')->on('actividades')->onDelete('cascade');
            $table->foreign('monitor_id')->references('id')->on('monitores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_monitor');
    }
}
