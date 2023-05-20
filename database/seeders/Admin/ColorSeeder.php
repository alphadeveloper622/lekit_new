<?php

namespace Database\Seeders\Admin;

use App\Models\Color;
use App\Models\ColorLanguage;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([ 'code' => '#ff0000']);
        Color::create([ 'code' => '#000000']);
        Color::create([ 'code' => '#008000']);
        Color::create([ 'code' => '#0000ff']);
        Color::create([ 'code' => '#808080']);

        ColorLanguage::create([ 'name' => 'Red','color_id'=>'1','lang'=>'en']);
        ColorLanguage::create([ 'name' => 'Black','color_id'=>'2','lang'=>'en']);
        ColorLanguage::create([ 'name' => 'Green','color_id'=>'3','lang'=>'en']);
        ColorLanguage::create([ 'name' => 'Blue','color_id'=>'4','lang'=>'en']);
        ColorLanguage::create([ 'name' => 'Grey','color_id'=>'5','lang'=>'en']);

        ColorLanguage::create([ 'name' => 'লাল','color_id'=>'1','lang'=>'bn']);
        ColorLanguage::create([ 'name' => 'কালো','color_id'=>'2','lang'=>'bn']);
        ColorLanguage::create([ 'name' => 'সবুজ','color_id'=>'3','lang'=>'bn']);
        ColorLanguage::create([ 'name' => 'নীল','color_id'=>'4','lang'=>'bn']);
        ColorLanguage::create([ 'name' => 'ধূসর','color_id'=>'5','lang'=>'bn']);

    }
}

