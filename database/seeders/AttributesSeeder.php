<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            //Versiones de office
            ['tipo' => 'Office','valor' => 'OFFICCE 2016'],
            ['tipo' => 'Office','valor' => 'OFFICCE 2019'],
            ['tipo' => 'Office', 'valor' => 'OFFICCE 2021'],
            ['tipo' => 'Office', 'valor' => 'OFFICCE 365'],

            //Marca de la computadora
            ['tipo' => 'Marca', 'valor' => 'HP'],
            ['tipo' => 'Marca', 'valor' => 'DELL'],
            ['tipo' => 'Marca', 'valor' => 'LENOVO'],
            ['tipo' => 'Marca', 'valor' => 'ASUS'],
            ['tipo' => 'Marca', 'valor' => 'ACER'],

            //Sistema operativo
            ['tipo' => 'S.O.', 'valor' => 'WINDOWS 8'],
            ['tipo' => 'S.O.', 'valor' => 'WINDOWS 10'],
            ['tipo' => 'S.O.', 'valor' => 'WINDOWS 11'],
            ['tipo' => 'S.O.', 'valor' => 'LINUX'],

            //Marca de procesador
            ['tipo' => 'Procesador', 'valor' => 'INTEL'],
            ['tipo' => 'Procesador', 'valor' => 'AMD'],

            //Disco duro
            ['tipo' => 'Almacenamiento', 'valor' => '120 GB'],
            ['tipo' => 'Almacenamiento', 'valor' => '250 GB'],
            ['tipo' => 'Almacenamiento', 'valor' => '500 GB'],
            ['tipo' => 'Almacenamiento', 'valor' => '1 TB'],

            //Memoria RAM
            ['tipo' => 'RAM', 'valor' => '4 GB'],
            ['tipo' => 'RAM', 'valor' => '8 GB'],
            ['tipo' => 'RAM', 'valor' => '16 GB'],
            ['tipo' => 'RAM', 'valor' => '32 GB'],

            //Tipos de equipo
            ['tipo' => 'Tipo de equipo', 'valor' => 'LAPTOP'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'ESCRITORIO'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'ALL-IN-ONE'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'TABLET'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'IMPRESORA'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'MULTIFUNCIONAL'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'ESCÁNER'],            
        ];

        DB::table('attributes')->insert($attributes);
    }
}
