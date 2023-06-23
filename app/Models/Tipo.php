<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory;
    protected $table = "tipohabitacion";
    protected $primaryKey = 'idTipo';
    protected $fillable = ["tipo","capacidad"];
    public $timestamps = true;
    public function habitaciones() {
    	return $this->hasMany('App\Models\Habitacion','idtipo','idTipo');
    }

    public function habitacionesReservadas(){
        return $this->hasMany('App\Models\HabitacionReservada', 'idTipoHabitacion');
    }

}
