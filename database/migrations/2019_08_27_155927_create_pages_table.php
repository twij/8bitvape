<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'pages',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('slug');
                $table->string('path');
                $table->string('title');
                $table->integer('user_id')->references('id')->on('users');
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
                $table->longText('content')->nullable();
                $table->string('include')->nullable();
                $table->timestamps();
                $table->boolean('public')->default(true);
                $table->boolean('enabled')->default(true);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
