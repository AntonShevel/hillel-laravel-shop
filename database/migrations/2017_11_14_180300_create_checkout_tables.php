<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('delivery_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('visible');
            $table->timestamps();
        });

        Schema::create('payment_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('visible');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_email');
            $table->string('client_name');
            $table->string('client_phone');
            $table->integer('delivery_type_id')
                ->references('id')
                ->on('delivery_types');
            $table->integer('payment_type_id')
                ->references('id')
                ->on('payment_types');
            $table->decimal('total_price');
            $table->text('comment');
            $table->string('delivery_address');
            $table->timestamps();
        });

        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')
                ->references('id')
                ->on('orders');
            $table->integer('product_id')
                ->references('id')
                ->on('products');
            $table->decimal('price');
            $table->integer('amount');
            $table->string('name');
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
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('delivery_types');
        Schema::dropIfExists('payment_types');
    }
}
