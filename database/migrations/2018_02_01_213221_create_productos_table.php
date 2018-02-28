<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gimnasio_id')->unsigned();
            $table->string('nombre');
            $table->integer('precio');
            $table->integer('stock');
            $table->string('sabor');
            $table->string('caracteristicas');

            $table->foreign('gimnasio_id')->references('id')->on('gimnasios');
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
        Schema::dropIfExists('productos');
    }
}
