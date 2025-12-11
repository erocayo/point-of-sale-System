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
        Schema::create('product', function (Blueprint $table) {
            $table->id('PRODUCT_ID')->primary();
            $table->unsignedBigInteger('PRODUCT_CATEGORY_ID');
            $table->string('PRODUCT_NAME', length: 255)->nullable();
            $table->string('DESCRIPTION', length: 255)->nullable();
            $table->integer('PRICE');
            $table->unsignedSmallInteger('STOCK_LEVEL');

            $table->foreign('PRODUCT_CATEGORY_ID')->references('PRODUCT_CATEGORY_ID')->on('product_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product',function (Blueprint $table){
            $table->dropForeign('product_product_category_id_foreign'
        );
    });
        Schema::dropIfExists('product');
    }
};
