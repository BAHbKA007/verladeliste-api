<?php

use Illuminate\Database\Seeder;

class WeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = base_path('database/seeds/wes.sql');

        DB::unprepared(file_get_contents($sql));

        $sql = base_path('database/seeds/wes.1.sql');

        DB::unprepared(file_get_contents($sql));
    }
}
