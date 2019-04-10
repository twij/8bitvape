<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlavourCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flavour_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('company_type');
            $table->integer('logo_id')->nullable();
            $table->string('website_url')->nullable();
            $table->text('description')->nullable();
            $table->text('info')->nullable();
            $table->text('warning')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('flavour_companies');
    }
}
