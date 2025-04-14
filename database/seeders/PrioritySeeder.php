<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priority = [
            ['nombre' => 'ALTA'],
            ['nombre' => 'BAJA'],
            ['nombre' => 'MEDIA'],
        ];

        DB::table('priority')->insert($priority);
    }
}
