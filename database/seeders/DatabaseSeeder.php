<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SitesettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SitesettingSeeder::class);

        //seeder for ads
        /* \App\Models\Advertisement::factory(1000)->create(); */
    }
}
