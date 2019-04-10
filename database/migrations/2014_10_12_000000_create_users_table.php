<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable()->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('type')->default('default');
            $table->integer('default_mix_id')->nullable();
            $table->json('preferences')->nullable();
            $table->bigInteger('xp')->default(0);
            $table->json('achievements')->nullable();
            $table->integer('avatar')->nullable();
            $table->text('profile')->nullable();
            $table->boolean('enabled')->default(1);
            $table->boolean('imported')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
