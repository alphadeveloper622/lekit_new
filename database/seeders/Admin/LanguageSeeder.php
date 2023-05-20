<?php

namespace Database\Seeders\Admin;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([ 'name' => 'English', 'locale' => 'en', 'flag' => 'images/flags/us.png', 'text_direction' => 'ltr', 'status' => 1]);
//        Language::create([ 'name' => 'Bangla', 'locale' => 'bn', 'flag' => 'images/flags/bd.png', 'text_direction' => 'ltr', 'status' => 1]);
//        Language::create([ 'name' => 'Arabic', 'locale' => 'ar', 'flag' => 'images/flags/sa.png', 'text_direction' => 'rtl', 'status' => 1]);
    }
}
