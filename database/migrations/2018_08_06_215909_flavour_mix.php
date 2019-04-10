<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FlavourMix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flavour_mix', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mix_id')->references('id')->on('mixes');
            $table->integer('flavour_id')->references('id')->on('flavours');
            $table->decimal('percentage');
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
