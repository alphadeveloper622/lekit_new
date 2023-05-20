<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CampaignLanguage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO `campaigns` (`id`, `slug`, `background_color`, `text_color`, `banner_id`, `banner`, `start_date`, `end_date`, `status`, `featured`, `flash_sale`, `created_at`, `updated_at`) VALUES
            (1, 'The biggest sale', '#000000', '#000000', NULL, '[]', NULL, NULL, 1, 0, 0, '2022-01-01 00:00:00', '2023-02-01 00:00:00'),
            (2, 'Deals made especially for you', '#000000', '#000000', NULL, '[]', NULL, NULL, 1, 0, 0, '2022-01-01 00:00:00', '2023-02-01 00:00:00'),
            (3, 'Cyber Sale', '#000000', '#000000', NULL, '[]', NULL, NULL, 1, 0, 0, '2022-01-01 00:00:00', '2023-02-01 00:00:00'),
            (4, 'Black Friday Sale', '#000000', '#000000', NULL, '[]', NULL, NULL, 1, 0, 0, '2022-01-01 00:00:00', '2023-02-01 00:00:00'),
            (5, 'March Sale', '#000000', '#000000', NULL, '[]', NULL, NULL, 1, 0, 0, '2022-01-01 00:00:00', '2023-02-01 00:00:00'),
            (6, 'New Year Sale', '#000000', '#000000', NULL, '[]', NULL, NULL, 1, 0, 0, '2022-01-01 00:00:00', '2023-02-01 00:00:00'),
            (7, 'Year End Sale', '#000000', '#000000', NULL, '[]', NULL, NULL, 1, 0, 0, '2022-01-01 00:00:00', '2023-02-01 00:00:00'),
            (8, 'Birthday Sale', '#000000', '#000000', NULL, '[]', NULL, NULL, 1, 0, 0, '2022-01-01 00:00:00', '2023-02-01 00:00:00');");

        DB::statement("INSERT INTO `campaign_languages` (`campaign_id`, `lang`, `title`, `created_at`, `updated_at`) VALUES
            (1, 'en', 'The biggest sale', '2022-01-01 00:00:00', '2022-01-01 00:00:00'),
            (2, 'en', 'Deals made especially for you', '2022-01-01 00:00:00', '2022-01-01 00:00:00'),
            (3, 'en', 'Cyber Sale', '2022-01-01 00:00:00', '2022-01-01 00:00:00'),
            (4, 'en', 'Black Friday Sale', '2022-01-01 00:00:00', '2022-01-01 00:00:00'),
            (5, 'en', 'March Sale', '2022-01-01 00:00:00', '2022-01-01 00:00:00'),
            (6, 'en', 'New Year Sale', '2022-01-01 00:00:00', '2022-01-01 00:00:00'),
            (7, 'en', 'Year End Sale', '2022-01-01 00:00:00', '2022-01-01 00:00:00'),
            (8, 'en', 'Birthday Sale', '2022-01-01 00:00:00', '2022-01-01 00:00:00');");
    }
}
