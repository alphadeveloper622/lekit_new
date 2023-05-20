<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Slider;
use App\Models\SliderLanguage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Statement;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
INSERT INTO `sliders` (`id`, `order`, `btn_link`, `status`, `image_align`, `text_align`, `image`, `image_id`, `bg_image`, `bg_image_id`, `created_at`, `updated_at`) VALUES
(1, 10, 'brands', 1, 'left', 'right', '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142557_original__media_305.png\",\"image_40x40\":\"images\\/20220207142557image_40x40_media_3.png\",\"image_72x72\":\"images\\/20220207142557image_72x72_media_177.png\",\"image_190x230\":\"images\\/20220207142557image_160x160_media_107.png\",\"image_320x320\":\"images\\/20220207142557image_300x200_media_205.png\",\"image_thumbnail\":\"images\\/20220207142557image_thumbnail_media_468.png\",\"image_280x280\":\"images\\/20220207142611image_280x280206.png\"}', 79, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142505_original__media_278.jpg\",\"image_40x40\":\"images\\/20220207142505image_40x40_media_55.png\",\"image_72x72\":\"images\\/20220207142505image_72x72_media_13.png\",\"image_190x230\":\"images\\/20220207142505image_160x160_media_466.png\",\"image_320x320\":\"images\\/20220207142505image_300x200_media_55.png\",\"image_thumbnail\":\"images\\/20220207142505image_thumbnail_media_480.png\",\"image_1905x464\":\"images\\/20220207142611image_1905x464426.png\"}', 74, '2022-02-07 03:59:09', '2022-02-07 08:26:11'),
(2, 10, 'campaigns', 1, 'left', 'right', '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142558_original__media_318.png\",\"image_40x40\":\"images\\/20220207142558image_40x40_media_369.png\",\"image_72x72\":\"images\\/20220207142558image_72x72_media_419.png\",\"image_190x230\":\"images\\/20220207142558image_160x160_media_105.png\",\"image_320x320\":\"images\\/20220207142558image_300x200_media_330.png\",\"image_thumbnail\":\"images\\/20220207142558image_thumbnail_media_280.png\",\"image_280x280\":\"images\\/20220207142626image_280x280233.png\"}', 80, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142505_original__media_278.jpg\",\"image_40x40\":\"images\\/20220207142505image_40x40_media_55.png\",\"image_72x72\":\"images\\/20220207142505image_72x72_media_13.png\",\"image_190x230\":\"images\\/20220207142505image_160x160_media_466.png\",\"image_320x320\":\"images\\/20220207142505image_300x200_media_55.png\",\"image_thumbnail\":\"images\\/20220207142505image_thumbnail_media_480.png\",\"image_1905x464\":\"images\\/20220207142611image_1905x464426.png\"}', 74, '2022-02-07 03:59:09', '2022-02-07 08:26:26'),
(3, 10, 'categories', 1, 'right', 'left', '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142557_original__media_248.png\",\"image_40x40\":\"images\\/20220207142557image_40x40_media_433.png\",\"image_72x72\":\"images\\/20220207142557image_72x72_media_242.png\",\"image_190x230\":\"images\\/20220207142557image_160x160_media_413.png\",\"image_320x320\":\"images\\/20220207142557image_300x200_media_135.png\",\"image_thumbnail\":\"images\\/20220207142557image_thumbnail_media_125.png\",\"image_280x280\":\"images\\/20220207142642image_280x280273.png\"}', 78, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142503_original__media_214.jpg\",\"image_40x40\":\"images\\/20220207142503image_40x40_media_402.png\",\"image_72x72\":\"images\\/20220207142503image_72x72_media_184.png\",\"image_190x230\":\"images\\/20220207142503image_160x160_media_69.png\",\"image_320x320\":\"images\\/20220207142503image_300x200_media_472.png\",\"image_thumbnail\":\"images\\/20220207142503image_thumbnail_media_82.png\",\"image_1905x464\":\"images\\/20220207142642image_1905x46411.png\"}', 72, '2022-02-07 03:59:09', '2022-02-07 08:26:43'),
(4, 10, 'daily-deals', 1, 'right', 'left', '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142557_original__media_305.png\",\"image_40x40\":\"images\\/20220207142557image_40x40_media_3.png\",\"image_72x72\":\"images\\/20220207142557image_72x72_media_177.png\",\"image_190x230\":\"images\\/20220207142557image_160x160_media_107.png\",\"image_320x320\":\"images\\/20220207142557image_300x200_media_205.png\",\"image_thumbnail\":\"images\\/20220207142557image_thumbnail_media_468.png\",\"image_280x280\":\"images\\/20220207142611image_280x280206.png\"}', 79, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142507_original__media_497.jpg\",\"image_40x40\":\"images\\/20220207142507image_40x40_media_495.png\",\"image_72x72\":\"images\\/20220207142507image_72x72_media_359.png\",\"image_190x230\":\"images\\/20220207142507image_160x160_media_361.png\",\"image_320x320\":\"images\\/20220207142507image_300x200_media_367.png\",\"image_thumbnail\":\"images\\/20220207142507image_thumbnail_media_173.png\",\"image_1905x464\":\"images\\/20220207142737image_1905x464131.png\"}', 76, '2022-02-07 03:59:09', '2022-02-07 08:27:38'),
(5, 10, 'https://www.facebook.com', 1, 'left', 'right', '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142557_original__media_305.png\",\"image_40x40\":\"images\\/20220207142557image_40x40_media_3.png\",\"image_72x72\":\"images\\/20220207142557image_72x72_media_177.png\",\"image_190x230\":\"images\\/20220207142557image_160x160_media_107.png\",\"image_320x320\":\"images\\/20220207142557image_300x200_media_205.png\",\"image_thumbnail\":\"images\\/20220207142557image_thumbnail_media_468.png\",\"image_280x280\":\"images\\/20220207142611image_280x280206.png\"}', 79, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207142507_original__media_497.jpg\",\"image_40x40\":\"images\\/20220207142507image_40x40_media_495.png\",\"image_72x72\":\"images\\/20220207142507image_72x72_media_359.png\",\"image_190x230\":\"images\\/20220207142507image_160x160_media_361.png\",\"image_320x320\":\"images\\/20220207142507image_300x200_media_367.png\",\"image_thumbnail\":\"images\\/20220207142507image_thumbnail_media_173.png\",\"image_1905x464\":\"images\\/20220207142737image_1905x464131.png\"}', 76, '2022-02-07 03:59:09', '2022-02-07 08:28:16');");

        DB::statement("
INSERT INTO `slider_languages` (`id`, `slider_id`, `lang`, `title`, `heading`, `sub_title`, `btn_text`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'iPhone ProMax12 Best Phone in the world', 'Apple', 'iPhone MaxPro12 4/64', '20% discount', '2022-02-07 03:59:09', '2022-02-07 03:59:09'),
(2, 2, 'en', 'Apple Smart Watch Series 3 (MQL12LL/A) 42mm - Space Gray', 'Apple Watch', 'MQL12LL/A Aluminum Chassis with Ion-X Glass', 'Discontinued', '2022-02-07 03:59:09', '2022-02-07 03:59:09'),
(3, 3, 'en', 'D5600 Dslr Camera-Black With 18-55Mm Lenses', 'Nikon', 'NO RETURN Applicable If The Seal is Broken', '35% discount', '2022-02-07 03:59:09', '2022-02-07 03:59:09'),
(4, 4, 'en', 'Singer HD LED TV (S24)', 'SRTV-SLE24D1203TC', 'HD LED Singer TV (S24)Product Specification:', '20% discount', '2022-02-07 03:59:09', '2022-02-07 03:59:09'),
(5, 5, 'en', 'Readymade stylish hot kammez for girls long linen', 'Traditional Clothing', 'Specifications of Readymade stylish hot kammez for girls long linen', '20% discount', '2022-02-07 03:59:09', '2022-02-07 03:59:09');");
    }
}
