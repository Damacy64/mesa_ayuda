<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categorías
        $computoId     = DB::table('opciones')->insertGetId(['nivel' => 'categoria', 'valor' => 'Cómputo']);
        $impresionId   = DB::table('opciones')->insertGetId(['nivel' => 'categoria', 'valor' => 'Impresión']);
        $eventosId     = DB::table('opciones')->insertGetId(['nivel' => 'categoria', 'valor' => 'Programación de eventos']);
        $sistemasId    = DB::table('opciones')->insertGetId(['nivel' => 'categoria', 'valor' => 'Sistemas']);

        // Tipos (bajo sistemas)
        $afacId    = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'AFAC', 'parent_id' => $sistemasId]);
        $cassId   = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'CASS', 'parent_id' => $sistemasId]);
        $eLicenciasId = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'E-LICENCIAS', 'parent_id' => $sistemasId]);
        $siacId   = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'SIAC', 'parent_id' => $sistemasId]);
        $siarId   = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'SIAR', 'parent_id' => $sistemasId]);
        $competenciaLinguisticaId = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'COMPETENCIA LINGüISTICA', 'parent_id' => $sistemasId]);
        $capacitacionAfacId = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'CAPACITACION AFAC', 'parent_id' => $sistemasId]);

        // Tipos (bajo Cómputo)
        $laptopId      = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'Laptop', 'parent_id' => $computoId]);
        $escritorioId  = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'Escritorio', 'parent_id' => $computoId]);
        $tabletId      = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'Tablet', 'parent_id' => $computoId]);

        // Tipos (bajo Impresión)
        $multifuncionalId = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'Multifuncional', 'parent_id' => $impresionId]);
        $impresoraId      = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'Impresora', 'parent_id' => $impresionId]);
        $escaneoId        = DB::table('opciones')->insertGetId(['nivel' => 'tipo', 'valor' => 'Escaneo', 'parent_id' => $impresionId]);

        // Componentes (bajo Laptop)
        $pantallaId  = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'Pantalla', 'parent_id' => $laptopId]);
        $tecladoId  = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'Teclado', 'parent_id' => $laptopId]);
        $bateriaId  = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'Batería', 'parent_id' => $laptopId]);
        $generalId = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'General', 'parent_id' => $laptopId]);
        $panelTactilId = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'Panel Táctil', 'parent_id' => $laptopId]);

        // Componentes (bajo Escritorio)
        $cpuId       = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'CPU', 'parent_id' => $escritorioId]);
        $monitorId   = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'Monitor', 'parent_id' => $escritorioId]);
        $tecladoId   = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'Teclado', 'parent_id' => $escritorioId]);
        $mouseId     = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'Mouse', 'parent_id' => $escritorioId]);
        $perifericoId    = DB::table('opciones')->insertGetId(['nivel' => 'componente', 'valor' => 'Perifericos', 'parent_id' => $escritorioId]);

        // Fallas (bajo CPU)
        DB::table('opciones')->insert([
            ['nivel' => 'falla', 'valor' => 'No enciende', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'Pantalla azul', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'Reinicios aleatorios', 'parent_id' => $cpuId],
        ]);

        // Fallas (bajo Monitor)
        DB::table('opciones')->insert([
            ['nivel' => 'falla', 'valor' => 'No muestra imagen', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'Se apaga solo', 'parent_id' => $monitorId],
        ]);

        // Fallas (bajo Teclado)
        DB::table('opciones')->insert([
            ['nivel' => 'falla', 'valor' => 'Teclas no responden', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'Teclado no detectado', 'parent_id' => $tecladoId],
        ]);
    }
}
