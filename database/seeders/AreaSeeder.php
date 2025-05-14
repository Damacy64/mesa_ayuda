<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['nombre' => 'DIRECCIÓN EJECUTIVA DE SEGURIDAD AÉREA'],
            ['nombre' => 'DIRECCIÓN EJECUTIVA DE AVIACIÓN'],
            ['nombre' => 'DIRECCIÓN EJECUTIVA TÉCNICA'],
            ['nombre' => 'DIRECCIÓN EJECUTIVA DE TRANSPORTE Y CONTROL AERONÁUTICO'],
            ['nombre' => 'DIRECCIÓN DEL PROGRAMA DE SEGURIDAD OPERACIONAL DEL ESTADO MEXICANO - SSP'],
            ['nombre' => 'DIRECCIÓN DE DESARROLLO ESTRATÉGICO'],
            ['nombre' => 'DIRECCIÓN DE ADMINISTRACIÓN Y FINANZAS'],
            ['nombre' => 'DIRECCIÓN DE REGULACIÓN ECONÓMICA Y ESTADÍSTICAS'],
            ['nombre' => 'UNIDAD DE GESTIÓN Y TRÁMITE'],
        ];

        DB::table('areas')->insert($areas);
    }
}
