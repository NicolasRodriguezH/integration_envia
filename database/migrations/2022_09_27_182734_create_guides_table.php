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
            $table->id('IdClienteCredito');
            $table->integer('CodigoConvenioRemitente')->nullable();
            $table->integer('IdTipoEntrega')->nullable();
            $table->boolean('AplicaContrapago')->nullable();
            $table->integer('IdServicio')->nullable();
            $table->decimal('Peso')->nullable();
            $table->decimal('Largo')->nullable();
            $table->decimal('Ancho')->nullable();
            $table->decimal('Alto')->nullable();
            $table->string('DiceContener', 50)->nullable();
            $table->decimal('ValorDeclarado')->nullable();
            $table->integer('IdTipoEnvio')->nullable();
            $table->integer('IdFormaPago')->nullable();
            $table->integer('NumeroPieza')->nullable();
                $table->string('Destinatario_tipoDocumento', 2);
                $table->string('Destinatario_numeroDocumento', 20);
                $table->string('Destinatario_nombre', 50);
                $table->string('Destinatario_primerApellido', 50);
                $table->string('Destinatario_segundoApellido', 50);
                $table->string('Destinatario_telefono', 25);
                $table->string('Destinatario_direccion', 250);
                $table->integer('Destinatario_idDestinatario');
                $table->integer('Destinatario_idRemitente');
                $table->string('Destinatario_idLocalidad', 8);
                $table->integer('Destinatario_CodigoConvenio');
                $table->integer('Destinatario_ConvenioDestinatario');
            $table->string('DescripcionTipoEntrega', 50)->nullable();
            $table->string('NombreTipoEnvio', 50)->nullable();
            $table->integer('CodigoConvenio')->nullable();
            $table->integer('IdSucursal')->nullable();
            $table->integer('IdCliente')->nullable();
                $table->integer('RapiRadicado_numeroDeFolios')->nullable();
                $table->integer('RapiRadicado_codigoRapiRadicado')->nullable();
            $table->string('Observaciones', 250)->nullable();
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
