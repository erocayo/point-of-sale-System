<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user_SEEDER extends Seeder
{
    public function run()
    {

        // Insert Admin
        $adminId = DB::table('user')->insertGetId([
            'FIRST_NAME' => 'Admin',
            'LAST_NAME' => 'User',
            'USERNAME' => 'admin1',
            'PASSWORD_HASH' => Hash::make('123'),
            'ROLE_ID' => 1, // Admin role
            'ADDRESS' => 'Admin Address',
            'CONTACT_NUMBER' => '09123456789',
            'ADMIN_ID' => null, // Admin has no admin above

        ]);

        // Insert Cashier (linked to Admin)
        DB::table('user')->insert([
            'FIRST_NAME' => 'Cashier',
            'LAST_NAME' => 'User',
            'USERNAME' => 'cashier1',
            'PASSWORD_HASH' => Hash::make('123'),
            'ROLE_ID' => 2, // Cashier role
            'ADDRESS' => 'Cashier Address',
            'CONTACT_NUMBER' => '09129876543',
            'ADMIN_ID' => $adminId

        ]);

        // Insert Manager
        DB::table('user')->insert([
            'FIRST_NAME' => 'Manager',
            'LAST_NAME' => 'User',
            'USERNAME' => 'manager1',
            'PASSWORD_HASH' => Hash::make('123'),
            'ROLE_ID' => 3, // Manager role
            'ADDRESS' => 'Manager Address',
            'CONTACT_NUMBER' => '09122334455',
            'ADMIN_ID' => $adminId,

        ]);
    }
}
