<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapiRadicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapi_radicados', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_de_folios')->nullable();
            $table->integer('codigo_rapi_radicado')->nullable();
            $table->unsignedBigInteger('guide_id');
            $table->foreign('guide_id')
                ->references('id')
                ->on('guides');
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
        Schema::dropIfExists('rapi_radicados');
    }
}
