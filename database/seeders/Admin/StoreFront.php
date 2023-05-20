<?php

namespace Database\Seeders\Admin;

use App\Models\ThemeOptions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreFront extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = ["header_style"=>"header_style1","footer_style"=>"footer_style1","primary_color"=>"#000000","fonts"=>"roboto"];
        ThemeOptions::create([
            'name'      => 'theme_one',
            'options'   => $options ,
        ]);
    }
}
