<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente_credito');
            $table->integer('codigo_convenio_remitente')->nullable();
            $table->integer('id_tipo_entrega')->nullable();
            $table->boolean('aplica_contrapago')->nullable();
            $table->integer('id_servicio')->nullable();
            $table->decimal('peso')->nullable();
            $table->decimal('largo')->nullable();
            $table->decimal('ancho')->nullable();
            $table->decimal('alto')->nullable();
            $table->string('dice_contener', 50)->nullable();
            $table->decimal('valor_declarado')->nullable();
            $table->integer('id_tipo_envio')->nullable();
            $table->integer('id_forma_pago')->nullable();
            $table->integer('numero_pieza')->nullable();
            $table->string('descripcion_tipo_entrega', 50)->nullable();
            $table->string('nombre_tipo_envio', 50)->nullable();
            $table->integer('codigo_convenio')->nullable();
            $table->integer('id_sucursal')->nullable();
            $table->integer('id_cliente')->nullable();
            $table->string('observaciones', 250)->nullable();
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
        Schema::dropIfExists('guides');
    }
}
