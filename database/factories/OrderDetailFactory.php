<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id'              => Order::inRandomOrder()->first()->id,
//            'seller_id'             => User::where('user_type','seller')->inRandomOrder()->first()->id,
            'product_id'            => Product::all()->random()->id,
//            'variation'             => $this->faker->randomElement([null,null,null,'Cotton-M-Black', 'Velvet-L-Blue', 'Jersey-XL-Green','Silk-L-Red','Denim-S-Grey']),
            'price'                 => $this->faker->randomElement(['500', '1450', '1670','2630','4456','260']),
//            'tax'                   => 0,
//            'shipping_cost'         => 35,
//            'quantity'              => 1,
//            'payment_status'        => 'unpaid',
//            'delivery_status'       => 0,
//            'shipping_type'         => $this->faker->time('H_i_s').'_'.$this->faker->time('H_i_s').'_'.rand(11111, 44444),
            'pickup_hub_id'         => $this->faker->randomElement([null, null, 1,2,3,null]),
        ];
    }
}
