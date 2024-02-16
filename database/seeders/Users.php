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
                'password' => Hash::make('johan123'),
                'role' => 'ADMIN',
                'email' => 'johan@gmail.com',
            ],
            [
                'username' => 'Alia',
                'password' => Hash::make('alia123'),
                'role' => 'USER',
                'email' => 'alia@gmail.com',
            ],
        ]);
    }
}
