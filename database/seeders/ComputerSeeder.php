<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $computadoras = [
            [
                'numero_serie' => '1234567890',
                'numero_inventario' => '1234567890',
                'modelo' => 'HP PAVILION 15',
                'direccion_ip' => '192.168.220',
                'internet' => 'INALAMBRICO',
                'estado' => 'HABILITADO',
            ],
            [
                'numero_serie' => '987654321',
                'numero_inventario' => '987654321',
                'modelo' => 'DELL INSPIRON 15',
                'direccion_ip' => '192.168.221',
                'internet' => 'INALAMBRICO',
                'estado' => 'HABILITADO',
            ],
            [
                'numero_serie' => '1122334455',
                'numero_inventario' => '1122334455',
                'modelo' => 'LENOVO THINKPAD X1',
                'direccion_ip' => '192.168.222',
                'internet' => 'INALAMBRICO',
                'estado' => 'HABILITADO',
            ],
            [
                'numero_serie' => '2233445566',
                'numero_inventario' => '2233445566',
                'modelo' => 'ASUS ZENBOOK 14',
                'direccion_ip' => '192.168.223',
                'internet' => 'INALAMBRICO',
                'estado' => 'HABILITADO',
            ],
        ];
        DB::table('computers')->insert($computadoras);

        $atributos = [
            [
                'atributo_tipo' => 'S.O.',
                'atributo_valor' => 'Linux',
                'attributable_id' => 1234567890,
                'attributable_type' => 'App\Models\Computer',
            ],
            [
                'atributo_tipo' => 'Marca',
                'atributo_valor' => 'HP',
                'attributable_id' => 1234567890,
                'attributable_type' => 'App\Models\Computer',
            ],
            [
                'atributo_tipo' => 'S.O.',
                'atributo_valor' => 'Windows 10',
                'attributable_id' => 987654321,
                'attributable_type' => 'App\Models\Computer',
            ],
            [
                'atributo_tipo' => 'Marca',
                'atributo_valor' => 'DELL',
                'attributable_id' => 987654321,
                'attributable_type' => 'App\Models\Computer',
            ],
            [
                'atributo_tipo' => 'S.O.',
                'atributo_valor' => 'Windows 11',
                'attributable_id' => 1122334455,
                'attributable_type' => 'App\Models\Computer',
            ],
            [
                'atributo_tipo' => 'Marca',
                'atributo_valor' => 'LENOVO',
                'attributable_id' => 1122334455,
                'attributable_type' => 'App\Models\Computer',
            ],
            [
                'atributo_tipo' => 'S.O.',
                'atributo_valor' => 'Linux',
                'attributable_id' => 2233445566,
                'attributable_type' => 'App\Models\Computer',
            ],
            [
                'atributo_tipo' => 'Marca',
                'atributo_valor' => 'ASUS',
                'attributable_id' => 2233445566,
                'attributable_type' => 'App\Models\Computer',
            ],
        ];
        DB::table('attributable')->insert($atributos);

        $computerUser = [
            [
                'user_final_id' => 1,
                'equipo_id' => 1234567890,
            ],
            [
                'user_final_id' => 1,
                'equipo_id' => 987654321,
            ],
            [
                'user_final_id' => 2,
                'equipo_id' => 1122334455,
            ],
            [
                'user_final_id' => 2,
                'equipo_id' => 2233445566,
            ],
        ];
        DB::table('computer_user_final')->insert($computerUser);
    }
}
