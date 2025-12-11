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
        Schema::create('sale_transaction_details', function (Blueprint $table) {
            $table->id('SALE_TRANSACTION_DETAILS_ID')->primary();
            $table->unsignedBigInteger('SALE_TRANSACTION_ID');
            $table->unsignedBigInteger('PRODUCT_ID');
            $table->decimal('UNIT_PRICE', 10, 2);
            $table->unsignedSmallInteger('QUANTITY')->default(0);
            $table->decimal('TOTAL', 10, 2);
            
            $table->foreign('SALE_TRANSACTION_ID')->references('SALE_TRANSACTION_ID')->on('sale_transaction');
            $table->foreign('PRODUCT_ID')->references('PRODUCT_ID')->on('product');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_transaction_details',function (Blueprint $table){
        $table->dropForeign('sale_transaction_details_product_id_foreign');
        $table->dropForeign('sale_transaction_details_sale_transaction_id_foreign');
    });
        Schema::dropIfExists('sale_transaction_details');
    }
};
