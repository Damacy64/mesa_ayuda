<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = [
            ['piso' => 'Piso 1'],
            ['piso' => 'Piso 2'],
            ['piso' => 'Piso 3'],
            ['piso' => 'Piso 4'],
            ['piso' => 'Piso 5'],
            ['piso' => 'Piso 6'],
            ['piso' => 'Piso 7'],
            ['piso' => 'Piso 8'],
            ['piso' => 'Piso PH'],
            ['piso' => 'Piso PB'],
        ];

        DB::table('locations')->insert($location);
    }
}
