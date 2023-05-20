<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('support_department_id');
            $table->string('priority');
            $table->string('status');
            $table->tinyInteger('user_id');
            $table->longText('ticket_id');
            $table->tinyInteger('viewed')->default(0);
            $table->tinyInteger('client_viewed')->default(0);
            $table->text('file')->nullable();
            $table->text('ticket_body')->nullable();
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
        Schema::dropIfExists('supports');
    }
}
