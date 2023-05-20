<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_replays', function (Blueprint $table) {
            $table->id();
            $table->longText('ticket_id');
            $table->string('support_id')->nullable();
            $table->text('file')->nullable();
            $table->string('file_id')->nullable();
            $table->longText('replay')->nullable();
            $table->string('type');
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
        Schema::dropIfExists('ticket_replays');
    }
}
