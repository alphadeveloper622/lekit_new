<?php

namespace Database\Factories;

use App\Models\CampaignLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignLanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CampaignLanguage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'campaign_id'       => $this->faker->unique()->randomElement([1, 2, 3]),
            'lang'              => 'en',
            'title'             => $this->faker->word(),
        ];
    }
}
