<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mixes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('type_id')->references('id')->on('mix_type');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->text('warning')->nullable();
            $table->integer('original_id')->nullable()->references('id')->on('mix');
            $table->string('original_name')->nullable();
            $table->string('original_company')->nullable();
            $table->integer('creator_rating');
            $table->integer('flavour_strength_id')->nullable()->references('id')->on('flavour_strength');
            $table->boolean('starred')->default(false);
            $table->integer('default_mix_id')->nullable()->references('id')->on('default_mixes');
            $table->integer('recommended_steeping_days')->default(0);
            $table->text('recommended_steeping_info')->nullable();
            $table->boolean('enabled')->default(false);
            $table->softDeletes();
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
        //
        Schema::dropIfExists('mix');
    }
}
