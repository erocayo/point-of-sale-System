<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\user_model;
use Illuminate\Support\Facades\Hash;

class Auth_Controller extends Controller
{
    public function Show_LogIn(){
        return view('/pos/login');
    }

public function login(Request $request)
{
    $validated = $request->validate([
        'USERNAME' => 'required|string',
        'PASSWORD' => 'required|string',
    ]);

    $model = new user_model();
    $user = $model->Get_User_By_Username($validated['USERNAME']);

if ($user && Hash::check($validated['PASSWORD'], $user->PASSWORD_HASH)) {
    // store minimal session info for authentication
    $request->session()->put('USER_ID', $user->USER_ID);
    $request->session()->put('USERNAME', $user->USERNAME);
    $request->session()->put('ROLE_ID', $user->ROLE_ID);

    // store a one-time flash message
    $roleNames = [
        1 => 'Admin',
        2 => 'Cashier',
        3 => 'Manager',
    ];
    
    $request->session()->flash('greeting', "Hi {$roleNames[$user->ROLE_ID]} {$user->USERNAME}");

    // redirect based on role
    switch ($user->ROLE_ID) {
        case 1: return redirect('/pos/admin/dashboard');        // Admin
        case 2: return redirect('/pos/cashier/dashboard'); // Cashier
        case 3: return redirect('/pos/manager/dashboard');    // Manager
        default: return redirect('/');               // fallback
    }
}

    throw ValidationException::withMessages([
        'credentials' => 'Incorrect login credentials'
    ]);
}


public function logout(Request $request)
{
    $request->session()->flush(); // clears all session data
    return redirect('/pos/login');
}
}
