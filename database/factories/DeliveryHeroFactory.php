<?php

namespace Database\Factories;

use App\Models\DeliveryHero;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryHeroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryHero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pickup_hub_id'         => rand(1,3),
            'driving_licence'       => null,
            'driving_licence_image' => [],
            'commission'            => 20,
            'salary'                => 2000,
            'total_collection'      => 0,
            'country_id'            => 19,
            'state_id'              => 771,
            'city_id'               => 8547,
            'address'               => $this->faker->address(),
        ];
    }
}
