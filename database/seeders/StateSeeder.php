<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::truncate();
        $path   = base_path('public/sql/states.sql');
        $sql    = file_get_contents($path);
        DB::unprepared($sql);
    }
}
