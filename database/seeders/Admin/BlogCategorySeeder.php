<?php

namespace Database\Seeders\Admin;

use App\Models\BlogCategory;
use App\Models\BlogCategoryLanguage;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::create(['slug' => 'fun-jhg44kj']);
        BlogCategory::create(['slug' => 'tech-jh564gkj']);
        BlogCategory::create(['slug' => 'sports-jhgkj']);
        BlogCategory::create(['slug' => 'home-44jhgkj']);
        BlogCategory::create(['slug' => 'family-44jhgkj']);
        BlogCategory::create(['slug' => 'fashion-44jhgkj']);
        BlogCategory::create(['slug' => 'style-44jhgkj']);
        BlogCategory::create(['slug' => 'kids-44jhgkj']);
        BlogCategory::create(['slug' => 'medical-44jhgkj']);

        BlogCategoryLanguage::create([ 'blog_category_id' => '1','title'=>'Fun','lang'=>'en']);
        BlogCategoryLanguage::create([ 'blog_category_id' => '2','title'=>'Tech','lang'=>'en']);
        BlogCategoryLanguage::create([ 'blog_category_id' => '3','title'=>'Sports','lang'=>'en']);
        BlogCategoryLanguage::create([ 'blog_category_id' => '4','title'=>'Home','lang'=>'en']);
        BlogCategoryLanguage::create([ 'blog_category_id' => '5','title'=>'Family','lang'=>'en']);
        BlogCategoryLanguage::create([ 'blog_category_id' => '6','title'=>'Fashion','lang'=>'en']);
        BlogCategoryLanguage::create([ 'blog_category_id' => '7','title'=>'Style','lang'=>'en']);
        BlogCategoryLanguage::create([ 'blog_category_id' => '8','title'=>'Kids','lang'=>'en']);
        BlogCategoryLanguage::create([ 'blog_category_id' => '9','title'=>'Medical','lang'=>'en']);



    }
}
