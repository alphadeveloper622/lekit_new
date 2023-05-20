<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppIntroLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_intro_languages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('order');
            $table->string('lang',10)->default('en')->index()->comment('our default locale for system en');
            $table->bigInteger('app_intro_id');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('app_intro_languages');
    }
}
