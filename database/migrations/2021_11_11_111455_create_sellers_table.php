<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('shop_name')->index();
            
            $table->string('company_name')->index();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_type')->nullable();
            $table->integer('number_employees')->default(1);
            
            $table->string('slug')->index();
            $table->dateTime('verified_at')->nullable();

            $table->string('license_no')->nullable();
            $table->text('tax_paper')->nullable();

            $table->text('logo')->nullable();
            $table->text('banner')->nullable();
            $table->text('shop_page_contents')->nullable();
            $table->bigInteger('shop_banner_id')->unsigned()->nullable();
            $table->text('shop_banner')->nullable();
            $table->text('shop_tagline')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('address')->nullable();
            $table->text('facebook')->nullable();
            $table->text('google')->nullable();
            $table->text('twitter')->nullable();
            $table->text('youtube')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('sellers');
    }
}
