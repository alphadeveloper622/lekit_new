<?php

namespace Database\Seeders\Admin;

use App\Models\Category;
use App\Models\CategoryLanguage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // parent category
       DB::statement("INSERT INTO `categories` (`id`, `parent_id`, `position`, `slug`, `commission`, `status`, `icon`, `logo_id`, `logo`, `banner_id`, `banner`, `created_at`, `updated_at`) VALUES
        (1, NULL, NULL, 'fashion', 0.000, 1,'mdi mdi-tshirt-crew-outline', 46, '', NULL, '[]', '2022-02-01 09:15:12', '2022-03-26 10:46:10'),
        (2, NULL, NULL, 'electronic', 0.000, 1, 'mdi mdi-watch', 47, '', NULL, '[]', '2022-02-01 09:15:12', '2022-03-26 10:50:10'),
        (3, NULL, NULL, 'home', 0.000, 1, 'mdi mdi-sofa-single-outline', 47, '', NULL, '[]', '2022-02-01 09:15:12', '2022-03-26 10:48:36'),
        (4, NULL, NULL, 'appliances', 0.000, 1,'mdi mdi-television', 48, '', NULL, '[]', '2022-02-01 09:15:12', '2022-03-26 10:49:39'),
        (5, NULL, NULL, 'travel', 0.000, 1, 'mdi mdi-airplane', 51, '', NULL, '[]', '2022-02-01 09:15:12', '2022-03-26 10:51:35'),
        (6, NULL, NULL, 'health-and-beauty', 0.000, 1,'mdi mdi-face-woman-outline', 51, '', NULL, '[]', '2022-02-01 09:15:12', '2022-03-26 10:53:44'),
        (7, NULL, NULL, 'toys', 0.000, 1, 'mdi mdi-gamepad-variant-outline', 51, '', NULL, '[]', '2022-02-01 09:15:12', '2022-03-26 10:54:47'),
        (9, NULL, NULL, 'grocery', 0.000, 1, 'mdi mdi-egg-outline', 48, '', NULL, '[]', '2022-02-01 09:15:13', '2022-03-26 10:42:46'),
        (10, NULL, NULL, 'mobile', 0.000, 1, 'mdi mdi-cellphone', 49, '', NULL, '[]', '2022-02-01 09:15:13', '2022-03-26 10:44:35'),
        (11, NULL, NULL, 'software', 0.000, 1, 'mdi mdi-code-tags', NULL, '[]', NULL, '[]', '2022-03-26 10:58:27', '2022-03-26 10:58:27');");

       DB::statement("INSERT INTO `category_languages` (`id`, `category_id`, `lang`, `title`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
        (1, 1, 'en', 'Fashion', '', '', '2022-03-26 10:38:59', '2022-03-26 10:46:10'),
        (2, 2, 'en', 'Electronic', '', '', '2022-03-26 10:38:59', '2022-03-26 10:47:43'),
        (3, 3, 'en', 'Home', '', '', '2022-03-26 10:38:59', '2022-03-26 10:48:36'),
        (4, 4, 'en', 'Appliances', '', '', '2022-03-26 10:38:59', '2022-03-26 10:49:39'),
        (5, 5, 'en', 'Travel', '', '', '2022-03-26 10:38:59', '2022-03-26 10:51:35'),
        (6, 6, 'en', 'Health & Beauty', '', '', '2022-03-26 10:38:59', '2022-03-26 10:53:44'),
        (7, 7, 'en', 'Toys', '', '', '2022-03-26 10:38:59', '2022-03-26 10:54:47'),
        (9, 9, 'en', 'Grocery', '', '', '2022-03-26 10:38:59', '2022-03-26 10:42:46'),
        (10, 10, 'en', 'Mobile', '', '', '2022-03-26 10:38:59', '2022-03-26 10:44:35'),
        (11, 11, 'en', 'Software', '', '', '2022-03-26 10:58:27', '2022-03-26 10:58:27');");


    }
}
