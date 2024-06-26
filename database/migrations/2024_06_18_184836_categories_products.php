<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories_products', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("categories_id");
            $table->timestamps();

            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_products');
    }
};
