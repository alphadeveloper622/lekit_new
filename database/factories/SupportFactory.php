<?php

namespace Database\Factories;

use App\Models\Support;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Support::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prefix = settingHelper('order_prefix') ? settingHelper('order_prefix') : 'YR';
        return [
//            'user_id'     => rand(1, 9),
            'ticket_id'             =>$prefix.Carbon::now()->format('Ymd-His').rand(100, 999),
            'ticket_body'           => $this->faker->unique()->slug(2),
            'subject'               => $this->faker->unique()->slug(2),
            'support_department_id' => rand(1,10),
            'priority'              => $this->faker->randomElement(['low', 'medium','high','priority']),
            'status'                => $this->faker->randomElement(['hold', 'answered','pending','close','open']),
        ];
    }
}
