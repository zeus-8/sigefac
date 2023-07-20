<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            'S/U',
            'CAJA',
            'BOLSA'
        ];

        foreach ($units as $unit) {
            DB::table('units')->insert([
                'descripcion' => $unit,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }
    }
}
