<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
                // Área: Dirección Ejecutiva de Seguridad Aérea
                ['nombre' => 'DIRECCIÓN DE COMANDANCIA CENTRAL (AICM)', 'area_id' => 'DIRECCIÓN EJECUTIVA DE SEGURIDAD AÉREA'],
                ['nombre' => 'DIRECCIÓN DE VERIFICACIÓN AEROPORTUARIA', 'area_id' => 'DIRECCIÓN EJECUTIVA DE SEGURIDAD AÉREA'],
                ['nombre' => 'DIRECCIÓN DE SEGURIDAD AÉREA', 'area_id' => 'DIRECCIÓN EJECUTIVA DE SEGURIDAD AÉREA'],
                ['nombre' => 'DIRECCIÓN DE SEGURIDAD DE LA AVIACIÓN CIVIL', 'area_id' => 'DIRECCIÓN EJECUTIVA DE SEGURIDAD AÉREA'],
                ['nombre' => 'DIRECCIÓN DE AEROPUERTOS', 'area_id' => 'DIRECCIÓN EJECUTIVA DE SEGURIDAD AÉREA'],
                ['nombre' => 'DIRECCIÓN DE CERTIFICACIÓN DE LICENCIAS', 'area_id' => 'DIRECCIÓN EJECUTIVA DE SEGURIDAD AÉREA'],
                ['nombre' => 'DIRECCIÓN DE MEDICINA DE AVICIÓN', 'area_id' => 'DIRECCIÓN EJECUTIVA DE SEGURIDAD AÉREA'],
            
                // Área: Dirección Ejecutiva de Aviación
                ['nombre' => 'DIRECCIÓN DE AVICIÓN', 'area_id' => 'DIRECCIÓN EJECUTIVA DE AVIACIÓN'],
                ['nombre' => 'DIRECCIÓN DE NAVEGACIÓN AÉREA', 'area_id' => 'DIRECCIÓN EJECUTIVA DE AVIACIÓN'],
                ['nombre' => 'DIRECCIÓN DE INGENIERA, NORMAS Y CERTIFICACIÓN', 'area_id' => 'DIRECCIÓN EJECUTIVA DE AVIACIÓN'],
            
                // Área: Dirección Ejecutiva Técnica
                ['nombre' => 'N/A', 'area_id' => 'DIRECCIÓN EJECUTIVA TÉCNICA'],
            
                // Área: Dirección Ejecutiva de Transporte y Control Aeronáutico
                ['nombre' => 'DIRECCIÓN DEL REGISTRO AEROUNATICO MEXICANO', 'area_id' => 'DIRECCIÓN EJECUTIVA DE TRANSPORTE Y CONTROL AERONÁUTICO'],
        
                // Área: Dirección del SSP
                ['nombre' => 'N/A', 'area_id' => 'DIRECCIÓN DEL PROGRAMA DE SEGURIDAD OPERACIONAL DEL ESTADO MEXICANO - SSP'],
            
                // Área: Dirección de Desarrollo Estratégico
                ['nombre' => 'N/A', 'area_id' => 'DIRECCIÓN DE DESARROLLO ESTRATÉGICO'],
            
                // Área: Dirección de Administración y Finanzas
                ['nombre' => 'N/A', 'area_id' => 'DIRECCIÓN DE ADMINISTRACIÓN Y FINANZAS'],
       
                // Área: Dirección de Regulación Económica y Estadistica
                ['nombre' => 'N/A', 'area_id' => 'DIRECCIÓN DE REGULACIÓN ECONÓMICA Y ESTADÍSTICAS'],
                
                 // Área: Unidad de Gestión y Trámite
                ['nombre' => 'N/A', 'area_id' => 'UNIDAD DE GESTIÓN Y TRÁMITE'],
            ];

        DB::table('departments')->insert($departamentos);
    }
}
