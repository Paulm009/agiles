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
        Schema::create('habitacion', function (Blueprint $table) {
            $table->bigIncrements("idHabitacion");
            $table->unsignedBigInteger("idTipo");
            $table->String("nombreHabitacion",50);
            $table->integer("precio");
            $table->integer("capacidad");
            $table->integer("precioDescuento");
            $table->text("descripcion");
            $table->timestamps();
            $table->foreign("idTipo")->references("idTipo")->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacion');
    }
};
