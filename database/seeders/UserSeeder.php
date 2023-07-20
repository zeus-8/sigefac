<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        	'name'      =>	'ADMIN',
        	'email'     =>	'Admin@mail.com',
        	'password'  =>	bcrypt('123'),
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
