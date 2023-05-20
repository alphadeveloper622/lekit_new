<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comment_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->comment('used like when user is logged in')->constrained()->nullOnDelete();
            $table->foreignId('blog_comment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('blog_comment_replies')->cascadeOnDelete();
            $table->text('comment')->nullable();
            $table->boolean('level')->default(0);
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
        Schema::dropIfExists('blog_comment_replies');
    }
}
