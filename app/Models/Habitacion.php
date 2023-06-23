<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = "habitacion";
    protected $primaryKey = 'idHabitacion';
    protected $fillable = ["idTipo","nombreHabitacion","precio","estado","descripcion","imagen"];
    public $timestamps = true;
    public function tipo() {
    	return $this->belongsTo('App\Models\Tipo','idTipo');
    }
}
