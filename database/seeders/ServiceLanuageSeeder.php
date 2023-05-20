<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceLanuageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
INSERT INTO `service_languages` (`id`, `service_id`, `lang`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Free Shipping & Returns', 'For all orders over $100', '2022-02-07 03:59:09', '2022-02-07 03:59:09'),
(2, 2, 'en', 'Secure Payment', 'We ensure secure payment', '2022-02-07 03:59:09', '2022-02-07 03:59:09'),
(3, 3, 'en', 'Money Back Guarantee', 'Any back within 30 days', '2022-02-07 03:59:09', '2022-02-07 03:59:09'),
(4, 4, 'en', 'Customer Support', 'Call or email us 24/7', '2022-02-07 03:59:09', '2022-02-07 03:59:09');");
    }
}
