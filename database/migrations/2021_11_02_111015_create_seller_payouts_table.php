<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_payouts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->double('amount',20,3)->nullable();
            $table->longText('message')->nullable();
            $table->mediumText('payment_to')->nullable();
            $table->string('payment_by')->nullable();
            $table->string('payment_from')->nullable();
            $table->enum('status',['pending','accepted','rejected','canceled','processed'])->default('pending');
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
        Schema::dropIfExists('seller_payouts');
    }
}
