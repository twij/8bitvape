<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->references('id')->on('products');
            $table->string('name');
            $table->float('price', 8, 2);
            $table->text('info');
            $table->integer('stock');
            $table->boolean('enabled')->default(false);
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
        Schema::dropIfExists('price_options');
    }
}
