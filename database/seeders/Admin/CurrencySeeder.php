<?php

namespace Database\Seeders\Admin;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([ 'name' => 'US Dollar', 'symbol' => '$', 'code' => 'USD', 'exchange_rate' => '1', 'status' => 1]);

    }
}
