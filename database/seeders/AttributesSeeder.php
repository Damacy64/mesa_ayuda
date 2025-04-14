<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            //Versiones de office
            ['tipo' => 'Office','valor' => 'Office 2016'],
            ['tipo' => 'Office','valor' => 'Office 2019'],
            ['tipo' => 'Office', 'valor' => 'Office 2021'],
            ['tipo' => 'Office', 'valor' => 'Office 365'],

            //Marca de la computadora
            ['tipo' => 'Marca', 'valor' => 'HP'],
            ['tipo' => 'Marca', 'valor' => 'Dell'],
            ['tipo' => 'Marca', 'valor' => 'Lenovo'],
            ['tipo' => 'Marca', 'valor' => 'Asus'],
            ['tipo' => 'Marca', 'valor' => 'Acer'],

            //Sistema operativo
            ['tipo' => 'S.O.', 'valor' => 'Windows 8'],
            ['tipo' => 'S.O.', 'valor' => 'Windows 10'],
            ['tipo' => 'S.O.', 'valor' => 'Windows 11'],
            ['tipo' => 'S.O.', 'valor' => 'Linux'],

            //Marca de procesador
            ['tipo' => 'Procesador', 'valor' => 'Intel'],
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
            ['tipo' => 'Tipo de equipo', 'valor' => 'Laptop'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'Escritorio'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'All-in-One'],
            ['tipo' => 'Tipo de equipo', 'valor' => 'Tablet'],
        ];
    }
}
