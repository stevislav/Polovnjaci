<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('brand');
            $table->string('type');
            $table->string('manuf_year');
            $table->string('kilometers');
            $table->string('price');
            $table->string('drive_type');
            $table->string('shifter_type');
            $table->string('state');
            $table->string('fuel_type');
            $table->string('horse_power');
            $table->string('motor_cc');
            $table->string('no_doors');
            $table->string('roof_type');
            $table->enum('approved', array('0','1'))->default('0');
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
        Schema::dropIfExists('listings');
    }
};
