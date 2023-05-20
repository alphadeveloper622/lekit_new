<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'           => $this->faker->unique()->numberBetween(1,30),
            'name'              => $this->faker->unique()->name(),
            'email'             => $this->faker->unique()->email(),
            'phone_no'          => $this->faker->unique()->phoneNumber(),
            'address'           => $this->faker->address(),
            'country'           => $this->faker->country(),
            'city'              => $this->faker->city(),
            'default_billing'   => 1,
            'default_shipping'  => 1,
        ];
    }
}
