<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address = Address::inRandomOrder()->first();
        $address2 = Address::inRandomOrder()->first();
        $row_array = $address->toArray();
        $row_array2 = $address2->toArray();
//        return json_encode($row_array);

        $prefix = settingHelper('order_prefix') ? settingHelper('order_prefix') : 'YR';
        return [
//            'user_id'                   => User::inRandomOrder()->first()->id,
            'shipping_address'          => $row_array,
            'billing_address'           => $row_array2,
            'delivery_status'           => $this->faker->randomElement(['pending','delivered', 'pending']),
            'payment_type'              => 'cash_on_delivery',
            'payment_status'            => 'unpaid',
            'payment_details'           => null,
            'total_amount'              =>$this->faker->randomElement(['5000', '14500', '1670','26300','4456','2600']),
            'coupon_discount'           => 0,
            'code'                      => $prefix.Carbon::now()->format('Ymd-His').rand(100, 999),
            'date'                      => Carbon::now(),
        ];
    }
}
