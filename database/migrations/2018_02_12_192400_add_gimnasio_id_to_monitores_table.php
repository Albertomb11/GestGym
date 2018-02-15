<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGimnasioIdToMonitoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monitores', function (Blueprint $table) {
            $table->integer('gimnasio_id')->unsigned()->after('id');
            $table->foreign('gimnasio_id')->references('id')->on('gimnasios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monitores', function (Blueprint $table) {
            $table->dropForeign('monitores_gimnasio_id_foreign');
            $table->dropColumn('gimnasio_id');
        });
    }
}
