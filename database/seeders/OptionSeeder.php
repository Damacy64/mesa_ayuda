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
        $computoId     = DB::table('option')->insertGetId(['nivel' => 'categoria', 'valor' => 'CÓMPUTO']);
        $impresionId   = DB::table('option')->insertGetId(['nivel' => 'categoria', 'valor' => 'IMPRESIÓN']);
        $eventosId     = DB::table('option')->insertGetId(['nivel' => 'categoria', 'valor' => 'PROGRAMACIÓN DE EVENTOS']);
        $sistemasId    = DB::table('option')->insertGetId(['nivel' => 'categoria', 'valor' => 'SISTEMAS']);

        // Tipos (bajo sistemas)
        DB::table('option')->insert([
            ['nivel' => 'tipo', 'valor' => 'AFAC', 'parent_id' => $sistemasId],
            ['nivel' => 'tipo', 'valor' => 'CASS', 'parent_id' => $sistemasId],
            ['nivel' => 'tipo', 'valor' => 'E-LICENCIAS', 'parent_id' => $sistemasId],
            ['nivel' => 'tipo', 'valor' => 'SIAC', 'parent_id' => $sistemasId],
            ['nivel' => 'tipo', 'valor' => 'SIAR', 'parent_id' => $sistemasId],
            ['nivel' => 'tipo', 'valor' => 'COMPETENCIA LINGüISTICA', 'parent_id' => $sistemasId],
            ['nivel' => 'tipo', 'valor' => 'CAPACITACION AFAC', 'parent_id' => $sistemasId],
        ]);

        // Tipos (bajo Cómputo)
        $laptopId      = DB::table('option')->insertGetId(['nivel' => 'tipo', 'valor' => 'LAPTOP', 'parent_id' => $computoId]);
        $escritorioId  = DB::table('option')->insertGetId(['nivel' => 'tipo', 'valor' => 'ESCRITORIO', 'parent_id' => $computoId]);
        $tabletId      = DB::table('option')->insertGetId(['nivel' => 'tipo', 'valor' => 'TABLET', 'parent_id' => $computoId]);

        // Fallas (bajo Tablet)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No enciende', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'Pantalla no responde', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'Problemas con Wi-Fi', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'Bluetooth no funciona', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'No carga', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'Sin sonido', 'parent_id' => $tabletId],
        ]);

        // Tipos (bajo Impresión)
        $multifuncionalId = DB::table('option')->insertGetId(['nivel' => 'tipo', 'valor' => 'MULTIFUNCIONAL', 'parent_id' => $impresionId]);
        $impresoraId      = DB::table('option')->insertGetId(['nivel' => 'tipo', 'valor' => 'IMPRESORA', 'parent_id' => $impresionId]);
        $escanerId        = DB::table('option')->insertGetId(['nivel' => 'tipo', 'valor' => 'ESCÁNER', 'parent_id' => $impresionId]);

        //Fallas (bajo Multifuncional)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No imprime', 'parent_id' => $multifuncionalId],
            ['nivel' => 'falla', 'valor' => 'Atasco de papel', 'parent_id' => $multifuncionalId],
            ['nivel' => 'falla', 'valor' => 'Problema con el escáner', 'parent_id' => $multifuncionalId],
            ['nivel' => 'falla', 'valor' => 'Problema con el fax', 'parent_id' => $multifuncionalId],
        ]);

        // Fallas (bajo Escaner)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No escanea', 'parent_id' => $escanerId],
            ['nivel' => 'falla', 'valor' => 'Imagen borrosa', 'parent_id' => $escanerId],
            ['nivel' => 'falla', 'valor' => 'No detecta conexión', 'parent_id' => $escanerId],
        ]);

        // Fallas (bajo Impresora)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No imprime', 'parent_id' => $impresoraId],
            ['nivel' => 'falla', 'valor' => 'Tinta o tóner agotado', 'parent_id' => $impresoraId],
            ['nivel' => 'falla', 'valor' => 'Calidad de impresión deficiente', 'parent_id' => $impresoraId],
            ['nivel' => 'falla', 'valor' => 'Atasco de papel', 'parent_id' => $impresoraId],
            ['nivel' => 'falla', 'valor' => 'No detecta conexion', 'parent_id' => $impresoraId],
        ]);

        // Tipos (bajo Programacion eventos)
        DB::table('option')->insert([
            ['nivel' => 'tipo', 'valor' => 'PRÉSTAMO DE EQUIPO', 'parent_id' => $eventosId],
        ]);

        // Componentes (bajo Laptop)
        $generalId = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'GENERAL', 'parent_id' => $laptopId]);
        $pantallaId  = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'PANTALLA', 'parent_id' => $laptopId]);
        $tecladoLaptopId  = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'TECLADO', 'parent_id' => $laptopId]);
        $panelTactilId = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'PANEL TÁCTIL', 'parent_id' => $laptopId]);
        $bateriaId  = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'BATERÍA', 'parent_id' => $laptopId]);

        // Fallas (bajo General)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'Sobrecalentamiento', 'parent_id' => $generalId],
            ['nivel' => 'falla', 'valor' => 'Portátil lento', 'parent_id' => $generalId],
            ['nivel' => 'falla', 'valor' => 'Problemas de Wi-Fi', 'parent_id' => $generalId],
        ]);

        // Fallas (bajo Pantalla)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'Pantalla negra', 'parent_id' => $pantallaId],
            ['nivel' => 'falla', 'valor' => 'Lineas en la pantalla', 'parent_id' => $pantallaId],
            ['nivel' => 'falla', 'valor' => 'Imagen borrosa', 'parent_id' => $pantallaId],
            ['nivel' => 'falla', 'valor' => 'Brillo/contraste defectuoso', 'parent_id' => $pantallaId],
        ]);

        // Fallas (bajo Teclado Laptop)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No funcionan las teclas numéricas', 'parent_id' => $tecladoLaptopId],
            ['nivel' => 'falla', 'valor' => 'No funciona ninguna tecla', 'parent_id' => $tecladoLaptopId],
            ['nivel' => 'falla', 'valor' => 'Teclas intercambiadas al escribir', 'parent_id' => $tecladoLaptopId],
            ['nivel' => 'falla', 'valor' => 'No funcionan símbolos', 'parent_id' => $tecladoLaptopId],
            ['nivel' => 'falla', 'valor' => 'Derrame de líquido', 'parent_id' => $tecladoLaptopId],
        ]);

        // Fallas (bajo Panel Táctil)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No responde', 'parent_id' => $panelTactilId],
            ['nivel' => 'falla', 'valor' => 'Movimiento errático', 'parent_id' => $panelTactilId],
            ['nivel' => 'falla', 'valor' => 'Gestos que no funcionan', 'parent_id' => $panelTactilId],
        ]);

        // Fallas (bajo Bateria)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No carga', 'parent_id' => $bateriaId],
            ['nivel' => 'falla', 'valor' => 'Duración corta', 'parent_id' => $bateriaId],
            ['nivel' => 'falla', 'valor' => 'Laptop no enciende', 'parent_id' => $bateriaId],
        ]);

        // Componentes (bajo Escritorio)
        $cpuId       = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'CPU', 'parent_id' => $escritorioId]);
        $monitorId   = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'MONITOR', 'parent_id' => $escritorioId]);
        $tecladoId   = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'TECLADO', 'parent_id' => $escritorioId]);
        $ratonId     = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'RATÓN', 'parent_id' => $escritorioId]);
        $perifericoId    = DB::table('option')->insertGetId(['nivel' => 'componente', 'valor' => 'PERIFÉRICOS', 'parent_id' => $escritorioId]);

        // Fallas (bajo CPU)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No enciende', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'Pantalla azul', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'Reinicios constantes', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'Problema con la fuente de poder', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'Problema con la tarjeta madre', 'parent_id' => $cpuId],
        ]);

        // Fallas (bajo Monitor)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No enciende', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'Pantalla negra', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'Lineas en la pantalla', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'Imagen borrosa', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'Brillo/contraste defectuoso', 'parent_id' => $monitorId],
        ]);

        // Fallas (bajo Teclado)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No funcionan las teclas numéricas', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'No funciona ninguna tecla', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'Teclas intercambiadas al escribir', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'No funcionan símbolos', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'Derrame de líquido', 'parent_id' => $tecladoId],
        ]);

        // Fallas (bajo Raton)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No responde', 'parent_id' => $ratonId],
            ['nivel' => 'falla', 'valor' => 'Movimiento errático', 'parent_id' => $ratonId],
            ['nivel' => 'falla', 'valor' => 'No funciona el botón izquierdo/derecho', 'parent_id' => $ratonId],
        ]);

        // Fallas (bajo Perifericos)
        DB::table('option')->insert([
            ['nivel' => 'falla', 'valor' => 'No detecta conexión', 'parent_id' => $perifericoId],
            ['nivel' => 'falla', 'valor' => 'No responde', 'parent_id' => $perifericoId],
            ['nivel' => 'falla', 'valor' => 'Problema de compatibilidad', 'parent_id' => $perifericoId],
        ]);
    }
}
