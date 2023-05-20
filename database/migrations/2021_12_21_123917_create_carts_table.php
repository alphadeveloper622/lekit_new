<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('guest_id',30)->nullable();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->string('variant')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('price',20,3)->default(0.00);
            $table->double('discount',10,3)->default(0.00);
            $table->double('tax',10,3)->default(0.00);
            $table->double('shipping_cost',10,3)->default(0.00);
            $table->string('shipping_type',190)->nullable();
            $table->boolean('coupon_applied')->nullable()->default(0);
            $table->double('coupon_discount',10,3)->default(0.00);
            $table->string('trx_id')->nullable();
            $table->string('product_referral_code')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
