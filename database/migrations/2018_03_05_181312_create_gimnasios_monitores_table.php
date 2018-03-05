<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGimnasiosMonitoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gimnasios_monitores', function (Blueprint $table) {
            // Definimos los campos
            $table->integer('gimnasios_id')->unsigned();
            $table->integer('monitores_id')->unsigned();

            // Definimos la clave principal
            $table->primary(['gimnasios_id', 'monitores_id']);

            // Definimos las claves foráneas
            $table->foreign('gimnasios_id')->references('id')->on('gimnasios')->onDelete('cascade');
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
        Schema::dropIfExists('gimnasios_monitores');
    }
}
