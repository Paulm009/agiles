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
        Schema::create('habitacionesReservadas', function (Blueprint $table) {
            $table->bigIncrements("idHabitacionReservada");
            $table->unsignedBigInteger("idReserva");
            $table->unsignedBigInteger("idTipoHabitacion");
            $table->timestamps();
            $table->foreign("idReserva")->references("idReserva")->on('reserva');
            $table->foreign("idTipoHabitacion")->references("idTipo")->on('tipoHabitacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clienthabitaciohabitacionesReservadasnesReservadases');
    }
};
