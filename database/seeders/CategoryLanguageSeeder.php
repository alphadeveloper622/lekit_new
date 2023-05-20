<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO `category_languages` (`id`, `category_id`, `lang`, `title`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Toy', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06'),
(2, 2, 'en', 'Phone', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06'),
(3, 3, 'en', 'Kids', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06'),
(4, 4, 'en', 'Sports', '', '', '2022-02-07 03:59:06', '2022-02-07 08:06:40'),
(5, 5, 'en', 'Computer', '', '', '2022-02-07 03:59:06', '2022-02-07 08:08:03'),
(6, 6, 'en', 'Man', '', '', '2022-02-07 03:59:06', '2022-02-07 08:08:48'),
(7, 7, 'en', 'Women', '', '', '2022-02-07 03:59:06', '2022-02-07 08:09:14'),
(8, 8, 'en', 'Software', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06'),
(9, 9, 'en', 'Apps', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06'),
(10, 10, 'en', 'Computer Games', NULL, NULL, '2022-02-07 03:59:06', '2022-02-07 03:59:06');");
    }
}
