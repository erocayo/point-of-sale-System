<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role_SEEDER extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            ['ROLE_NAME' => 'Admin', 'DESCRIPTION' => 'System administrator with full access.'],
            ['ROLE_NAME' => 'Cashier', 'DESCRIPTION' => 'Handles sales transactions.'],
            ['ROLE_NAME' => 'Manager', 'DESCRIPTION' => 'Oversees operations and reports.'],
        ]);
    }
}
