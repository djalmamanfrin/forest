<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bear_id')->unsigned();
            $table->integer('weight');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bear_id')->references('id')->on('bears');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fishes');
    }
}
