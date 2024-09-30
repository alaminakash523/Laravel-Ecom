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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Product name
            $table->string('slug')->unique(); // Unique slug for SEO-friendly URLs
            $table->text('description')->nullable(); // Product description
            $table->decimal('price', 10, 2); // Product price, with two decimal places
            $table->string('sku')->unique()->nullable(); // Unique Stock Keeping Unit identifier
            $table->integer('quantity')->default(0); // Stock quantity, defaulting to 0
            $table->string('image')->nullable(); // Path to the product image
            $table->boolean('is_active')->default(true); // Status to indicate if the product is active
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories'); // Foreign key to a categories table
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
