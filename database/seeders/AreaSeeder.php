<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['departamento' => 'Recursos Humanos'],
            ['departamento' => 'Desarrollo Estrategico'],
            ['departamento' => 'Direccion General'],
            ['departamento' => 'Tecnología de la Información'],
            ['departamento' => 'Finanzas'],
            ['departamento' => 'Marketing'],
            ['departamento' => 'Ventas'],
            ['departamento' => 'Atención al Cliente'],
            ['departamento' => 'Logística'],
            ['departamento' => 'Producción'],
            ['departamento' => 'Calidad'],
            ['departamento' => 'Investigación y Desarrollo'],
        ];

        DB::table('areas')->insert($areas);
    }
}
