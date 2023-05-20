<?php

namespace Database\Factories;

use App\Models\Search;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Search::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'query'         => $this->faker->company(),
            'total_search'  => rand(1, 40),
        ];
    }
}
