<?php

namespace Database\Factories;

use App\Models\ProductStock;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name'                              => $this->faker->text($maxNbChars = 5) ,
            'sku'                               => rand(10,100),
            'current_stock'                     => rand(10,100),
            'price'                             => rand(10,100),
//            'image'                             => rand(10,100),


        ];
    }
}
