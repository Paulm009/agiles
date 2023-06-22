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
            'descripcion'=>'La habitación alfombrada con una alfombra Beni Ourain es una opción elegante y sofisticada. La alfombra Beni Ourain es de origen marroquí y 
                            está hecha de lana de oveja natural, lo que le da un aspecto cálido y acogedor. La habitación está decorada en tonos neutros y cálidos para
                             complementar la alfombra.',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'1',
            'nombreHabitacion'=>'La pregona',
            'precio'=>'600',
            'descripcion'=>'Ofrece un ambiente tranquilo y relajante. La habitación está decorada en un estilo sencillo pero elegante, con muebles cómodos y de calidad.
                            Desde la ventana de la habitación se puede disfrutar de una vista impresionante de los hermosos jardines y del área patrimonial del hotel,
                            con su distintiva y hermosa "La Pérgola". ',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'1',
            'nombreHabitacion'=>'Espejo Adnet',
            'precio'=>'550',
            'descripcion'=>'Simple',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Marriott',
            'precio'=>'500',
            'descripcion'=>'Doble',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Lampara de pie Arco',
            'precio'=>'600',
            'descripcion'=>'Doble',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Cama King',
            'precio'=>'550',
            'descripcion'=>'Doble',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'Armario Ikea',
            'precio'=>'500',
            'descripcion'=>'Triple',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'El Atico',
            'precio'=>'600',
            'descripcion'=>'Triple',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'La Cima',
            'precio'=>'550',
            'descripcion'=>'Triple',
            'created_at'=>now()
        ]);
    }
}
