<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->string('btn_link');
            $table->boolean('status')->default(true);
            $table->string('image_align')->default('left');
            $table->string('text_align')->default('right');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->text('bg_image')->nullable();
            $table->unsignedBigInteger('bg_image_id')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
