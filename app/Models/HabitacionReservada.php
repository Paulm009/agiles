<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabitacionReservada extends Model
{
    use HasFactory;

    protected $table = 'habitacionesreservadas';
    protected $primaryKey = 'idHabitacionReservada';

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'idReserva');
    }

}
