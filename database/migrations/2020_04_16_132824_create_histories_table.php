<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("village_id")->nullable();
            $table->date("tanggal");
            $table->integer("kepala_keluarga");
            $table->integer("jiwa");
            $table->integer("rumah");
            $table->integer("sekolah");
            $table->integer("kantor_desa");
            $table->string("sawah");
            $table->string("jalan");

            $table->foreign('village_id')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
