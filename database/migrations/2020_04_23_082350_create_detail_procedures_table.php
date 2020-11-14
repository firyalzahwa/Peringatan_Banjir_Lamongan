<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_procedures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sop_id')->nullable();
            $table->text('tindakan');

            $table->foreign('sop_id')->references('id')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_procedures');
    }
}
