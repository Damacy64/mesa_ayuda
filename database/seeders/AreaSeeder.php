<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['departamento' => 'Dirrección General de la Agencia Federal de Aviación Civil'],
            ['departamento' => 'Dirección Ejecutiva como Representante Permanente en el Extranjero ante la OACI'],
            ['departamento' => 'Unidad de Gestion y Tramite'],
            ['departamento' => 'Dirección Ejecutiva de Seguridad Aérea'],
            ['departamento' => 'Dirección Ejecutiva de Aviación'],
            ['departamento' => 'Dirección Ejecutiva Técnica'],
            ['departamento' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
            ['departamento' => 'Dirección de Control'],
            ['departamento' => 'Dirección de Comandancia encargada de SLOTS'],
            ['departamento' => 'Dirección del Centro Internacional de Adiestramiento en Aviación Civil'],
            ['departamento' => 'Dirección del Programa de Seguridad Operacional del Estado Mexicano - SSP'],
            ['departamento' => 'Dirección de Desarrollo Estratégico'],
            ['departamento' => 'Dirección de Administracion de la AFAC'],
            ['departamento' => 'Dirección de Comandancia Central AICM'],
            ['departamento' => 'Dirección de Verificación Aeroportuaria'],
            ['departamento' => 'Dirección de Seguridad Aérea'],
            ['departamento' => 'Dirección de la Aviación Civil'],
            ['departamento' => 'Dirección de Aeropuertos'],
            ['departamento' => 'Dirección de Certificacion de Licencias'],
            ['departamento' => 'Dirección de Comandancia Encargado de Medicina de Aviación'],
            ['departamento' => 'Dirección de Comandancia Región I'],
            ['departamento' => 'Dirección de Comandancia Región II'],
            ['departamento' => 'Dirección de Comandancia Región III'],
            ['departamento' => 'Dirección de Comandancia Región IV'],
            ['departamento' => 'Dirección de Comandancia Región V'],
            ['departamento' => 'Dirección de Comandancia Región VI'],
            ['departamento' => 'Dirección de Ingeniería, Normas y Certificación'],
            ['departamento' => 'Dirección de Aviación'],
            ['departamento' => 'Dirección de Navegación Aérea'],
            ['departamento' => 'Dirección de Tarifas'],
            ['departamento' => 'Dirección Comandancia Central Encargado del Registro Aeronáutico Mexicano'],
        ];

        DB::table('areas')->insert($areas);
    }
}
