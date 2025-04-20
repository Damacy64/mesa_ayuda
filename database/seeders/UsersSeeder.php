<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'name' => 'LUIS RICARDO',
                'email' => 'luis.reyes@afac.gob.mx',
                'last_name_p' => 'REYES',
                'last_name_m' => 'PEREZ',
                'sex_id' => 'MASCULINO',
                'rol_id' => 'USUARIO',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'BRENDA CITLALI',
                'email' => 'brenda.lobaton@afac.gob.mx',
                'last_name_p' => 'LOBATON',
                'last_name_m' => 'PAEZ',
                'sex_id' => 'MASCULINO',
                'rol_id' => 'USUARIO',
                'password' => Hash::make('password'),
            ],
        );
    }
}
