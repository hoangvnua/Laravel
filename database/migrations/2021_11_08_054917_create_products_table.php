<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('content');
            $table->string('quantity');
            $table->decimal('origin_price');
            $table->decimal('sale_price');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('status');
            $table->json('option');
            $table->integer('view_count')->nullable();
            $table->integer('sale_count')->nullable();
            $table->integer('review_count')->nullable();
            $table->json('info')->nullable();
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
