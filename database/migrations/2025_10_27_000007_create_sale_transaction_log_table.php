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
        Schema::create('sale_transaction_log', function (Blueprint $table) {
            $table->id('SALE_TRANSACTION_LOG_ID')->primary();
            $table->unsignedBigInteger('SALE_TRANSACTION_ID');
            $table->enum('ACTION_TYPE', ['created','detail added','detail deleted','detail updated','confirmed','deleted']);
            $table->timestamps();

            $table->foreign('SALE_TRANSACTION_ID')->references('SALE_TRANSACTION_ID')->on('sale_transaction');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_transaction_log');
    }
};
