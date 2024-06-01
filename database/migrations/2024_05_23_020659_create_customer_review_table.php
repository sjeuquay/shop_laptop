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
        Schema::create('customer_review', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->string('content', 255);
            $table->string('name', 20);
            $table->string('email', 50);
            $table->dateTime('date_created')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_review');
    }
};
