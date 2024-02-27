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
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('child_category_id');
            $table->integer('brand_id');
            $table->text('short_description');
            $table->longText('description');
            $table->text('ingredients');
            $table->text('how_to_use');
            $table->string('images')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->decimal('sale_price', 8, 2);
            $table->integer('discount');
            $table->string('sizes');
            $table->string('weight');
            $table->string('status');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keyword');
            $table->string('tags')->nullable();;
            $table->string('products_tags')->nullable();;
            $table->string('recommendation');
            $table->string('slug');
            $table->string('shop_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
