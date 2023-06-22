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
        Schema::create('rmbr_searchs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('manuf_year')->nullable();
            $table->string('kilometers')->nullable();
            $table->string('price')->nullable();
            $table->string('drive_type')->nullable();
            $table->string('shifter_type')->nullable();
            $table->string('state')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('horse_power')->nullable();
            $table->string('motor_cc')->nullable();
            $table->string('no_doors')->nullable();
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
        Schema::dropIfExists('rmbr_searchs');
    }
};
