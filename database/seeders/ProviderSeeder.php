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
                'codigo_proveedor' => 'PRBK-00001',
                'direcion' => 'N/A',
                'telefono' => '',
                'mail'     => 'na@mail.com',
                'razon_social' => 'N/A'
            ],
            [
                'codigo_proveedor' => 'PRBK-00001',
                'direcion' => 'N/A',
                'telefono' => '',
                'mail'     => 'na@mail.com',
                'razon_social' => 'PAVCO'
            ],

        );
    }
}
