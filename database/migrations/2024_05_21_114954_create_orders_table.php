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
            $table->integer('id')->autoIncrement(); // This will create an auto incrementing primary key column
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->string('paymentMethod');
            $table->integer('amount');
            $table->integer('pay_amount');
            $table->string('zip', 6);
            $table->string('phone', 10);
            $table->string('name', 50);
            $table->string('email');
            $table->string('ship_address1', 150);
            $table->string('ship_address2', 150)->nullable();
            $table->string('customer_notes', 255)->nullable();
            $table->dateTime('date_created')->useCurrent();
            $table->dateTime('date_delivery')->useCurrent();
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
