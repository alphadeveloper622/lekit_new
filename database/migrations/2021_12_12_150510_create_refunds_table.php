<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->bigInteger('order_detail_id')->unsigned()->nullable();
            $table->bigInteger('seller_id')->unsigned()->nullable();
            $table->bigInteger('processed_by')->unsigned()->nullable();
            $table->double('total_amount',20,3)->nullable();
            $table->double('shipping_cost',10,3)->nullable();
            $table->double('refund_amount',20,3)->nullable();
            $table->string('seller_approval')->default('pending');
            $table->string('admin_approval')->default('pending');
            $table->string('status')->default('pending');
            $table->text('reject_reason')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('refunds');
    }
}
