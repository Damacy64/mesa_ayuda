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
            ['piso' => 'PISO 1'],
            ['piso' => 'PISO 2'],
            ['piso' => 'PISO 3'],
            ['piso' => 'PISO 4'],
            ['piso' => 'PISO 5'],
            ['piso' => 'PISO 6'],
            ['piso' => 'PISO 7'],
            ['piso' => 'PISO 8'],
            ['piso' => 'PISO PH'],
            ['piso' => 'PISO PB'],
        ];

        DB::table('locations')->insert($location);
    }
}
