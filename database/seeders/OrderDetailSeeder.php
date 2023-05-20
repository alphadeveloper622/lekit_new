<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
INSERT INTO `order_details` (`order_id`, `product_id`, `variation`, `price`, `tax`, `discount`, `coupon_discount`, `shipping_cost`, `quantity`, `pickup_hub_id`, `product_referral_code`, `created_at`, `updated_at`) VALUES
(1, 8, NULL, 2630, 0, 0, '{\"coupon_code\" : \"BLACK5\", \"discount\" : 10}', '{\"type\" : \"flat\",\"depend_on_quantity\" : true, \"per_cost\" : 10}', 1,  3, NULL, '2022-02-17 11:38:48', '2022-02-17 11:38:48'),
(2, 8, NULL, 260, 0, 0, '{\"coupon_code\" : \"BLACK5\", \"discount\" : 10}', '{\"type\" : \"flat\",\"depend_on_quantity\" : true, \"per_cost\" : 10}', 1,  NULL, NULL, '2022-02-17 11:38:48', '2022-02-17 11:38:48'),
(3, 8, NULL, 2630, 0, 0, '[]', NULL, 1, NULL, NULL, '2022-02-17 11:38:48', '2022-02-17 11:38:48'),
(4, 8, NULL, 260, 0, 0, NULL, NULL, 1, 1, NULL, '2022-02-17 11:38:48', '2022-02-17 11:38:48'),
(5, 8, NULL, 1450, 0, 0, NULL, NULL, 1, 2, NULL, '2022-02-17 11:38:48', '2022-02-17 11:38:48'),
(6, 8, NULL, 2630, 0, 0, NULL, NULL, 1, 1, NULL, '2022-02-17 11:38:48', '2022-02-17 11:38:48'),
(7, 8, NULL, 1670, 0, 0, NULL, NULL, 1, NULL, NULL, '2022-02-17 11:38:48', '2022-02-17 11:38:48'),
(8, 8, NULL, 4456, 0, 0, NULL, NULL, 1, 2, NULL, '2022-02-17 11:38:48', '2022-02-17 11:38:48'),
(9, 8, NULL, 500, 0, 0, NULL, NULL, 1, 2, NULL, '2022-02-17 11:38:49', '2022-02-17 11:38:49'),
( 10, 8, NULL, 1450, 0, 0, NULL, NULL, 1, NULL, NULL, '2022-02-17 11:38:49', '2022-02-17 11:38:49')");
    }
}
