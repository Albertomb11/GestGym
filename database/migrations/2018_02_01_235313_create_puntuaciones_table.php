<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntuacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntuaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monitores_id')->unsigned();
            $table->integer('estrellas');
            $table->string('comentario');

            $table->foreign('monitores_id')->references('id')->on('monitores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntuaciones');
    }
}
