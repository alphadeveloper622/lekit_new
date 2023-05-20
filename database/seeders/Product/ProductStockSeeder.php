<?php

namespace Database\Seeders\Product;

use App\Models\ProductStock;
use Illuminate\Database\Seeder;
use DB;

class ProductStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        ProductStock::create(['id' => 1,'variant_ids' => null,'product_id' => 1 ,'name'=>null, 'sku' =>'1477','current_stock' =>200,'price'=>67.00,'image'=>'[]','image_id'=>null,'created_at'=>'2022-02-08 04:44:42','updated_at'=>'2022-02-08 04:44:42']);
//        ProductStock::create(['id' => 2,'variant_ids' => null,'product_id' => 2 ,'name'=>null, 'sku' =>'1477','current_stock' =>200,'price'=>82.00,'image'=>'[]','image_id'=>null,'created_at'=>'2022-02-08 04:44:42','updated_at'=>'2022-02-08 04:44:42']);
//        ProductStock::create(['id' => 3,'variant_ids' => null,'product_id' => 3 ,'name'=>null, 'sku' =>'1477','current_stock' =>200,'price'=>18.00,'image'=>'[]','image_id'=>null,'created_at'=>'2022-02-08 04:44:42','updated_at'=>'2022-02-08 04:44:42']);
//        ProductStock::create(['id' => 4,'variant_ids' => null,'product_id' => 4 ,'name'=>null, 'sku' =>'1477','current_stock' =>200,'price'=>23.00,'image'=>'[]','image_id'=>null,'created_at'=>'2022-02-08 04:44:42','updated_at'=>'2022-02-08 04:44:42']);
//        ProductStock::create(['id' => 5,'variant_ids' => null,'product_id' => 5 ,'name'=>null, 'sku' =>'1477','current_stock' =>200,'price'=>56.00,'image'=>'[]','image_id'=>null,'created_at'=>'2022-02-08 04:44:42','updated_at'=>'2022-02-08 04:44:42']);
//        ProductStock::create(['id' => 6,'variant_ids' => null,'product_id' => 6 ,'name'=>null, 'sku' =>'1477','current_stock' =>200,'price'=>36.00,'image'=>'[]','image_id'=>null,'created_at'=>'2022-02-08 04:44:42','updated_at'=>'2022-02-08 04:44:42']);
//        ProductStock::create(['id' => 7,'variant_ids' => null,'product_id' => 7 ,'name'=>null, 'sku' =>'1477','current_stock' =>200,'price'=>92.00,'image'=>'[]','image_id'=>null,'created_at'=>'2022-02-08 04:44:42','updated_at'=>'2022-02-08 04:44:42']);
//        ProductStock::create(['id' => 9,'variant_ids' => null,'product_id' => 9 ,'name'=>null, 'sku' =>'1477','current_stock' =>200,'price'=>22.00,'image'=>'[]','image_id'=>null,'created_at'=>'2022-02-08 04:44:42','updated_at'=>'2022-02-08 04:44:42']);

        DB::statement("INSERT INTO `product_stocks` (`id`, `variant_ids`, `product_id`, `name`, `sku`, `current_stock`, `price`, `image`, `image_id`, `created_at`, `updated_at`) VALUES
(1, '2', 1, 'Black', 'Black', 20, 1080.00, '{\"storage\":\"local\",\"original_image\":\"images/20220205115418_original__media_457.jpg\",\"image_40x40\":\"images/20220205115418image_40x40_media_329.png\",\"image_72x72\":\"images/20220205115418image_72x72_media_165.png\",\"image_190x230\":\"images/20220205115418image_160x160_media_178.png\",\"image_320x320\":\"images/20220205115418image_300x200_media_417.png\",\"image_thumbnail\":\"images/20220205115418image_thumbnail_media_429.png\",\"image_140x190\":\"images/20220205115453image_140x190135.png\",\"image_17x17\":\"images/20220205115453image_17x17381.png\",\"image_130x95\":\"images/20220205115453image_130x95244.png\",\"image_80x60\":\"images/20220205115453image_80x60389.png\"}', 49, '2022-03-06 01:00:58', '2022-03-06 01:00:58'),
(2, '5', 1, 'Grey', 'Grey', 30, 1080.00, '{\"storage\":\"local\",\"original_image\":\"images/20220205115417_original__media_181.jpg\",\"image_40x40\":\"images/20220205115417image_40x40_media_10.png\",\"image_72x72\":\"images/20220205115417image_72x72_media_449.png\",\"image_190x230\":\"images/20220205115417image_160x160_media_64.png\",\"image_320x320\":\"images/20220205115417image_300x200_media_44.png\",\"image_thumbnail\":\"images/20220205115417image_thumbnail_media_404.png\",\"image_140x190\":\"images/20220205115524image_140x190325.png\",\"image_17x17\":\"images/20220205115524image_17x17343.png\",\"image_130x95\":\"images/20220205115524image_130x95193.png\",\"image_80x60\":\"images/20220205115525image_80x60368.png\"}', 47, '2022-03-06 01:00:58', '2022-03-06 08:37:25'),
(3, NULL, 2, '', 'add-5', 200, 450.00, '[]', NULL, '2022-03-06 08:25:02', '2022-03-06 09:21:17'),
(4, NULL, 3, '', 'add-5', 200, 450.00, '[]', NULL, '2022-03-06 08:25:02', '2022-03-06 09:21:17')");
    }
}
