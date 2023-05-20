<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_languages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('lang',10)->default('en')->comment('our default locale for system en');
            $table->string('title')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable()->comment('meta description for seo');
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
        Schema::dropIfExists('category_languages');
    }
}
