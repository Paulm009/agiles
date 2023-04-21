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
    protected $fillable = ["idTipo","nombreHabitacion","precio","precioDescuento","descripcion"];
    public $timestamps = true;
}
