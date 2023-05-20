<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned()->comment('if none or 1 then own else sellers');
            $table->string('type');
            $table->string('code');
            $table->bigInteger('banner_id')->unsigned()->nullable();
            $table->text('banner')->nullable();
            $table->integer('minimum_shopping')->default(0)->nullable();
            $table->double('maximum_discount',10,3)->nullable();
            $table->text('product_id')->nullable();
            $table->string('discount_type')->nullable();
            $table->double('discount',10,3)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
