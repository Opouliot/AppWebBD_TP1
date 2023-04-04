<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CriticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 'user_id', 'film_id', 'score', 'comment'
        DB::table('critics')->insert([
            'user_id' => 1,
            'film_id' => 1,
            'score' => 5,
            'comment' => 'Un film génial'
        ]);
        DB::table('critics')->insert([
            'user_id' => 2,
            'film_id' => 2,
            'score' => 4,
            'comment' => 'Un film pas mal'
        ]);
    }
}
