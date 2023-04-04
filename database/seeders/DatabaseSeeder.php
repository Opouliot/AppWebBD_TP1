<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $sql1 = file_get_contents(database_path() . '/seeders/languages.sql');
        $sql2 = file_get_contents(database_path() . '/seeders/films.sql');
        $sql3 = file_get_contents(database_path() . '/seeders/actors.sql');
        $sql4 = file_get_contents(database_path() . '/seeders/actor_film.sql');
        
        DB::statement($sql1);
        DB::statement($sql2);
        DB::statement($sql3);
        DB::statement($sql4);
    }
}
