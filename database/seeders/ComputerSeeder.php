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
            'numero_serie' => '1234567890',
            'modelo' => 'HP PAVILION 15',
            'direccion_ip' => '192.168.220',
            'estado' => 'HABILITADO',
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
            ]
        ];
        DB::table('attributable')->insert($atributos);

        $computerUser = [
            'user_final_id' => 1,
            'equipo_id' => 1234567890,
        ];
        DB::table('computer_user_final')->insert($computerUser);
    }
}
