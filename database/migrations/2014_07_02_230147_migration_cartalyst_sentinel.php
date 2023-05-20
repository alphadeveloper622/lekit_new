<?php

/*
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Sentinel
 * @version    5.1.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2020, Cartalyst LLC
 * @link       https://cartalyst.com
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationCartalystSentinel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
            $table->text('permissions')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('slug');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email',50)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('password')->nullable();
            $table->text('permissions')->nullable();
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->enum('user_type', ['admin','staff','seller','customer','delivery_hero'])->default('customer');
            $table->string('gender')->default('male')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 inactive, 1 active');
            $table->tinyInteger('is_user_banned')->default(0)->comment('0 unban, 1 ban');
            $table->tinyInteger('newsletter_enable')->default(0)->comment('0 unable, 1 enable');
            $table->integer('otp')->nullable()->comment('used for reset password');
            $table->string('firebase_auth_id', 100)->nullable()->comment('this is for mobile app.');
            $table->tinyInteger('is_password_set')->default(1)->comment('0 for social login');
            $table->text('images')->nullable();
            $table->longText('socials')->nullable()->comment('it will be array data');
            $table->timestamp('last_login')->nullable();
            $table->string('last_ip',30)->nullable();
            $table->timestamp('last_password_change')->nullable();
            $table->bigInteger('image_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->bigInteger('pickup_hub_id')->unsigned()->nullable();
            $table->double('balance', 20,3)->default(0.000);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('activations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('code');
            $table->boolean('completed')->default(0);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('persistences', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('code');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('code');
        });

        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('code');
            $table->boolean('completed')->default(0);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('role_users', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->nullableTimestamps();

            $table->engine = 'InnoDB';
            $table->primary(['user_id', 'role_id']);
        });

        Schema::create('throttle', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('type');
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('throttle');
        Schema::drop('role_users');
        Schema::drop('persistences');
        Schema::drop('activations');
        Schema::drop('reminders');
        Schema::drop('users');
        Schema::drop('roles');
    }
}
