<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceLanguage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
INSERT INTO `services` (`id`, `position`, `image`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"images\":{\"storage\":\"local\",\"original_image\":\"images\\/icon\\/20220207145423-service_image406.png\",\"image_100x38\":\"\",\"image_89x33\":\"\",\"image_118x45\":\"\",\"image_48x25\":\"\",\"image_40x40\":\"images\\/icon\\/20220207145423-service_image-50x4037.png\",\"image_900x300\":\"images\\/icon\\/20220207145423-service_image-50x4037.png\",\"image_105x75\":\"\",\"image_72x72\":\"images\\/icon\\/20220207145423image_small_twoservice_image494.png\"},\"id\":null}', NULL, '2022-02-07 03:59:09', '2022-02-07 08:54:23'),
(2, 2, '{\"images\":{\"storage\":\"local\",\"original_image\":\"images\\/icon\\/20220207145436-service_image294.png\",\"image_100x38\":\"\",\"image_89x33\":\"\",\"image_118x45\":\"\",\"image_48x25\":\"\",\"image_40x40\":\"images\\/icon\\/20220207145436-service_image-50x408.png\",\"image_900x300\":\"images\\/icon\\/20220207145436-service_image-50x408.png\",\"image_105x75\":\"\",\"image_72x72\":\"images\\/icon\\/20220207145436image_small_twoservice_image249.png\"},\"id\":null}', NULL, '2022-02-07 03:59:09', '2022-02-07 08:54:36'),
(3, 3, '{\"images\":{\"storage\":\"local\",\"original_image\":\"images\\/icon\\/20220207145445-service_image108.png\",\"image_100x38\":\"\",\"image_89x33\":\"\",\"image_118x45\":\"\",\"image_48x25\":\"\",\"image_40x40\":\"images\\/icon\\/20220207145445-service_image-50x4031.png\",\"image_900x300\":\"images\\/icon\\/20220207145445-service_image-50x4031.png\",\"image_105x75\":\"\",\"image_72x72\":\"images\\/icon\\/20220207145445image_small_twoservice_image167.png\"},\"id\":null}', NULL, '2022-02-07 03:59:09', '2022-02-07 08:54:45'),
(4, 4, '{\"images\":{\"storage\":\"local\",\"original_image\":\"images\\/icon\\/20220207145454-service_image256.png\",\"image_100x38\":\"\",\"image_89x33\":\"\",\"image_118x45\":\"\",\"image_48x25\":\"\",\"image_40x40\":\"images\\/icon\\/20220207145454-service_image-50x4044.png\",\"image_900x300\":\"images\\/icon\\/20220207145454-service_image-50x4044.png\",\"image_105x75\":\"\",\"image_72x72\":\"images\\/icon\\/20220207145454image_small_twoservice_image406.png\"},\"id\":null}', NULL, '2022-02-07 03:59:09', '2022-02-07 08:54:54');");
    }
}
