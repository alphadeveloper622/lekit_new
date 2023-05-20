<?php

namespace Database\Seeders\Admin;

use App\Models\SupportDepartment;
use App\Models\SupportDepartmentLanguages;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SupportDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Factory::create();
        SupportDepartment::create([ 'status' => 1,'slug'=>'it-ssdfg']);
        SupportDepartment::create([ 'status' => 0,'slug'=>'admin-dsdfg']);
        SupportDepartment::create([ 'status' => 1,'slug'=>'stuff-fsdfg']);
        SupportDepartment::create([ 'status' => 1,'slug'=>'marketing-gsdfg']);
        SupportDepartment::create([ 'status' => 1,'slug'=>'delivery-jsdfg']);

        SupportDepartmentLanguages::create([ 'support_department_id' => 1,'lang'=>'en', 'title' => 'IT']);
        SupportDepartmentLanguages::create([ 'support_department_id' => 2,'lang'=>'en', 'title' => 'Admin']);
        SupportDepartmentLanguages::create([ 'support_department_id' => 3,'lang'=>'en','title' => 'Stuff']);
        SupportDepartmentLanguages::create([ 'support_department_id' => 4,'lang'=>'en','title' => 'Marketing']);
        SupportDepartmentLanguages::create([ 'support_department_id' => 5,'lang'=>'en','title' => 'Delivery']);


    }
}
