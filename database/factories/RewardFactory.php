<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Reward;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RewardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reward::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
//            'user_id' => rand(1,40),
            'rewards' => rand(50,150),
            'last_converted' =>Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
