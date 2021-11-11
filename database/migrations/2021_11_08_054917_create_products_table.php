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
            $table->decimal('origin_price');
            $table->decimal('sale_price');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('status');
            $table->json('option');
            $table->integer('view_count');
            $table->integer('sale_count');
            $table->integer('review_count');
            $table->json('info');
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
