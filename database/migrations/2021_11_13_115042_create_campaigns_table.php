<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('background_color',50)->nullable();
            $table->string('text_color',50)->nullable();
            $table->bigInteger('banner_id')->unsigned()->nullable();
            $table->text('banner')->nullable();
            $table->text('thumbnail')->nullable();
            $table->bigInteger('thumbnail_id')->unsigned()->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('flash_sale')->default(0);
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
        Schema::dropIfExists('campaigns');
    }
}
