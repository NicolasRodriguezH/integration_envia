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
            $table->string('DescripcionTipoEntrega', 50)->nullable();
            $table->string('NombreTipoEnvio', 50)->nullable();
            $table->integer('CodigoConvenio')->nullable();
            $table->integer('IdSucursal')->nullable();
            $table->integer('IdCliente')->nullable();
            $table->string('Observaciones', 250)->nullable();
            /* $table->unsignedBigInteger('settlements_id');
            $table->foreign('settlement_id')
                    ->references('IdPreenvio')
                    ->on('settlements')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); */
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
