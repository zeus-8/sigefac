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
                'direcion' => 'N/A',
                'telefono' => '',
                'mail'     => '0@mail.com',
                'razon_social' => 'N/A'
            ],
            [
                'direcion' => 'N/A',
                'telefono' => '',
                'mail'     => '1@mail.com',
                'razon_social' => 'PAVCO'
            ],


        );
    }
}
