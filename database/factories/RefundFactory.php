<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use App\Models\Refund;
use App\Models\User;
use App\Models\Order;
use App\Models\SellerProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Refund::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'user_id'                   =>rand(1,10),
//            'order_id'                  =>rand(1,10),
//            'seller_id'                 =>rand(1,40),
            'refund_amount'             =>rand(500,5000),
            'seller_approval'           => $this->faker->randomElement(['pending']),
            'admin_approval'            => $this->faker->randomElement(['pending']),
            'status'                    => $this->faker->randomElement(['pending']),
            'reject_reason'             => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'remark'                    => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
