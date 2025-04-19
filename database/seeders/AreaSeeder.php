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
            ['nombre' => 'Dirección de Control'],
            ['nombre' => 'Dirección del Centro Internacional de Adiestramiento en Aviación Civil'],
            ['nombre' => 'Dirección del Programa de Seguridad Operacional del Estado Mexicano - SSP'],
            ['nombre' => 'Dirección de Desarrollo Estratégico'],
            ['nombre' => 'Dirección de Administracion de la AFAC'],
        ];

        DB::table('areas')->insert($areas);
    }
}
