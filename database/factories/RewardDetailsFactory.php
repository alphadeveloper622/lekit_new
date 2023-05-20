<?php

namespace Database\Factories;

use App\Models\RewardDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class RewardDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RewardDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'reward_id' => rand(1,10),
//            'product_id' => rand(1,10),
            'product_qty' => rand(1,50),
            'reward' => rand(20,100),
        ];
    }
}
