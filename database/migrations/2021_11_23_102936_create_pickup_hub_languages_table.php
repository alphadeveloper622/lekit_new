<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupHubLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickup_hub_languages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pickup_hub_id')->unsigned()->index();
            $table->string('name');
            $table->text('address');
            $table->string('lang',10)->index();
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
        Schema::dropIfExists('pickup_hub_languages');
    }
}
