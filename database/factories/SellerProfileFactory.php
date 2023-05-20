<?php

namespace Database\Factories;

use App\Models\SellerProfile;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SellerProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_name'         => $this->faker->company(),
            'slug'              => $this->faker->unique()->slug(2),
            'verified_at'       => Carbon::now(),
            'phone_no'          => $this->faker->unique()->phoneNumber(),
            'address'           => $this->faker->address(),
            'meta_title'        => $this->faker->realText($maxNbChars = 60, $indexSize = 2),
            'meta_description'  => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
