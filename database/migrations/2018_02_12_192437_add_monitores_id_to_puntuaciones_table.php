<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonitoresIdToPuntuacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('puntuaciones', function (Blueprint $table) {
            $table->integer('monitores_id')->unsigned()->after('id');
            $table->foreign('monitores_id')->references('id')->on('monitores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puntuaciones', function (Blueprint $table) {
            $table->dropForeign('puntuaciones_monitores_id_foreign');
            $table->dropColumn('monitores_id');
        });
    }
}
