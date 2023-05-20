<?php

namespace Database\Seeders\Admin;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO `blogs` (`id`, `category_id`, `user_id`, `image_id`, `image`, `status`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, 29, 88, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207143213_original__media_315.jpg\",\"image_40x40\":\"images\\/20220207143213image_40x40_media_384.png\",\"image_72x72\":\"images\\/20220207143213image_72x72_media_41.png\",\"image_190x230\":\"images\\/20220207143213image_160x160_media_325.png\",\"image_320x320\":\"images\\/20220207143213image_300x200_media_256.png\",\"image_thumbnail\":\"images\\/20220207143213image_thumbnail_media_48.png\",\"image_900x300\":\"images\\/20220207143244image_900x300362.png\",\"image_300x200\":\"images\\/20220207143245image_300x200223.png\"}', 'published', 'et-ullam-et', NULL, '2022-02-07 03:59:29', '2022-02-07 08:32:45'),
(2, 6, 9, 82, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207143047_original__media_90.jpg\",\"image_40x40\":\"images\\/20220207143047image_40x40_media_390.png\",\"image_72x72\":\"images\\/20220207143047image_72x72_media_177.png\",\"image_190x230\":\"images\\/20220207143047image_160x160_media_193.png\",\"image_320x320\":\"images\\/20220207143047image_300x200_media_205.png\",\"image_thumbnail\":\"images\\/20220207143047image_thumbnail_media_253.png\",\"image_900x300\":\"images\\/20220207143306image_900x300327.png\",\"image_300x200\":\"images\\/20220207143308image_300x200455.png\"}', 'published', 'a-earum-autem', NULL, '2022-02-07 03:59:29', '2022-02-07 08:33:09'),
(3, 9, 11, 84, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207143058_original__media_255.jpg\",\"image_40x40\":\"images\\/20220207143058image_40x40_media_269.png\",\"image_72x72\":\"images\\/20220207143058image_72x72_media_417.png\",\"image_190x230\":\"images\\/20220207143058image_160x160_media_411.png\",\"image_320x320\":\"images\\/20220207143058image_300x200_media_35.png\",\"image_thumbnail\":\"images\\/20220207143058image_thumbnail_media_314.png\",\"image_900x300\":\"images\\/20220207143328image_900x300136.png\",\"image_300x200\":\"images\\/20220207143330image_300x200148.png\"}', 'published', 'dolores-a', NULL, '2022-02-07 03:59:29', '2022-02-07 08:33:33'),
(4, 7, 17, NULL, NULL, 'draft', 'velit-ut', NULL, '2022-02-07 03:59:29', '2022-02-07 03:59:29'),
(5, 1, 7, NULL, NULL, 'pending', 'voluptas-officiis', NULL, '2022-02-07 03:59:29', '2022-02-07 03:59:29'),
(6, 9, 5, NULL, NULL, 'draft', 'aut-in', NULL, '2022-02-07 03:59:29', '2022-02-07 03:59:29'),
(7, 4, 26, NULL, NULL, 'draft', 'quae-consequatur-nihil', NULL, '2022-02-07 03:59:29', '2022-02-07 03:59:29'),
(8, 5, 10, NULL, NULL, 'draft', 'sapiente-repudiandae-numquam', NULL, '2022-02-07 03:59:29', '2022-02-07 03:59:29'),
(9, 3, 11, 83, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207143047_original__media_259.jpg\",\"image_40x40\":\"images\\/20220207143047image_40x40_media_315.png\",\"image_72x72\":\"images\\/20220207143047image_72x72_media_244.png\",\"image_190x230\":\"images\\/20220207143047image_160x160_media_39.png\",\"image_320x320\":\"images\\/20220207143047image_300x200_media_10.png\",\"image_thumbnail\":\"images\\/20220207143047image_thumbnail_media_465.png\",\"image_900x300\":\"images\\/20220207143414image_900x30090.png\",\"image_300x200\":\"images\\/20220207143417image_300x200183.png\"}', 'draft', 'autem-quod-laborum', NULL, '2022-02-07 03:59:29', '2022-02-07 08:34:21'),
(10, 7, 7, 86, '{\"storage\":\"local\",\"original_image\":\"images\\/20220207143140_original__media_406.jpg\",\"image_40x40\":\"images\\/20220207143140image_40x40_media_473.png\",\"image_72x72\":\"images\\/20220207143140image_72x72_media_157.png\",\"image_190x230\":\"images\\/20220207143140image_160x160_media_280.png\",\"image_320x320\":\"images\\/20220207143140image_300x200_media_145.png\",\"image_thumbnail\":\"images\\/20220207143140image_thumbnail_media_269.png\",\"image_900x300\":\"images\\/20220207143351image_900x300101.png\",\"image_300x200\":\"images\\/20220207143354image_300x200219.png\"}', 'published', 'iure-consequuntur-necessitatibus', NULL, '2022-02-07 03:59:29', '2022-02-07 08:33:57');");

    }
}
