<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioExpertiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_expertise', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id')->nullable();
            $table->unsignedBigInteger('expertise_id')->nullable();
            $table->timestamps();

            $table->foreign('portfolio_id')
                ->references('id')
                ->on('portfolio')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('expertise_id')
                ->references('id')
                ->on('expertise')
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
        Schema::dropIfExists('portfolio_expertise');
    }
}
