<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_heroes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('pickup_hub_id')->unsigned()->nullable();
            $table->string('driving_licence')->nullable();
            $table->text('driving_licence_image')->nullable();

            $table->double('salary',10,3)->default(0.00);
            $table->double('commission',10,3)->default(0.00);
            $table->double('total_commission',20,3)->default(0.00);
            $table->double('total_collection',20,3)->default(0.00);
            $table->double('total_paid',20,3)->default(0.00);

            $table->bigInteger('country_id')->nullable();
            $table->bigInteger('state_id')->nullable();
            $table->Integer('city_id')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('delivery_heroes');
    }
}
