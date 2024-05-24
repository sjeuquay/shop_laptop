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
            $table->string('content', 200);
            $table->string('company', 20);
            $table->string('type', 50);
            $table->string('ram', 30);
            $table->string('capacity', 50);
            $table->string('screen_size', 20);
            $table->string('card_screen', 100);
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
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
