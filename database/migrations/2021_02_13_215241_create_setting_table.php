<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->longText('rule');
            $table->string('full_name');
            $table->string('bio');
            $table->text('trust');
            $table->text('trust_reason1');
            $table->text('trust_reason2');
            $table->text('trust_reason3');
            $table->text('trust_reason4');
            $table->text('footer_text');
            $table->longText('about1');
            $table->longText('about2');
            $table->unsignedBigInteger('logo')->nullable();
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
        Schema::dropIfExists('setting');
    }
}
