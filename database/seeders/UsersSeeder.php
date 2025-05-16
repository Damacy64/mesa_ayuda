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
                'name' => 'SAMANTA ABIGAIL',
                'email' => 'samanta.valdovinos@afac.gob.mx',
                'last_name_p' => 'VALDOVINOS',
                'last_name_m' => 'GARCIA',
                'sex_id' => 'FEMENINO',
                'rol_id' => 'USUARIO',
                'employer_number' => '0000004',
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
                'name' =>'SALVADOR',
                'email' => 'salvador.gonzales@afac.gob.mx',
                'last_name_p' => 'GONZALES',
                'last_name_m' => 'GARCIA',
                'sex_id' => 'MASCULINO',
                'rol_id' => 'SOPORTE',
                'employer_number' => '0000005',
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
            [
                'ubicacion_id' => 'Piso 3',
                'area_id' => 'Dirección de Desarrollo Estratégico',
                'empleado_id' => 1,
            ],
            [
                'ubicacion_id' => 'Piso 2',
                'area_id' => 'Dirección Ejecutiva Técnica',
                'empleado_id' => 2,
            ]
        ];
        DB::table('user_finals')->insert($userFinal);

        $soporte = [
            [
                'estado' => 'HABILITADO',
                'empleado_id' => 3,
                'hora_entrada' => '09:00:00',
                'hora_salida' => '18:00:00',
            ],
            [
                'estado' => 'HABILITADO',
                'empleado_id' => 4,
                'hora_entrada' => '09:00:00',
                'hora_salida' => '18:00:00',
            ]
        ];
        DB::table('support')->insert($soporte);
    }
}
