<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('headline');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('portfolio_category_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->longText('text');
            $table->string('customer');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('portfolio_category_id')
                ->references('id')
                ->on('portfolio_category')
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
        Schema::dropIfExists('portfolio');
    }
}
