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
            'capacidad' => '1',
            'precio'=>'500',
            'descripcion'=>'La habitación alfombrada con una alfombra Beni Ourain es una opción elegante y sofisticada. La alfombra Beni Ourain es de origen marroquí y 
                            está hecha de lana de oveja natural, lo que le da un aspecto cálido y acogedor. La habitación está decorada en tonos neutros y cálidos para
                             complementar la alfombra.',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'1',
            'nombreHabitacion'=>'La pregona',
            'capacidad' => '1',
            'precio'=>'600',
            'descripcion'=>'Ofrece un ambiente tranquilo y relajante. La habitación está decorada en un estilo sencillo pero elegante, con muebles cómodos y de calidad.
                            Desde la ventana de la habitación se puede disfrutar de una vista impresionante de los hermosos jardines y del área patrimonial del hotel,
                            con su distintiva y hermosa "La Pérgola". ',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'1',
            'nombreHabitacion'=>'Espejo Adnet',
            'capacidad' => '1',
            'precio'=>'550',
            'descripcion'=>'Simple',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Marriott',
            'capacidad' => '1',
            'precio'=>'500',
            'descripcion'=>'Doble',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Lampara de pie Arco',
            'capacidad' => '1',
            'precio'=>'600',
            'descripcion'=>'Doble',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'2',
            'nombreHabitacion'=>'Cama King',
            'capacidad' => '1',
            'precio'=>'550',
            'descripcion'=>'Doble',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'Armario Ikea',
            'capacidad' => '1',
            'precio'=>'500',
            'descripcion'=>'Triple',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'El Atico',
            'capacidad' => '1',
            'precio'=>'600',
            'descripcion'=>'Triple',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
        DB::table("habitacion")->insert([
            'idTipo'=>'3',
            'nombreHabitacion'=>'La Cima',
            'capacidad' => '1',
            'precio'=>'550',
            'descripcion'=>'Triple',
            'precioDescuento'=>'0',
            'created_at'=>now()
        ]);
    }
}
