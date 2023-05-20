<?php

namespace Database\Seeders\Admin;

use App\Models\Attribute;
use App\Models\AttributeLanguage;
use App\Models\AttributeValues;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create();
        Attribute::create();

        AttributeLanguage::create([ 'attribute_id' => '1','title'=>'Size','lang'=>'en']);
        AttributeLanguage::create([ 'attribute_id' => '2','title'=>'Fabric','lang'=>'en']);

        AttributeLanguage::create([ 'attribute_id' => '1','title'=>'সাইজ','lang'=>'bn']);
        AttributeLanguage::create([ 'attribute_id' => '2','title'=>'ফ্যাব্রিক','lang'=>'bn']);

        AttributeValues::create([ 'attribute_id' => '1','value'=>'S']);
        AttributeValues::create([ 'attribute_id' => '1','value'=>'M']);
        AttributeValues::create([ 'attribute_id' => '1','value'=>'L']);
        AttributeValues::create([ 'attribute_id' => '1','value'=>'XL']);

        AttributeValues::create([ 'attribute_id' => '2','value'=>'Cotton']);
        AttributeValues::create([ 'attribute_id' => '2','value'=>'Velvet']);
        AttributeValues::create([ 'attribute_id' => '2','value'=>'Jersey']);
        AttributeValues::create([ 'attribute_id' => '2','value'=>'Silk']);
        AttributeValues::create([ 'attribute_id' => '2','value'=>'Wool']);
        AttributeValues::create([ 'attribute_id' => '2','value'=>'Denim']);
        AttributeValues::create([ 'attribute_id' => '2','value'=>'Satin']);
        AttributeValues::create([ 'attribute_id' => '2','value'=>'Jacquard']);


    }
}
