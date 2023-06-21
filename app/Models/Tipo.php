<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory;
    protected $table = "tipo";
    protected $primaryKey = 'idTipo';
    protected $fillable = ["idTipo","tipoHabitacion","capacidad"];
    public $timestamps = true;
    public function habitaciones() {
    	return $this->hasMany('App\Models\Habitacion','idtipo','idTipo');
    }
}
