<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('user_name');
            $table->string('user_email')->unique();
            $table->string('user_ip');
            $table->longText('text');
            $table->enum('status', \App\Models\PostComment::$statuses);
            $table->enum('users', \App\Models\PostComment::$users);
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('post')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('parent_id')
                ->references('id')
                ->on('post_comment')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comment');
    }
}
