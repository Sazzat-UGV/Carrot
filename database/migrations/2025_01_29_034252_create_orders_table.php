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
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('post')->nullable();
            $table->string('country')->nullable();
            $table->string('region_state')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('total')->nullable();
            $table->string('coupon_code')->nullable();
            $table->decimal('coupon_discount')->nullable();
            $table->decimal('after_discount')->nullable();
            $table->string('payment_type')->nullable();
            $table->decimal('tax')->nullable();
            $table->decimal('shipping_charge')->nullable();
            $table->enum('status', ['Pending', 'Received', 'Shipped', 'Return', 'Cancel', 'Complete'])->status('Pending');
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
