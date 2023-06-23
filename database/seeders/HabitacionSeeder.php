<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("habitacion")->insert([
            'idTipo'=>'1',
            'nombreHabitacion'=>'Alfombra Beni Ourain',
            'precio'=>'500',
            'descripcion'=>'Esta habitación cuenta con 32 metros cuadrados, una cama king size, amplios espacios y vistas a los jardines.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'1',
            'nombreHabitacion'=>'La pregona',
            'precio'=>'600',
            'descripcion'=>'Esta habitación cuenta con 32 metros cuadrados, dos camas tamaño queen, ideales para viajes en grupo.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'1',
            'nombreHabitacion'=>'Espejo Adnet',
            'precio'=>'550',
            'descripcion'=>'Esta habitación cuenta con 32 metros cuadrados, una cama king size, amplios espacios y vistas a los jardines.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Marriott',
            'precio'=>'700',
            'descripcion'=>'Esta habitación cuenta con 44 metros cuadrados, cama king size, sala de estar, vestidor y fina decoración.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Lampara de pie Arco',
            'precio'=>'700',
            'descripcion'=>'Esta habitación cuenta con 44 metros cuadrados, cama king size, sala de estar, vestidor y fina decoración.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Cama King',
            'precio'=>'750',
            'descripcion'=>'Esta habitación cuenta con 44 metros cuadrados, cama king size, sala de estar, vestidor y fina decoración.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'Armario Ikea',
            'precio'=>'900',
            'descripcion'=>'Esta habitación cuenta con 52 metros cuadrados, es una gran suite dividida en dos habitaciones con una cama king size, sala de estar, hidromasaje, vestidor y una fina decoración.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'El Atico',
            'precio'=>'900',
            'descripcion'=>'Esta habitación cuenta con 52 metros cuadrados, es una gran suite dividida en dos habitaciones con una cama king size, sala de estar, hidromasaje, vestidor y una fina decoración.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'La Cima',
            'precio'=>'950',
            'descripcion'=>'Esta habitación cuenta con 52 metros cuadrados, es una gran suite dividida en dos habitaciones con una cama king size, sala de estar, hidromasaje, vestidor y una fina decoración.',
            'created_at'=>now()
        ]);
    }
}
