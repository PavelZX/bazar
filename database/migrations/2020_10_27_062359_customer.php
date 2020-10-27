<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('phone', 255);
            $table->string('address', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->integer('age');
            $table->boolean('ready')->default(false);
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('image', 255);
            $table->double('balance');
            $table->unsignedBigInteger('dialog_id');
            $table->foreign('dialog_id')->references('id')->on('dialogs');
            $table->string('favorites', 255);
            $table->string('blacklist', 255);
            $table->boolean('vip')->default(false);
            $table->text('settings');

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
        Schema::dropIfExists('customers');
    }
}
