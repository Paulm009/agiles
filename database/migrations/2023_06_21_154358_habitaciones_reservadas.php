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
            $table->increments("aux");
            $table->BigInteger("idReserva");
            $table->BigInteger("idHabitacion");
            $table->timestamps();
            $table->foreign("idReserva")->references("idReserva")->on('reserva');

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
