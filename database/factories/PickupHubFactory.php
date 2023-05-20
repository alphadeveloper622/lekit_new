<?php

namespace Database\Factories;

use App\Models\PickupHub;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PickupHubFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PickupHub::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'  =>  User::where('user_type','staff')->inRandomOrder()->first()->id,
            'phone'     =>  $this->faker->unique()->phoneNumber(),
        ];
    }
}
