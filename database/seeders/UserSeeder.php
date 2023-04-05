<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'password' => Hash::make('1234'),
            'email' => 'admin@tp1.com',
            'last_name' => 'Boilard',
            'first_name' => 'Jean',
            'role_id' => 1
        ]);
        DB::table(('users'))->insert([
            'password' => Hash::make('1234'),
            'email' => 'membre@tp1.com',
            'last_name' => 'Petit',
            'first_name' => 'Roger',
            'role_id' => 2
        ]);
        DB::table(('users'))->insert([
            'password' => bcrypt('1234'),
            'email' => 'membre1@tp1.com',
            'last_name' => 'Petite',
            'first_name' => 'Rogere',
            'role_id' => 2
        ]);
    }
}
