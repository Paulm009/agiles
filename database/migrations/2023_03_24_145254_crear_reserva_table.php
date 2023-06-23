<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->bigIncrements("idReserva");
            $table->unsignedBigInteger("idCliente");
            $table->dateTime("fechaReserva");
            $table->dateTime("fechaInicio");
            $table->dateTime("fechaFin");
            $table->integer("monto");
            $table->integer("cantidad");
            $table->timestamps();
            $table->foreign("idCliente")->references("idCliente")->on('clientes');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
