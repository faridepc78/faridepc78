<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_mobile');
            $table->string('user_email');
            $table->string('user_ip');
            $table->string('title');
            $table->bigInteger('price')->unsigned();
            $table->string('ref_number');
            $table->string('order_number');
            $table->enum('status', \App\Models\Payment::$statuses);
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
        Schema::dropIfExists('payment');
    }
}
