<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MixAdditives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mix_additives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mix_id')->references('id')->on('mixes');
            $table->integer('additive_id')->references('id')->on('additives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
