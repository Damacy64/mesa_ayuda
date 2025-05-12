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
        $computoId     = DB::table('options')->insertGetId(['nivel' => 'categoria', 'valor' => 'CÓMPUTO']);
        $impresionId   = DB::table('options')->insertGetId(['nivel' => 'categoria', 'valor' => 'IMPRESIÓN']);
        $eventosId     = DB::table('options')->insertGetId(['nivel' => 'categoria', 'valor' => 'PROGRAMACIÓN DE EVENTOS']);
        $ofimaticaId    = DB::table('options')->insertGetId(['nivel' => 'categoria', 'valor' => 'OFIMATICA']);

        // Tipos (bajo Ofimatica)
        DB::table('options')->insert([
            ['nivel' => 'tipo', 'valor' => 'WORD', 'parent_id' => $ofimaticaId],
            ['nivel' => 'tipo', 'valor' => 'EXCEL', 'parent_id' => $ofimaticaId],
            ['nivel' => 'tipo', 'valor' => 'POWER POINT', 'parent_id' => $ofimaticaId],
            ['nivel' => 'tipo', 'valor' => 'OUTLOOK', 'parent_id' => $ofimaticaId],
            ['nivel' => 'tipo', 'valor' => 'ONEDRIVE', 'parent_id' => $ofimaticaId],
            ['nivel' => 'tipo', 'valor' => 'POWER BI', 'parent_id' => $ofimaticaId],
            ['nivel' => 'tipo', 'valor' => 'TEAMS', 'parent_id' => $ofimaticaId],
        ]);

        // Tipos (bajo Cómputo)
        $laptopId      = DB::table('options')->insertGetId(['nivel' => 'tipo', 'valor' => 'LAPTOP', 'parent_id' => $computoId]);
        $escritorioId  = DB::table('options')->insertGetId(['nivel' => 'tipo', 'valor' => 'ESCRITORIO', 'parent_id' => $computoId]);
        $tabletId      = DB::table('options')->insertGetId(['nivel' => 'tipo', 'valor' => 'TABLET', 'parent_id' => $computoId]);

        // Fallas (bajo Tablet)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO ENCIENDE', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'PANTALLA NO RESPONDE', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'PROBLEMAS CON EL INTERNET', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'BLUETOOOTH NO SE CONECTA', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'NO CARGA', 'parent_id' => $tabletId],
            ['nivel' => 'falla', 'valor' => 'SIN SONIDO', 'parent_id' => $tabletId],
        ]);

        // Tipos (bajo Impresión)
        $multifuncionalId = DB::table('options')->insertGetId(['nivel' => 'tipo', 'valor' => 'MULTIFUNCIONAL', 'parent_id' => $impresionId]);
        $impresoraId      = DB::table('options')->insertGetId(['nivel' => 'tipo', 'valor' => 'IMPRESORA', 'parent_id' => $impresionId]);
        $escanerId        = DB::table('options')->insertGetId(['nivel' => 'tipo', 'valor' => 'ESCÁNER', 'parent_id' => $impresionId]);

        //Fallas (bajo Multifuncional)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO IMPRIME', 'parent_id' => $multifuncionalId],
            ['nivel' => 'falla', 'valor' => 'PAPEL ATASCADO', 'parent_id' => $multifuncionalId],
            ['nivel' => 'falla', 'valor' => 'PROBLEMA CON EL ESCANER', 'parent_id' => $multifuncionalId],
            ['nivel' => 'falla', 'valor' => 'PROBLEMA CON EL FAX', 'parent_id' => $multifuncionalId],
        ]);

        // Fallas (bajo Escaner)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO ESCANEA', 'parent_id' => $escanerId],
            ['nivel' => 'falla', 'valor' => 'CALIDAD DE IMPRESION  DEFICIENTE', 'parent_id' => $escanerId],
            ['nivel' => 'falla', 'valor' => 'NO DETECTA CONEXION', 'parent_id' => $escanerId],
        ]);

        // Fallas (bajo Impresora)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO IMPRIME', 'parent_id' => $impresoraId],
            ['nivel' => 'falla', 'valor' => 'TINTA O TONER AGOTADO', 'parent_id' => $impresoraId],
            ['nivel' => 'falla', 'valor' => 'CALIDAD DE IMPRESION  DEFICIENTE', 'parent_id' => $impresoraId],
            ['nivel' => 'falla', 'valor' => 'PAPEL ATASCADO', 'parent_id' => $impresoraId],
            ['nivel' => 'falla', 'valor' => 'NO DETECTA CONEXION', 'parent_id' => $impresoraId],
        ]);

        // Tipos (bajo Programacion eventos)
        DB::table('options')->insert([
            ['nivel' => 'tipo', 'valor' => 'PRÉSTAMO DE EQUIPO', 'parent_id' => $eventosId],
        ]);

        // Componentes (bajo Laptop)
        $generalId = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'GENERAL', 'parent_id' => $laptopId]);
        $pantallaId  = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'PANTALLA', 'parent_id' => $laptopId]);
        $tecladoLaptopId  = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'TECLADO', 'parent_id' => $laptopId]);
        $panelTactilId = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'PANEL TÁCTIL', 'parent_id' => $laptopId]);
        $bateriaId  = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'BATERÍA', 'parent_id' => $laptopId]);

        // Fallas (bajo General)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'SOBRECALIENTAMIENTO', 'parent_id' => $generalId],
            ['nivel' => 'falla', 'valor' => 'PORTATIL LENTO', 'parent_id' => $generalId],
            ['nivel' => 'falla', 'valor' => 'PROBLEMAS CON EL INTERNET', 'parent_id' => $generalId],
        ]);

        // Fallas (bajo Pantalla)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'PANTALLA NO RESPONDE', 'parent_id' => $pantallaId],
            ['nivel' => 'falla', 'valor' => 'LINEAS EN LA PANTALLA', 'parent_id' => $pantallaId],
            ['nivel' => 'falla', 'valor' => 'IMAGEN DEFICIENTE', 'parent_id' => $pantallaId],
            ['nivel' => 'falla', 'valor' => 'PANTALLA AZUL', 'parent_id' => $pantallaId],
        ]);

        // Fallas (bajo Teclado Laptop)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO FUNCIONAN LAS TECLAS NUMERICAS', 'parent_id' => $tecladoLaptopId],
            ['nivel' => 'falla', 'valor' => 'NO FUNCIONA NINGUNA TECLA', 'parent_id' => $tecladoLaptopId],
            ['nivel' => 'falla', 'valor' => 'TECLAS INTERCAMBIADAS', 'parent_id' => $tecladoLaptopId],
            ['nivel' => 'falla', 'valor' => 'NO FUNCIONAN SIMBOLOS', 'parent_id' => $tecladoLaptopId],
            ['nivel' => 'falla', 'valor' => 'DERRAME DE LIQUIDO', 'parent_id' => $tecladoLaptopId],
        ]);

        // Fallas (bajo Panel Táctil)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO RESPONDE', 'parent_id' => $panelTactilId],
            ['nivel' => 'falla', 'valor' => 'MOVIMIENTO ERRATICO', 'parent_id' => $panelTactilId],
            ['nivel' => 'falla', 'valor' => 'GESTOS QUE NO FUNCIONAN', 'parent_id' => $panelTactilId],
        ]);

        // Fallas (bajo Bateria)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO CARGA', 'parent_id' => $bateriaId],
            ['nivel' => 'falla', 'valor' => 'DURACIÓN CORTA', 'parent_id' => $bateriaId],
            ['nivel' => 'falla', 'valor' => 'NO ENCIENDE', 'parent_id' => $bateriaId],
        ]);

        // Componentes (bajo Escritorio)
        $cpuId       = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'CPU', 'parent_id' => $escritorioId]);
        $monitorId   = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'MONITOR', 'parent_id' => $escritorioId]);
        $tecladoId   = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'TECLADO', 'parent_id' => $escritorioId]);
        $ratonId     = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'RATÓN', 'parent_id' => $escritorioId]);
        $perifericoId    = DB::table('options')->insertGetId(['nivel' => 'componente', 'valor' => 'PERIFÉRICOS', 'parent_id' => $escritorioId]);

        // Fallas (bajo CPU)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO ENCIENDE', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'PANTALLA AZUL', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'REINICIOS CONSTANTES', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'PROBLEMA CON LA FUENTE DE PODER', 'parent_id' => $cpuId],
            ['nivel' => 'falla', 'valor' => 'PROBLEMA CON LA TARJETA MADRE', 'parent_id' => $cpuId],
        ]);

        // Fallas (bajo Monitor)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO ENCIENDE', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'PANTALLA AZUL', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'LINEAS EN LA PANTALLA', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'IMAGEN DEFICIENTE', 'parent_id' => $monitorId],
            ['nivel' => 'falla', 'valor' => 'PANTALLA NEGRA', 'parent_id' => $monitorId],
        ]);

        // Fallas (bajo Teclado)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO FUNCIONAN LAS TECLAS NUMERICAS', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'NO FUNCIONA NINGUNA TECLA', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'TECLAS INTERCAMBIADAS', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'NO FUNCIONAN SIMBOLOS', 'parent_id' => $tecladoId],
            ['nivel' => 'falla', 'valor' => 'DERRAME DE LIQUIDO', 'parent_id' => $tecladoId],
        ]);

        // Fallas (bajo Raton)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO RESPONDE', 'parent_id' => $ratonId],
            ['nivel' => 'falla', 'valor' => 'MOVIMIENTO ERRATICO', 'parent_id' => $ratonId],
            ['nivel' => 'falla', 'valor' => 'NO FUNCIONA LOS BOTÓNES', 'parent_id' => $ratonId],
        ]);

        // Fallas (bajo Perifericos)
        DB::table('options')->insert([
            ['nivel' => 'falla', 'valor' => 'NO DETECTA CONEXION', 'parent_id' => $perifericoId],
            ['nivel' => 'falla', 'valor' => 'NO RESPONDE', 'parent_id' => $perifericoId],
            ['nivel' => 'falla', 'valor' => 'PROBLEMA DE COMPATIBILIDAD', 'parent_id' => $perifericoId],
        ]);
    }
}
