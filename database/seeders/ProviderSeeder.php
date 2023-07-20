<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('providers')->insert(
            [
                'codigo_proveedor' => 'PRBK-00000',
                'direccion' => 'N/A',
                'telefono' => '0',
                'mail'     => 'na@mail.com',
                'razon_social' => 'N/A',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]
        );
        DB::table('providers')->insert(
            [
                'codigo_proveedor' => 'PRBK-00001',
                'direccion' => 'N/A',
                'telefono' => '0',
                'mail'     => 'na@mail.com',
                'razon_social' => 'PAVCO',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]

        );
    }
}
