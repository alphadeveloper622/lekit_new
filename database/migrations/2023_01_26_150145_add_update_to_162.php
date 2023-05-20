<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdateTo162 extends Migration
{
    public function up()
    {
        $user = \App\Models\User::find(1);

        $permissions = $user->permissions;

        if (!in_array(['package_update'],$permissions) && !in_array(['package_create'],$permissions) && !in_array(['package_destroy'],$permissions)
            && !in_array(['package_status_change'],$permissions) && !in_array(['subscription_setting_read'],$permissions))
        {
            $permissions[]      = "package_read";
            $permissions[]      = "package_create";
            $permissions[]      = "package_update";
            $permissions[]      = "package_destroy";
            $permissions[]      = "package_status_change";
            $permissions[]      = "subscription_setting_read";
            $permissions[]      = "online_payment_read";
            $permissions[]      = "offline_payment_read";
            $user->permissions  = $permissions;
            $user->save();
        }

        $permission = Permission::where('attribute','package')->first();

        if (!$permission)
        {
            $value = [
                'read'              => 'package_read',
                'create'            => 'package_create',
                'update'            => 'package_update',
                'destroy'           => 'package_destroy',
                'status'            => 'package_status_change',
                'settings'          => 'subscription_setting_read',
                'online_payment'    => 'online_payment_read',
                'offline_payment'   => 'offline_payment_read'
            ];

            Permission::create([
                'attribute' => "package",
                'keywords' => $value,
            ]);
        }
    }

    public function down()
    {
        Schema::table('162', function (Blueprint $table) {
            //
        });
    }
}
