<?php

namespace Database\Factories;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'              => 'product_base',
            'code'              => $this->faker->unique()->slug(1).$this->faker->unique()->numberBetween(501,599),
            'minimum_shopping'  => rand(1, 10),
            'discount_type'     => 'flat',
            'product_id'        => ["1","2"],
            'discount'          => rand(500, 5000),
            'maximum_discount'  => rand(5000, 6000),
            'start_date'        => Carbon::now(),
            'end_date'          => Carbon::now()->addDays(7),
            'status'            => rand(0, 1),
        ];
    }
}
