<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBearsPicnicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bear_picnic', function (Blueprint $table) {
            $table->integer('bear_id')->unsigned();
            $table->integer('picnic_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bear_id')->references('id')->on('bears');
            $table->foreign('picnic_id')->references('id')->on('picnics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bears_picnics');
    }
}
