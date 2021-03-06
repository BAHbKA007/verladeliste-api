<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArtikelTableSeeder::class);
        $this->call(GebindeTableSeeder::class);
        $this->call(LandsTableSeeder::class);
        $this->call(LieferantsTableSeeder::class);
        $this->call(EntladungTableSeeder::class);
        $this->call(LkwsTableSeeder::class);
        // $this->call(WeTableSeeder::class);
    }
}
