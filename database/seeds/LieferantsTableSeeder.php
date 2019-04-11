<?php

use Illuminate\Database\Seeder;

class LieferantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //path to sql file
        $sql = base_path('database/seeds/lieferant.sql');

        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sql));
    }
}
