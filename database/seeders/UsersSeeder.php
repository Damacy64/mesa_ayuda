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

        $users = [
            [
                'name' => 'LUIS RICARDO',
                'email' => 'luis.reyes@afac.gob.mx',
                'last_name_p' => 'REYES',
                'last_name_m' => 'PEREZ',
                'sex_id' => 'MASCULINO',
                'rol_id' => 'USUARIO',
                'employer_number' => '0000001',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'BRENDA CITLALI',
                'email' => 'brenda.lobaton@afac.gob.mx',
                'last_name_p' => 'LOBATON',
                'last_name_m' => 'PAEZ',
                'sex_id' => 'FEMENINO',
                'rol_id' => 'SOPORTE',
                'employer_number' => '0000002',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'JAVIER ALBERTO',
                'email' => 'javier.hernandez@afac.gob.mx',
                'last_name_p' => 'HERNANDEZ',
                'last_name_m' => 'GARCIA',
                'sex_id' => 'MASCULINO',
                'rol_id' => 'ADMIN',
                'employer_number' => '0000003',
                'password' => Hash::make('password'),
            ]
        ];
        DB::table('users')->insert($users);

        $userFinal = [
            'ubicacion_id' => 'Piso 3',
            'area_id' => 'Dirección de Desarrollo Estratégico',
            'empleado_id' => 1,
        ];
        DB::table('user_finals')->insert($userFinal);

        $soporte = [
            'carga_trabajo' => 1,
            'disponibilidad' => 'DESOCUPADO',
            'estado' => 'ACTIVO',
            'empleado_id' => 2,
        ];
        DB::table('support')->insert($soporte);
    }
}
