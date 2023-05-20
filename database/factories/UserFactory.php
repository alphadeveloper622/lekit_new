<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'status' => rand(0, 1),
            'balance' => 0.00,
            'is_user_banned' => rand(0, 1),
            'newsletter_enable' => rand(0, 1),
            'permissions' => [],
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'password' => bcrypt(123456),
            'user_type' => $this->faker->randomElement(['customer', 'seller', 'staff','delivery_hero']),

        ];
    }

    private function superAdminPermissions()
    {
        return [
            'customer_create',
            'customer_read',
            'customer_update',
            'customer_delete',

            'staff_create',
            'staff_read',
            'staff_update',
            'staff_delete',

            'role_create',
            'role_read',
            'role_update',
            'role_delete',

            'seller_create',
            'seller_read',
            'seller_update',
            'seller_delete',

            'language_create',
            'language_read',
            'language_update',
            'language_delete',
            'translation_message_update',

            'media_create',
            'media_read',
            'media_update',
            'media_delete',
            'media_download',

            'brand_create',
            'brand_read',
            'brand_update',
            'brand_delete',

            'color_create',
            'color_read',
            'color_update',
            'color_delete',

            'attribute_create',
            'attribute_read',
            'attribute_update',
            'attribute_delete',

            'attribute_value_create',
            'attribute_value_read',
            'attribute_value_update',
            'attribute_value_delete',

            'category_create',
            'category_read',
            'category_update',
            'category_delete',
        ];
    }

    private function managerPermissions()
    {
        return [
            'customer_create',
            'customer_read',
            'customer_update',
            'customer_delete',

            'staff_create',
            'staff_read',
            'staff_update',
            'staff_delete',

            'role_create',
            'role_read',
            'role_update',
            'role_delete',

            'seller_create',
            'seller_read',
            'seller_update',
            'seller_delete',

            'language_create',
            'language_read',
            'language_update',
            'language_delete',
            'translation_message_update',

            'media_create',
            'media_read',
            'media_update',
            'media_delete',
            'media_download',

            'brand_create',
            'brand_read',
            'brand_update',
            'brand_delete',

            'color_create',
            'color_read',
            'color_update',
            'color_delete',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
