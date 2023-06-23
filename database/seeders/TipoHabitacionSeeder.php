<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tipoHabitacion")->insert([
            'idTipo'=>'1',
            'tipoHabitacion'=>'Simple',
            'capacidad'=>'1',
            'created_at'=>now()
        ]);
        DB::table("tipoHabitacion")->insert([
            'idTipo'=>'2',
            'tipoHabitacion'=>'Doble',
            'capacidad'=>'2',
            'created_at'=>now()
        ]);
        DB::table("tipoHabitacion")->insert([
            'idTipo'=>'3',
            'tipoHabitacion'=>'Triple',
            'capacidad'=>'4',
            'created_at'=>now()
        ]);
        DB::table("tipoHabitacion")->insert([
            'idTipo'=>'4',
            'tipoHabitacion'=>'King',
            'capacidad'=>'4',
            'created_at'=>now()
        ]);
    }
}
