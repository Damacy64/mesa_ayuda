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
                ['nombre' => 'Dirección de Tarifas', 'area_id' => 'Dirección Ejecutiva Técnica'],
                ['nombre' => 'Subdirección Jurídica Contenciosa', 'area_id' => 'Dirección Ejecutiva Técnica'],
                ['nombre' => 'Jefatura de División Juridico Legal', 'area_id' => 'Dirección Ejecutiva Técnica'],
            
                // Área: Dirección Ejecutiva de Transporte y Control Aeronáutico
                ['nombre' => 'Dirección del Registro Aeronautico Mexicano', 'area_id' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
                ['nombre' => 'Coordinación de Transporte Aéreo no regular de taxi privado y servicios Aéreos', 'area_id' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
                ['nombre' => 'Coordinación de Transporte Aéreo Regular', 'area_id' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
                ['nombre' => 'Jefatura de Departamento Operacional', 'area_id' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
                ['nombre' => 'Coordinación de Concesiones de Transporte Aéreo', 'area_id' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
                ['nombre' => 'Coordinacion de Convenios Internaciones de Transporte Aéreo', 'area_id' => 'Dirección Ejecutiva de Transporte y Control Aeronáutico'],
            
                // Área: Dirección de Control
                ['nombre' => 'Coordinación de Operaciones Vuelo', 'area_id' => 'Dirección de Control'],
                ['nombre' => 'Coordinación de Operaciones Cabina', 'area_id' => 'Dirección de Control'],
            
                // Área: Dirección del CIAAC
                ['nombre' => 'Coordinación de Formación Técnica Aeronáutica Especializada', 'area_id' => 'Dirección del Centro Internacional de Adiestramiento en Aviación Civil'],
                ['nombre' => 'Coordinación de Programas para la Capacitación de Autoridades Aeronáuticas', 'area_id' => 'Dirección del Centro Internacional de Adiestramiento en Aviación Civil'],
                ['nombre' => 'Coordinación del programa de entrenamiento en el puesto de trabajo', 'area_id' => 'Dirección del Centro Internacional de Adiestramiento en Aviación Civil'],
                ['nombre' => 'Coordinación de Diseño Pedagógico de Programas Aeronáuticos', 'area_id' => 'Dirección del Centro Internacional de Adiestramiento en Aviación Civil'],
                ['nombre' => 'Coordinación de Calidad del CIAAC', 'area_id' => 'Dirección del Centro Internacional de Adiestramiento en Aviación Civil'],
            
                // Área: Dirección del SSP
                ['nombre' => 'Coordinación de Auditorías de Seguridad Operacional', 'area_id' => 'Dirección del Programa de Seguridad Operacional del Estado Mexicano - SSP'],
                ['nombre' => 'Coordinación de Gestión de Riesgo de Seguridad Operacional', 'area_id' => 'Dirección del Programa de Seguridad Operacional del Estado Mexicano - SSP'],
            
                // Área: Dirección de Desarrollo Estratégico
                ['nombre' => 'Departamento de Tecnología Informática y Atención a Usuarios', 'area_id' => 'Dirección de Desarrollo Estratégico'],
                ['nombre' => 'Departamento de Sistemas', 'area_id' => 'Dirección de Desarrollo Estratégico'],
                ['nombre' => 'Departamento de Proyectos Especiales', 'area_id' => 'Dirección de Desarrollo Estratégico'],
                ['nombre' => 'Departamento de Soporte Técnico y Redes', 'area_id' => 'Dirección de Desarrollo Estratégico'],
                ['nombre' => 'Jefatura de Departamento de Procesos', 'area_id' => 'Dirección de Desarrollo Estratégico'],
                ['nombre' => 'Jefatura de Departamento Operacional', 'area_id' => 'Dirección de Desarrollo Estratégico'],
            
                // Área: Dirección de Administración de la AFAC
                ['nombre' => 'Subdirección de Recursos Humanos', 'area_id' => 'Dirección de Administración de la AFAC'],
                ['nombre' => 'Subdirección de Recursos Financieros', 'area_id' => 'Dirección de Administración de la AFAC'],
                ['nombre' => 'Departamentos de Servicios Generales', 'area_id' => 'Dirección de Administración de la AFAC'],
                ['nombre' => 'Departamento de Recursos Materiales', 'area_id' => 'Dirección de Administración de la AFAC'],

        ];

        DB::table('departments')->insert($departamentos);
    }
}
