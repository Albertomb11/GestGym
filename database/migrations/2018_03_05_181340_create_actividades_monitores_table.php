<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesMonitoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_monitores', function (Blueprint $table) {
            // Definimos los campos
            $table->integer('actividades_id')->unsigned();
            $table->integer('monitores_id')->unsigned();

            // Definimos la clave principal
            $table->primary(['actividades_id', 'monitores_id']);

            // Definimos las claves foráneas
            $table->foreign('actividades_id')->references('id')->on('actividades')->onDelete('cascade');
            $table->foreign('monitores_id')->references('id')->on('monitores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_monitores');
    }
}
