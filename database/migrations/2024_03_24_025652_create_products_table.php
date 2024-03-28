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
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('subcategories')->onDelete('cascade');
            $table->foreignId('childcategory_id')->nullable()->constrained('childcategories')->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('cascade');
            $table->foreignId('warehouse_id')->nullable()->constrained('warehouses')->onDelete('cascade');
            $table->foreignId('pickup_point_id')->nullable()->constrained('pickup_points')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('cascade');
            // $table->foreignId('flash_deal_id')->nullable()->constrained('warehouses')->onDelete('cascade');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('unit')->nullable();
            $table->string('product_tags')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('stock')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->longText('product_details')->nullable();
            $table->string('video_embed_code')->nullable();
            $table->boolean('featured_product')->nullable();
            $table->boolean('today_deal')->nullable();
            $table->boolean('status')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('multiple_image')->nullable();
            $table->string('cash_on_delivery')->nullable();
            $table->string('date');
            $table->string('month');
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
