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
            $table->string('tipo_documento', 2)->nullable();
            $table->string('numero_documento', 20)->nullable();
            $table->string('nombre', 50)->nullable();
            $table->string('primer_apellido', 50)->nullable();
            $table->string('segundo_apellido', 50)->nullable();
            $table->string('telefono', 25)->nullable();
            $table->string('direccion', 250)->nullable();
            $table->integer('id_destinatario')->nullable();
            $table->integer('id_remitente')->nullable();
            $table->string('id_localidad', 8)->nullable();
            $table->integer('codigo_convenio')->nullable();
            $table->integer('convenio_destinatario')->nullable();
            $table->string('correo')->nullable();
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
        Schema::dropIfExists('receivers');
    }
}
