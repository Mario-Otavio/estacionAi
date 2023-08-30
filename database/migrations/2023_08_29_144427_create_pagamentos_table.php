<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veiculo_id'); // Chave estrangeira para o veículo
            $table->string('forma_pagamento'); // Forma de pagamento (dinheiro, cartão, pix, etc.)
            $table->decimal('valor', 10, 2); // Valor do pagamento
            $table->timestamps();

            // Chave estrangeira para o veículo
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
};
