<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['nombre' => 'Dirección Ejecutiva de Seguridad Aérea'],
            ['nombre' => 'Dirección Ejecutiva de Aviación'],
            ['nombre' => 'Dirección Ejecutiva Técnica'],
            ['nombre' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
            ['nombre' => 'Dirección del Programa de Seguridad Operacional del Estado Mexicano - SSP'],
            ['nombre' => 'Dirección de Desarrollo Estratégico'],
            ['nombre' => 'Dirección de Administración y Finanzas'],
            ['nombre' => 'Dirección de Regulación Económica y Estadistica'],
            ['nombre' => 'Unidad de Gestión y Trámite'],
        ];

        DB::table('areas')->insert($areas);
    }
}
