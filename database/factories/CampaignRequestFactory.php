<?php

namespace Database\Factories;

use App\Models\CampaignRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CampaignRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'campaign_id'       => $this->faker->unique(true)->numberBetween(1,3),
//            'product_id'        => $this->faker->unique(true)->numberBetween(1,10),
            'discount_type'     => 'flat',
            'discount'          => rand(100, 500),
            'status'            => 'pending',
        ];
    }
}
