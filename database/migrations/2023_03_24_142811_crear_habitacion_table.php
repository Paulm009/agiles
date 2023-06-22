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
            $table->text("descripcion");
            $table->boolean('estado')->default(true); 
            $table->timestamps();
            $table->foreign("idTipo")->references("idTipo")->on('tipoHabitacion');
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
