<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_product');
            $table->string('slug_product');
            $table->string('image');
            $table->float('price');
            $table->string('description');
            $table->tinyInteger('status_product');
            $table->integer('id_product_type')->unsigned();
            $table->foreign('id_product_type')->references('id')->on('product_types')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
