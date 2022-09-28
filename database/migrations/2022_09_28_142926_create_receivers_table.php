<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivers', function (Blueprint $table) {
            $table->id();
            $table->string('tipoDocumento', 2)->nullable();
            $table->string('numeroDocumento', 20)->nullable();
            $table->string('nombre', 50)->nullable();
            $table->string('primerApellido', 50)->nullable();
            $table->string('segundoApellido', 50)->nullable();
            $table->string('telefono', 25)->nullable();
            $table->string('direccion', 250)->nullable();
            $table->integer('idDestinatario')->nullable();
            $table->integer('idRemitente')->nullable();
            $table->string('idLocalidad', 8)->nullable();
            $table->integer('CodigoConvenio')->nullable();
            $table->integer('ConvenioDestinatario')->nullable();
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
        Schema::dropIfExists('receivers');
    }
}
