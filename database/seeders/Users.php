<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'Johan',
                'full_name' => 'Johan Saputra',
                'password' => Hash::make('johan123'),
                'role' => 'KEPALA-GUDANG',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'Alia',
                'full_name' => 'Alia Putri',
                'password' => Hash::make('alia123'),
                'role' => 'CREW',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'Joko',
                'full_name' => 'Joko Susilo',
                'password' => Hash::make('joko123'),
                'role' => 'MEKANIK',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
