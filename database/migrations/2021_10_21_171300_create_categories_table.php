<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->nullable();
            $table->integer('position')->nullable();
            $table->string('slug',100);
            $table->double('commission',10,3)->default(0)->nullable();
            $table->tinyInteger('status')->default(1);
//            $table->tinyInteger('is_digital')->default(0);
            $table->text('icon')->nullable();
            $table->bigInteger('logo_id')->unsigned()->nullable();
            $table->text('logo')->nullable();
            $table->bigInteger('banner_id')->unsigned()->nullable();
            $table->text('banner')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
