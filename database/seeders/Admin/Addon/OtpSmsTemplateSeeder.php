<?php

namespace Database\Seeders\Admin\Addon;

use Illuminate\Database\Seeder;
use DB;

class OtpSmsTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO `sms_templates` (`tab_key`, `title`, `status`, `template_id`, `sms_body`, `created_at`, `updated_at`) VALUES
('signup', 'Signup SMS', 1, '125', 'Your phone number verification otp is {otp}', NULL, '2021-11-07 11:31:01'),
('login', 'Login SMS', 1, '235', 'Your login otp is {otp}', NULL, '2021-11-07 11:30:55'),
('forget-password', 'Forget Password SMS', 1, '210', 'Your recovery password otp is {otp}', NULL, '2021-11-07 11:30:50')");
    }
}
