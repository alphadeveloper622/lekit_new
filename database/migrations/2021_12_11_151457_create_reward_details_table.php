<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reward_id');
            $table->bigInteger('product_id');
            $table->bigInteger('product_qty');
            $table->bigInteger('reward');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reward_details');
    }
}
