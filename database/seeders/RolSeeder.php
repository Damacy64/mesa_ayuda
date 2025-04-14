<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol = [
            ['rol' => 'ADMIN'],
            ['rol' => 'USUARIO'],
            ['rol' => 'SOPORTE'],
        ];

        DB::table('roles')->insert($rol);
    }
}
