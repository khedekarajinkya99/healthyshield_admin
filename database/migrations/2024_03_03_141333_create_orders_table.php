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
            $table->string('order_id');
            $table->string('customer_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->integer('product_id');
            $table->integer('product_quantity');
            $table->integer('shipping_charges');
            $table->integer('discount');
            $table->dateTime('order_date');
            $table->string('status');
            $table->string('payment_status');
            $table->integer('gst_amount');
            $table->integer('tax_rate');
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
