<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wallet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'              => User::inRandomOrder()->first()->id,
            'amount'               => rand(1, 50000),
            'source'               => 'opening_balance',
            'type'                 => 'income',
            'payment_method'       => 'bKash',
            'payment_details'      => [],
        ];
    }
}
