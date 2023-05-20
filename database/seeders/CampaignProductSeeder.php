<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
INSERT INTO `campaign_products` (`id`, `user_id`, `campaign_id`, `product_id`, `status`, `discount`, `discount_type`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 3, 'accepted', 44, 'flat', '2022-02-07 08:22:02', '2022-02-07 08:22:02'),
(11, 1, 1, 1, 'accepted', 44, 'flat', '2022-02-07 08:22:02', '2022-02-07 08:22:02'),
(12, 1, 1, 9, 'accepted', 44, 'flat', '2022-02-07 08:22:02', '2022-02-07 08:22:02'),
(13, 1, 1, 4, 'accepted', 44, 'flat', '2022-02-07 08:22:02', '2022-02-07 08:22:02'),
(14, 1, 1, 5, 'accepted', 44, 'flat', '2022-02-07 08:22:02', '2022-02-07 08:22:02'),
(17, 1, 2, 2, 'accepted', 111, 'flat', '2022-02-07 08:22:45', '2022-02-07 08:22:45'),
(18, 1, 2, 8, 'accepted', 444, 'flat', '2022-02-07 08:22:45', '2022-02-07 08:22:45'),
(19, 1, 2, 7, 'accepted', 114, 'flat', '2022-02-07 08:22:45', '2022-02-07 08:22:45');");
    }
}
