<?php

namespace Database\Seeders\Admin;

use App\Models\LanguageConfig;
use Illuminate\Database\Seeder;

class LanguageConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageConfig::create([ "language_id" => 1, "name" => "English", "script" => "Latn", "native" => "English", "regional" => "en_GB"]);
//        LanguageConfig::create([ "language_id" => 2, "name" => "Bengali", "script" => "Beng", "native" => "বাংলা", "regional" => "bn_BD"]);
//        LanguageConfig::create([ "language_id" => 3, "name" => "Arabic", "script" => "Arab", "native" => "العربية", "regional" => "ar_AE"]);
    }
}
