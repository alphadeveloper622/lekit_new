<?php

namespace Database\Factories;

use App\Models\CommissionHistory;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\SellerProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommissionHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommissionHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id'                   => Order::inRandomOrder()->first()->id,
            'order_detail_id'            => OrderDetail::inRandomOrder()->first()->id,
            'seller_id'                  => SellerProfile::inRandomOrder()->first()->id,
            'admin_commission'           => rand(0, 150),
            'seller_earning'             => rand(100, 950),
        ];
    }
}
