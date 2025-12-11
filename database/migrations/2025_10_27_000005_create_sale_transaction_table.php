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
        Schema::create('sale_transaction', function (Blueprint $table) {
    $table->id('SALE_TRANSACTION_ID')->primary();
    $table->unsignedBigInteger('USER_ID');
    $table->decimal('TOTAL_PRICE', 10, 2)->default(0);
    $table->enum('STATUS', ['pending','completed','deleted'])->default('pending');

    $table->foreign('USER_ID')->references('USER_ID')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_transaction');
    }
};
