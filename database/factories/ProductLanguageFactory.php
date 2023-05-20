<?php

namespace Database\Factories;

use App\Models\ProductLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductLanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductLanguage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                              => $this->faker->text($maxNbChars = 7) ,
            'description'                       => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'tags'                              => $this->faker->text($maxNbChars = 10) ,
            'unit'                              => $this->faker->text($maxNbChars = 5) ,
            'meta_title'                        => $this->faker->text($maxNbChars = 10) ,
            'meta_description'                  => $this->faker->realText($maxNbChars = 100, $indexSize = 5),
            'meta_keywords'                     => $this->faker->text($maxNbChars = 10) ,

        ];
    }
}
