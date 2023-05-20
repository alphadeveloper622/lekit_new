<?php

use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdateTo154Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = \App\Models\User::find(1);

        $permissions = $user->permissions;

        if (!in_array(['font_update'],$permissions) && !in_array(['seller_as_login'],$permissions))
        {
            $permissions[] = "font_update";
            $permissions[] = "seller_as_login";
            $user->permissions = $permissions;
            $user->save();
        }

        $permission = Permission::where('attribute','font_update')->first();

        if (!$permission)
        {
            $value = [
                'update'    => 'font_update',
            ];

            Permission::create([
                'attribute' => "font",
                'keywords' => $value,
            ]);

        }

        $permission = Permission::where('attribute','seller')->first();
        $value = $permission->keywords;
        if ($permission)
        {
            $value['login'] = 'seller_as_login';

            $permission->update([
                'keywords' => $value
            ]);
        }
    }

    public function down()
    {
        Schema::table('154', function (Blueprint $table) {
            //
        });
    }
}
