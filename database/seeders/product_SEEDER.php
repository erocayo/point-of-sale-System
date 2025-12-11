<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_SEEDER extends Seeder
{
    public function run()
    {
        // Fresh Produce
        DB::table('product')->insert([
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Bananas', 'DESCRIPTION' => 'Fresh yellow bananas', 'PRICE' => '30.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Apples', 'DESCRIPTION' => 'Red and juicy apples', 'PRICE' => '40.00', 'STOCK_LEVEL' => 60],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Oranges', 'DESCRIPTION' => 'Fresh oranges', 'PRICE' => '35.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Tomatoes', 'DESCRIPTION' => 'Ripe tomatoes', 'PRICE' => '25.00', 'STOCK_LEVEL' => 70],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Carrots', 'DESCRIPTION' => 'Fresh carrots', 'PRICE' => '20.00', 'STOCK_LEVEL' => 60],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Cucumbers', 'DESCRIPTION' => 'Fresh cucumbers', 'PRICE' => '22.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Lettuce', 'DESCRIPTION' => 'Green lettuce', 'PRICE' => '28.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Spinach', 'DESCRIPTION' => 'Fresh spinach leaves', 'PRICE' => '25.00', 'STOCK_LEVEL' => 45],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Grapes', 'DESCRIPTION' => 'Seedless grapes', 'PRICE' => '50.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 1, 'PRODUCT_NAME' => 'Pineapple', 'DESCRIPTION' => 'Fresh pineapple', 'PRICE' => '60.00', 'STOCK_LEVEL' => 20],
        ]);

        // Dairy Products
        DB::table('product')->insert([
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Whole Milk', 'DESCRIPTION' => '1-liter whole milk', 'PRICE' => '55.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Cheddar Cheese', 'DESCRIPTION' => '200g cheddar cheese', 'PRICE' => '120.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Yogurt', 'DESCRIPTION' => 'Plain yogurt 500g', 'PRICE' => '65.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Butter', 'DESCRIPTION' => 'Salted butter 250g', 'PRICE' => '80.00', 'STOCK_LEVEL' => 25],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Skim Milk', 'DESCRIPTION' => '1-liter skimmed milk', 'PRICE' => '50.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Cream Cheese', 'DESCRIPTION' => 'Spreadable cream cheese', 'PRICE' => '95.00', 'STOCK_LEVEL' => 20],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Mozzarella', 'DESCRIPTION' => 'Fresh mozzarella 200g', 'PRICE' => '110.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Sour Cream', 'DESCRIPTION' => '200g sour cream', 'PRICE' => '60.00', 'STOCK_LEVEL' => 25],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Evaporated Milk', 'DESCRIPTION' => '400ml can', 'PRICE' => '45.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 2, 'PRODUCT_NAME' => 'Condensed Milk', 'DESCRIPTION' => '400ml can', 'PRICE' => '55.00', 'STOCK_LEVEL' => 35],
        ]);

        // Bakery
        DB::table('product')->insert([
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'White Bread', 'DESCRIPTION' => 'Loaf of white bread', 'PRICE' => '40.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Whole Wheat Bread', 'DESCRIPTION' => 'Loaf of whole wheat bread', 'PRICE' => '45.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Baguette', 'DESCRIPTION' => 'French baguette', 'PRICE' => '35.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Croissant', 'DESCRIPTION' => 'Butter croissant', 'PRICE' => '50.00', 'STOCK_LEVEL' => 25],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Muffins', 'DESCRIPTION' => 'Blueberry muffins', 'PRICE' => '55.00', 'STOCK_LEVEL' => 20],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Cakes', 'DESCRIPTION' => 'Chocolate cake slice', 'PRICE' => '80.00', 'STOCK_LEVEL' => 15],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Donuts', 'DESCRIPTION' => 'Glazed donuts', 'PRICE' => '35.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Bagels', 'DESCRIPTION' => 'Plain bagels', 'PRICE' => '45.00', 'STOCK_LEVEL' => 25],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Bread Rolls', 'DESCRIPTION' => 'Soft dinner rolls', 'PRICE' => '30.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 3, 'PRODUCT_NAME' => 'Pita Bread', 'DESCRIPTION' => 'Middle Eastern flatbread', 'PRICE' => '35.00', 'STOCK_LEVEL' => 35],
        ]);

        // Beverages
        DB::table('product')->insert([
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Orange Juice', 'DESCRIPTION' => '1-liter orange juice', 'PRICE' => '70.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Apple Juice', 'DESCRIPTION' => '1-liter apple juice', 'PRICE' => '70.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Cola', 'DESCRIPTION' => '330ml soda can', 'PRICE' => '35.00', 'STOCK_LEVEL' => 60],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Mineral Water', 'DESCRIPTION' => '500ml bottled water', 'PRICE' => '20.00', 'STOCK_LEVEL' => 100],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Coffee', 'DESCRIPTION' => 'Ground coffee 250g', 'PRICE' => '120.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Tea Bags', 'DESCRIPTION' => '50-count tea bags', 'PRICE' => '60.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Energy Drink', 'DESCRIPTION' => '250ml energy drink', 'PRICE' => '55.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Iced Tea', 'DESCRIPTION' => '500ml bottle', 'PRICE' => '40.00', 'STOCK_LEVEL' => 60],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Lemonade', 'DESCRIPTION' => '1-liter lemonade', 'PRICE' => '50.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 4, 'PRODUCT_NAME' => 'Sparkling Water', 'DESCRIPTION' => '500ml sparkling water', 'PRICE' => '30.00', 'STOCK_LEVEL' => 50],
        ]);

        // Snacks & Confectionery
        DB::table('product')->insert([
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Potato Chips', 'DESCRIPTION' => 'Salted potato chips 100g', 'PRICE' => '35.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Chocolate Bar', 'DESCRIPTION' => 'Milk chocolate 50g', 'PRICE' => '25.00', 'STOCK_LEVEL' => 60],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Gummy Bears', 'DESCRIPTION' => 'Fruit gummy candy 100g', 'PRICE' => '30.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Nuts Mix', 'DESCRIPTION' => 'Roasted nuts 200g', 'PRICE' => '80.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Cookies', 'DESCRIPTION' => 'Chocolate chip cookies 200g', 'PRICE' => '55.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Candy', 'DESCRIPTION' => 'Assorted hard candy 100g', 'PRICE' => '20.00', 'STOCK_LEVEL' => 70],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Popcorn', 'DESCRIPTION' => 'Butter popcorn 150g', 'PRICE' => '40.00', 'STOCK_LEVEL' => 60],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Chocolate Truffles', 'DESCRIPTION' => 'Box of 6 truffles', 'PRICE' => '150.00', 'STOCK_LEVEL' => 25],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Energy Bar', 'DESCRIPTION' => 'Protein energy bar', 'PRICE' => '45.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 5, 'PRODUCT_NAME' => 'Crackers', 'DESCRIPTION' => 'Savory crackers 200g', 'PRICE' => '30.00', 'STOCK_LEVEL' => 50],
        ]);

        // Frozen Foods
        DB::table('product')->insert([
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Peas', 'DESCRIPTION' => '500g frozen peas', 'PRICE' => '60.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Corn', 'DESCRIPTION' => '500g frozen corn', 'PRICE' => '55.00', 'STOCK_LEVEL' => 35],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Pizza', 'DESCRIPTION' => 'Pepperoni pizza 400g', 'PRICE' => '150.00', 'STOCK_LEVEL' => 20],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Chicken', 'DESCRIPTION' => '1kg frozen chicken pieces', 'PRICE' => '200.00', 'STOCK_LEVEL' => 25],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Fish Fillet', 'DESCRIPTION' => '500g fish fillet', 'PRICE' => '180.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Vegetables Mix', 'DESCRIPTION' => '500g mixed vegetables', 'PRICE' => '65.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Dumplings', 'DESCRIPTION' => '300g vegetable dumplings', 'PRICE' => '90.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Ice Cream', 'DESCRIPTION' => 'Vanilla ice cream 500ml', 'PRICE' => '120.00', 'STOCK_LEVEL' => 25],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Shrimp', 'DESCRIPTION' => '500g frozen shrimp', 'PRICE' => '220.00', 'STOCK_LEVEL' => 20],
            ['PRODUCT_CATEGORY_ID' => 6, 'PRODUCT_NAME' => 'Frozen Beef', 'DESCRIPTION' => '1kg frozen beef cubes', 'PRICE' => '250.00', 'STOCK_LEVEL' => 15],
        ]);

        // Household Items
        DB::table('product')->insert([
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Dishwashing Liquid', 'DESCRIPTION' => '500ml liquid detergent', 'PRICE' => '50.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Laundry Detergent', 'DESCRIPTION' => '1kg powder detergent', 'PRICE' => '120.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Paper Towels', 'DESCRIPTION' => 'Pack of 2 rolls', 'PRICE' => '60.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Toilet Paper', 'DESCRIPTION' => 'Pack of 4 rolls', 'PRICE' => '80.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Cleaning Spray', 'DESCRIPTION' => 'All-purpose cleaner 500ml', 'PRICE' => '70.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Garbage Bags', 'DESCRIPTION' => 'Pack of 20', 'PRICE' => '55.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Dish Cloths', 'DESCRIPTION' => 'Set of 3 cloths', 'PRICE' => '30.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Sponges', 'DESCRIPTION' => 'Pack of 5 sponges', 'PRICE' => '40.00', 'STOCK_LEVEL' => 60],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Broom', 'DESCRIPTION' => 'Household broom', 'PRICE' => '90.00', 'STOCK_LEVEL' => 20],
            ['PRODUCT_CATEGORY_ID' => 7, 'PRODUCT_NAME' => 'Mop', 'DESCRIPTION' => 'Floor mop', 'PRICE' => '100.00', 'STOCK_LEVEL' => 25],
        ]);

        // Personal Care
        DB::table('product')->insert([
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Shampoo', 'DESCRIPTION' => '250ml hair shampoo', 'PRICE' => '85.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Soap', 'DESCRIPTION' => 'Bar soap 100g', 'PRICE' => '25.00', 'STOCK_LEVEL' => 60],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Toothpaste', 'DESCRIPTION' => '100g toothpaste tube', 'PRICE' => '40.00', 'STOCK_LEVEL' => 50],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Toothbrush', 'DESCRIPTION' => 'Soft bristle toothbrush', 'PRICE' => '35.00', 'STOCK_LEVEL' => 70],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Body Lotion', 'DESCRIPTION' => '200ml moisturizing lotion', 'PRICE' => '120.00', 'STOCK_LEVEL' => 30],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Deodorant', 'DESCRIPTION' => '150ml spray deodorant', 'PRICE' => '95.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Face Wash', 'DESCRIPTION' => '150ml facial cleanser', 'PRICE' => '110.00', 'STOCK_LEVEL' => 35],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Hand Cream', 'DESCRIPTION' => '50ml hand cream', 'PRICE' => '60.00', 'STOCK_LEVEL' => 25],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Conditioner', 'DESCRIPTION' => '250ml hair conditioner', 'PRICE' => '90.00', 'STOCK_LEVEL' => 40],
            ['PRODUCT_CATEGORY_ID' => 8, 'PRODUCT_NAME' => 'Hair Oil', 'DESCRIPTION' => '100ml nourishing hair oil', 'PRICE' => '80.00', 'STOCK_LEVEL' => 30],
        ]);
    }
}