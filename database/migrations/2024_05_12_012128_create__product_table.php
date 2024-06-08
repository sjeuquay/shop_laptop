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
        Schema::create('Product', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 200);
            $table->longText('description');
            $table->boolean('is_stock')->default(1);
            $table->integer('hot');
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->integer('quantity_available');
            $table->integer('view')->nullable();
            $table->string('image', 255);
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->dateTime('time_up');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Product');
    }
};
