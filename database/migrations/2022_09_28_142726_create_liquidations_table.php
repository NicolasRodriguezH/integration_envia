<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidations', function (Blueprint $table) {
            $table->id('IdPreenvio');
            $table->longText('numeroPreenvio')->nullable();
            $table->date('fechaVencimineto')->nullable();
            $table->date('fechaCreacion')->nullable();
            $table->decimal('valorFlete')->nullable();
            $table->decimal('valorSobreFlete')->nullable();
            $table->decimal('valorServicioContrapago')->nullable();
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
        Schema::dropIfExists('liquidations');
    }
}
