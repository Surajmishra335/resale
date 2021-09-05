<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitesettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sitesettings')->insert([
            'address' => 'Manyata tech park, Bengalore, karnataka',
            'phone' => '9999000222',
            'mail' => 'name@company.com',
            'fb' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'instagram' => 'https://instagram.com/',
            'youtube'=> 'https://youtube.com/',
            'linkedin' => 'https://linkedin.com/',
        ]);
    }
}
