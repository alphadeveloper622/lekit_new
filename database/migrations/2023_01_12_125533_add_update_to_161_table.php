<?php

use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddUpdateTo161Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "ALTER TABLE users MODIFY email VARCHAR(191)";
        DB::unprepared($sql);
    }

    public function down()
    {
        Schema::table('155', function (Blueprint $table) {
            //
        });
    }
}
