<?php

namespace Database\Factories;

use App\Models\PickupHubLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PickupHubLanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PickupHubLanguage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pickup_hub_id'     => $this->faker->unique()->randomElement([1, 2, 3]),
            'lang'              => 'en',
            'name'              => $this->faker->company(),
            'address'           => $this->faker->address(),
        ];
    }
}
