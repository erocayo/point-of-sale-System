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
        Schema::create('product_category', function (Blueprint $table) {
            $table->id('PRODUCT_CATEGORY_ID')->primary();
            $table->string('CATEGORY_NAME',length:255)->nullable();
            $table->string('DESCRIPTION',length:255)->nullable();
            $table->decimal('TAX_RATE', 11, 2)->nullable();
            $table->enum('PRICING_RULE', [
        'Fixed Price',
        'Discount Price',
        'Tiered Pricing',
        'Bundle Pricing',
        'Promotional Price',
        'Member Price',
        'Cost-Plus'
    ])->default('Fixed Price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category');
    }
};
