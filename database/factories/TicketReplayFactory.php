<?php

namespace Database\Factories;

use App\Models\TicketReplay;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketReplayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketReplay::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prefix = settingHelper('order_prefix') ? settingHelper('order_prefix') : 'YR';
        return [
            'support_id'     => rand(1, 9),
            'ticket_id'      =>$prefix.Carbon::now()->format('Ymd-His').rand(100, 999),
            'replay'        => $this->faker->unique()->slug(2),
            'type' => $this->faker->randomElement(['admin', 'customer','seller','delivery_hero','staff']),
        ];
    }
}
