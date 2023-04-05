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
            $table->unsignedBigInteger("idHabitacion");
            $table->dateTime("fechaInicio");
            $table->dateTime("fechaFin");
            $table->integer("montoRecepcionado");
            $table->string("ubicacionComprobante",100);
            $table->timestamps();
            $table->foreign("idCliente")->references("idCliente")->on('cliente');
            $table->foreign("idHabitacion")->references("idHabitacion")->on('habitacion');

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
