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
        Schema::create('specifications', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('OS', 200);
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->string('hard_disk', 150);
            $table->string('ram', 100);
            $table->string('capacity', 100);
            $table->string('color', 100);
            $table->string('screen_size', 255);
            $table->string('card_screen', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specifications');
    }
};
