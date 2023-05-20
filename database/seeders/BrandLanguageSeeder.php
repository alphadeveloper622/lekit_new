<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO `brand_languages` (`id`, `brand_id`, `lang`, `title`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Hp', NULL, NULL, '2022-02-07 03:59:05', '2022-02-07 03:59:05'),
(2, 2, 'en', 'Dell', NULL, NULL, '2022-02-07 03:59:05', '2022-02-07 03:59:05'),
(3, 3, 'en', 'Apple', NULL, NULL, '2022-02-07 03:59:05', '2022-02-07 03:59:05'),
(4, 4, 'en', 'AXE', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06'),
(5, 5, 'en', 'Audi', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06'),
(6, 6, 'en', 'Toyota', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06');");
    }
}
