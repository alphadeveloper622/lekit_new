<?php

namespace Database\Factories;

use App\Models\SellerPayout;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerPayoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SellerPayout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => rand(500, 5000),
            'message' => $this->faker->realText($maxNbChars = 60, $indexSize = 2),
            'status' => $this->faker->randomElement(['accepted', 'rejected', 'pending']),
        ];
    }
}
