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
                ['nombre' => 'Dirección de Comandancia Central (AICM)', 'area_id' => 'Dirección Ejecutiva de Seguridad Aérea'],
                ['nombre' => 'Dirección de Verificación Aeroportuaria', 'area_id' => 'Dirección Ejecutiva de Seguridad Aérea'],
                ['nombre' => 'Dirección de Seguridad Aérea', 'area_id' => 'Dirección Ejecutiva de Seguridad Aérea'],
                ['nombre' => 'Dirección de Seguridad de la Aviación Civil', 'area_id' => 'Dirección Ejecutiva de Seguridad Aérea'],
                ['nombre' => 'Dirección de Aeropuertos', 'area_id' => 'Dirección Ejecutiva de Seguridad Aérea'],
                ['nombre' => 'Dirección de Certificación de Licencias', 'area_id' => 'Dirección Ejecutiva de Seguridad Aérea'],
                ['nombre' => 'Dirección de Medicina de Aviación', 'area_id' => 'Dirección Ejecutiva de Seguridad Aérea'],
            
                // Área: Dirección Ejecutiva de Aviación
                ['nombre' => 'Dirección de Aviación', 'area_id' => 'Dirección Ejecutiva de Aviación'],
                ['nombre' => 'Dirección de Navegación Aérea', 'area_id' => 'Dirección Ejecutiva de Aviación'],
                ['nombre' => 'Dirección de Ingeniería, Normas y Certificación', 'area_id' => 'Dirección Ejecutiva de Aviación'],
            
                // Área: Dirección Ejecutiva Técnica
                ['nombre' => 'N/A', 'area_id' => 'Dirección Ejecutiva Técnica'],
            
                // Área: Dirección Ejecutiva de Transporte y Control Aeronáutico
                ['nombre' => 'Dirección del Registro Aeronautico Mexicano', 'area_id' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
        
                // Área: Dirección del SSP
                ['nombre' => 'N/A', 'area_id' => 'Dirección del Programa de Seguridad Operacional del Estado Mexicano - SSP'],
            
                // Área: Dirección de Desarrollo Estratégico
                ['nombre' => 'N/A', 'area_id' => 'Dirección de Desarrollo Estratégico'],
            
                // Área: Dirección de Administración y Finanzas
                ['nombre' => 'N/A', 'area_id' => 'Dirección de Administración y Finanzas'],
       
                // Área: Dirección de Regulación Económica y Estadistica
                ['nombre' => 'N/A', 'area_id' => 'Dirección de Regulación Económica y Estadistica'],
                
                 // Área: Unidad de Gestión y Trámite
                ['nombre' => 'N/A', 'area_id' => 'Unidad de Gestión y Trámite'],
            ];

        DB::table('departments')->insert($departamentos);
    }
}
