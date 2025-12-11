<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_category_SEEDER extends Seeder
{
    public function run()
    {
        DB::table('product_category')->insert([
            [
                'CATEGORY_NAME' => 'Fresh Produce',
                'DESCRIPTION' => 'Fruits and vegetables',
                'TAX_RATE' => 5.00,
                'PRICING_RULE' => 'Fixed Price',
            ],
            [
                'CATEGORY_NAME' => 'Dairy Products',
                'DESCRIPTION' => 'Milk, cheese, yogurt, and butter',
                'TAX_RATE' => 5.50,
                'PRICING_RULE' => 'Fixed Price',
            ],
            [
                'CATEGORY_NAME' => 'Bakery',
                'DESCRIPTION' => 'Bread, cakes, and pastries',
                'TAX_RATE' => 6.00,
                'PRICING_RULE' => 'Fixed Price',
            ],
            [
                'CATEGORY_NAME' => 'Beverages',
                'DESCRIPTION' => 'Juices, soda, water, coffee, and tea',
                'TAX_RATE' => 8.00,
                'PRICING_RULE' => 'Fixed Price',
            ],
            [
                'CATEGORY_NAME' => 'Snacks & Confectionery',
                'DESCRIPTION' => 'Chips, chocolates, candies, and nuts',
                'TAX_RATE' => 7.50,
                'PRICING_RULE' => 'Promotional Price',
            ],
            [
                'CATEGORY_NAME' => 'Frozen Foods',
                'DESCRIPTION' => 'Frozen vegetables, meat, and ready-to-eat meals',
                'TAX_RATE' => 6.50,
                'PRICING_RULE' => 'Fixed Price',
            ],
            [
                'CATEGORY_NAME' => 'Household Items',
                'DESCRIPTION' => 'Cleaning products, detergents, and paper goods',
                'TAX_RATE' => 10.00,
                'PRICING_RULE' => 'Fixed Price',
            ],
            [
                'CATEGORY_NAME' => 'Personal Care',
                'DESCRIPTION' => 'Shampoo, soap, toothpaste, and cosmetics',
                'TAX_RATE' => 8.50,
                'PRICING_RULE' => 'Discount Price',
            ],
        ]);
    }
}
