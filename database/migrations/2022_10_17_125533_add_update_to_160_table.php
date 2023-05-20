<?php

use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddUpdateTo160Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         $sql = "   ALTER TABLE products
                MODIFY COLUMN rating double default 0.00;";
        DB::unprepared($sql);

        $cities_sql = "   ALTER TABLE cities
                MODIFY COLUMN cost double default 0.00";
        DB::unprepared($cities_sql);

       

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'currency_id')) {
                $table->dropColumn('currency_id');
            }
        });
       
    }

    public function down()
    {
        Schema::table('155', function (Blueprint $table) {
            //
        });
    }
}
