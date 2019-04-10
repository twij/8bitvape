<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlavoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flavours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('flavour_company_id')->references('id')->on('flavour_companies');
            $table->integer('flavour_type_id')->references('id')->on('flavour_types');
            $table->integer('user_id')->references('id')->on('users');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->text('warning')->nullable();
            $table->integer('flavour_image_id')->nullable()->references('id')->on('flavour_images');
            $table->integer('base_ingredient_id')->nullable()->references('id')->on('base_ingredients');
            $table->integer('parent_id')->nullable();
            $table->integer('parent_type')->nullable();
            $table->integer('certified')->default(0);
            $table->json('known_harmfuls')->nullable();
            $table->string('flavour_strength_id')->nullable()->references('id')->on('flavour_strengths');
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
        Schema::dropIfExists('flavours');
    }
}
