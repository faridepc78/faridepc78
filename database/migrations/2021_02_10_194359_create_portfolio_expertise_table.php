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
            $table->unsignedBigInteger('expertise_id')->nullable();
            $table->timestamps();

            $table->foreign('expertise_id')
                ->references('id')
                ->on('expertise')
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
        Schema::dropIfExists('portfolio_expertise');
    }
}
