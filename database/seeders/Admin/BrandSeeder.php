<?php

namespace Database\Seeders\Admin;

use App\Models\Brand;
use App\Models\BrandLanguage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
INSERT INTO `brands` (`id`, `slug`, `status`, `logo_id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'hp-gjgj', 1, NULL, '[]', '2022-02-04 22:15:18', '2022-02-04 22:15:18'),
(2, 'dell-jhgkj', 1, 57, '{\"storage\":\"local\",\"original_image\":\"images/20220205121414_original__media_436.png\",\"image_40x40\":\"images/20220205121414image_40x40_media_175.png\",\"image_72x72\":\"images/20220205121414image_72x72_media_359.png\",\"image_190x230\":\"images/20220205121414image_160x160_media_248.png\",\"image_320x320\":\"images/20220205121414image_300x200_media_250.png\",\"image_thumbnail\":\"images/20220205121414image_thumbnail_media_224.png\",\"image_110x70\":\"images/20220205121422image_110x70376.png\"}', '2022-02-04 22:15:19', '2022-02-05 00:14:22'),
(3, 'apple-jdhgkj', 1, 58, '{\"storage\":\"local\",\"original_image\":\"images/20220205121414_original__media_66.png\",\"image_40x40\":\"images/20220205121414image_40x40_media_87.png\",\"image_72x72\":\"images/20220205121414image_72x72_media_444.png\",\"image_190x230\":\"images/20220205121414image_160x160_media_378.png\",\"image_320x320\":\"images/20220205121414image_300x200_media_372.png\",\"image_thumbnail\":\"images/20220205121414image_thumbnail_media_120.png\",\"image_110x70\":\"images/20220205121433image_110x7028.png\"}', '2022-02-04 22:15:19', '2022-02-05 00:14:33'),
(4, 'axe-jaaj', 1, 55, '{\"storage\":\"local\",\"original_image\":\"images/20220205121413_original__media_203.png\",\"image_40x40\":\"images/20220205121413image_40x40_media_178.png\",\"image_72x72\":\"images/20220205121413image_72x72_media_193.png\",\"image_190x230\":\"images/20220205121413image_160x160_media_134.png\",\"image_320x320\":\"images/20220205121413image_300x200_media_46.png\",\"image_thumbnail\":\"images/20220205121413image_thumbnail_media_192.png\",\"image_110x70\":\"images/20220205121444image_110x70123.png\"}', '2022-02-04 22:15:19', '2022-02-05 00:14:44'),
(5, 'audi-jhgkj', 1, 56, '{\"storage\":\"local\",\"original_image\":\"images/20220205121413_original__media_33.png\",\"image_40x40\":\"images/20220205121413image_40x40_media_243.png\",\"image_72x72\":\"images/20220205121413image_72x72_media_82.png\",\"image_190x230\":\"images/20220205121413image_160x160_media_161.png\",\"image_320x320\":\"images/20220205121413image_300x200_media_154.png\",\"image_thumbnail\":\"images/20220205121413image_thumbnail_media_103.png\",\"image_110x70\":\"images/20220205121457image_110x70326.png\"}', '2022-02-04 22:15:19', '2022-02-05 00:14:57'),
(6, 'toyota-jhgkj', 1, 53, '{\"storage\":\"local\",\"original_image\":\"images/20220205121411_original__media_280.png\",\"image_40x40\":\"images/20220205121411image_40x40_media_223.png\",\"image_72x72\":\"images/20220205121411image_72x72_media_404.png\",\"image_190x230\":\"images/20220205121411image_160x160_media_156.png\",\"image_320x320\":\"images/20220205121411image_300x200_media_159.png\",\"image_thumbnail\":\"images/20220205121411image_thumbnail_media_225.png\",\"image_110x70\":\"images/20220205121513image_110x70471.png\"}', '2022-02-04 22:15:19', '2022-02-05 00:15:13');");

        BrandLanguage::create([ 'brand_id' => '1','title'=>'Hp','lang'=>'en']);
        BrandLanguage::create([ 'brand_id' => '2','title'=>'Dell','lang'=>'en']);
        BrandLanguage::create([ 'brand_id' => '3','title'=>'Apple','lang'=>'en']);
        BrandLanguage::create([ 'brand_id' => '4','title'=>'AXE','lang'=>'en']);
        BrandLanguage::create([ 'brand_id' => '5','title'=>'Audi','lang'=>'en']);
        BrandLanguage::create([ 'brand_id' => '6','title'=>'Toyota','lang'=>'en']);

    }
}
