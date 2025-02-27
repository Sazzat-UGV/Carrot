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
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->cascadeOnDelete();
            $table->foreignId('warehouse_id')->nullable()->constrained('warehouses')->cascadeOnDelete();
            $table->foreignId('pickup_point_id')->nullable()->constrained('pickup_points')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('code');
            $table->json('tags')->nullable();
            $table->unsignedBigInteger('purchase_price')->nullable();
            $table->unsignedBigInteger('selling_price')->nullable();
            $table->unsignedBigInteger('discount_price')->nullable();
            $table->json('color')->nullable();
            $table->json('size')->nullable();
            $table->unsignedBigInteger('stock_quantity')->nullable();
            $table->unsignedBigInteger('product_view')->default(0);
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('images')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('trending')->nullable();
            $table->boolean('today_deal')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
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
