<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialSchema extends Migration
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
            $table->string('name');
            $table->text('description');
            $table->boolean('visible');
            $table->decimal('price');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->string('filename')->unique();
            $table->boolean('visible');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->integer('parent_id')
                ->nullable()
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->boolean('visible');
            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->integer('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->integer('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('images');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_product');
    }
}
