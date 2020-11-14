<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandheightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landheights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('total');

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
        Schema::dropIfExists('landheights');
    }
}
