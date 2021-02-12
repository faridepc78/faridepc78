<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('post_category_id')->nullable();
            $table->unsignedBigInteger('image_id')->unsigned()->nullable();
            $table->longText('text');
            $table->bigInteger('view')->unsigned()->default('0');
            $table->timestamps();

            $table->foreign('post_category_id')
                ->references('id')
                ->on('post_category')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('image_id')
                ->references('id')
                ->on('media')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
