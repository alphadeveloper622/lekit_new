<?php

namespace Database\Factories;

use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'              => $this->faker->unique()->slug(2),
            'background_color'  => $this->faker->hexColor(),
            'text_color'        => $this->faker->hexColor(),
            'start_date'        => Carbon::now(),
            'end_date'          => Carbon::now()->addDays(7),
            'status'            => rand(0, 1),
            'featured'          => rand(0, 1),

        ];
    }
}
