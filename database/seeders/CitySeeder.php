<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        $path   = base_path('public/sql/cities.sql');
        $sql    = file_get_contents($path);
        DB::unprepared($sql);
    }
}
