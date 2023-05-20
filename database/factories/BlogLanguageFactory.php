<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogLanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogLanguage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blog_id' => $this->faker->unique()->numberBetween(1,10),
            'lang' => 'en',
            'title' => $this->faker->realText($maxNbChars = 60, $indexSize = 2),
            'short_description' => $this->faker->realText($maxNbChars = 60, $indexSize = 2),
            'long_description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'meta_title'        => $this->faker->realText($maxNbChars = 60, $indexSize = 2),
            'meta_description'  => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
