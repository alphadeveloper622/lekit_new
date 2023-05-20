<?php

namespace Database\Seeders;

use App\Models\Addon;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Addon::create([
            'name' => "OTP System",
            'addon_identifier' => "otp_system",
            'version' => "1.0.0",
            'status' => 1,
        ]);

        Addon::create([
            'name' => "Offline Payment",
            'addon_identifier' => "offline_payment",
            'version' => "1.0.0",
            'status' => 1,
        ]);

        Addon::create([
            'name' => "Wholesale Product",
            'addon_identifier' => "wholesale",
            'version' => "1.0.0",
            'status' => 1,
        ]);

        Addon::create([
            'name' => "Refund System",
            'addon_identifier' => "refund",
            'version' => "1.0.0",
            'status' => 1,
        ]);
        Addon::create([
            'name' => "Chat Messenger",
            'addon_identifier' => "chat_messenger",
            'version' => "1.0.0",
            'status' => 1,
        ]);
    }
}
