<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'N/A',
            'PAVCO',
            'NICOLL',
            'AMANCO',
            'AKROS',
            'SCH80 ERA',
            'YDS KUSA',
            'PCP',
            'OATEY',
            'MAGNUM',
            'IPS',
            'ITALY',
            'ITAP',
            'CIM',
            'M&L',
            'ESSETI',
            'LESSO',
            'METUSA',
            'FV',
            'MV',
            'GRILUX',
            'H3',
            'BTICINO',
            'DEWALT',
            'NOVALAMP',
            'INYECTOPLPAST',
            'SAMY',
            'BOSCH',
            'STANLEY',
            'PLASTISUR',
            'INDECO',
            'CELIMA',
            'YURA',
            'TIGRE',
            'SANKING',
            'ERA',
            'DURMAN',
            'H3 SALADILLO',
            'VAINSA',
            'TRUPER',
            'NORTON',
            'VENCENAMEL',
            'VALMETERS',
            'PAPE',
            'INYECTOPLAST',
            'SIKA',
            'AWADUCT',
            'MECH',
            'ROTOPLAS',
            'CYA',
            'CELAPSA USA',
            'ENERJET',
            'SCHNEIDER',
            'AMERICAN COLORS',
            'LIDER PLAST',
            'YD',
            'SANTO DOMINGO',
            'ITALGRIF',
            'INDECO',
            'PHILIPS',
            'TREBOL',
            'TIEMME',
            'CONCYSSA',
            'SANIFER',
            'SOUDAL',
            'KOPLAST',
            'ITAP',
            'TUBOPLAST',
            'CHEMA',
            'NALDO',
            'FUJI',
            'CREGISTRO',
            'IMPORTADO',
            'UDS',
            'BOSSINI',
            'C&A',
            'DIFERPA',
            'VALMAX',
            'POLIFUSION',
            'GREFOR',
            'AMERICA'
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'brand' => $brand,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }
    }
}
