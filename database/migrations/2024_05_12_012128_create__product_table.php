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
            $table->string('description', 200);
            $table->string('short_description', 200);
            $table->tinyInteger('is_stock')->default(1);
            $table->integer('hot');
            $table->integer('price');
            $table->integer('sale_price');
            $table->integer('quantity_available');
            $table->integer('view');
            $table->string('image', 200);
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->dateTime('time_up')->useCurrent();
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
