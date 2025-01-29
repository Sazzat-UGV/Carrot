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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('post')->nullable();
            $table->string('country')->nullable();
            $table->string('region_state')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('total')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('after_discount')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('tax')->nullable();
            $table->string('shipping_charge')->nullable();
            $table->string('status')->default(0);
            $table->string('order_id')->nullable()->comment('using this id you can track your order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
