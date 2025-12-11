<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_model;
use Illuminate\Support\Facades\Hash;

class user_controller extends Controller
{
    public function index(){
        $model = new user_model();
        $dbresults = $model->Get_All_User_Entries();
        $data = ['userlist' => $dbresults];
        return view('pos/user/index', $data);
    }

    public function add(){
        $model = new user_model();
        $roles = $model->Get_Roles();

        return view('pos/user/add', [
            'roles' => $roles
        ]);
    }

    public function create(Request $request)
{

    $ADMIN_ID = session('USER_ID');
    $FIRST_NAME = $request->input('FIRST_NAME');
    $LAST_NAME = $request->input('LAST_NAME');
    $USERNAME = $request->input('USERNAME');
    $PASSWORD = $request->input('password');
    $PASSWORD_HASH = Hash::make($PASSWORD);
    $ROLE_ID = $request->input('ROLE_ID');
    $ADDRESS = $request->input('ADDRESS');
    $CONTACT_NUMBER = $request->input('CONTACT_NUMBER');

   $rules = [
    'FIRST_NAME' => 'required|string|max:100',
    'LAST_NAME' => 'required|string|max:100',
    'USERNAME' => 'required|string|max:255',
    'PASSWORD' => 'required|string|max:255',
    'ROLE_ID' => 'required|integer',
    'ADDRESS' => 'nullable|string|max:255',
    'CONTACT_NUMBER' => 'nullable|string|max:20',
];

$request->validate($rules);

    $model = new user_model();
    $model->Set_New_User_Entry($FIRST_NAME, $LAST_NAME, $USERNAME, $PASSWORD_HASH, $ROLE_ID, $ADDRESS, $CONTACT_NUMBER, $ADMIN_ID);

    return redirect('/pos/user');
}

    public function edit($USER_ID){
        
        $model = new user_model();
        $roles = $model->Get_Roles();
        $dbresults  = $model -> Get_Specific_User_Entry($USER_ID);
        $data = [
            'userlist' => $dbresults,
            'roles' => $roles,

        ];
        return view('pos/user/edit', $data);
    }

    public function update($USER_ID, Request $request)
{
    $model = new user_model();

    $FIRST_NAME = $request->input('FIRST_NAME');
    $LAST_NAME = $request->input('LAST_NAME');
    $USERNAME = $request->input('USERNAME');
    $PASSWORD = $request->input('PASSWORD');
    $ROLE_ID = $request->input('ROLE_ID');
    $ADDRESS = $request->input('ADDRESS');
    $CONTACT_NUMBER = $request->input('CONTACT_NUMBER');
    $ADMIN_ID = session('USER_ID');


    $existingUser = $model->where('USER_ID', $USER_ID)->first();

    // If password field is filled, hash new password
    if (!empty($PASSWORD)) {
        $PASSWORD_HASH = Hash::make($PASSWORD);
    } else {
        // Keep the existing password hash
        $PASSWORD_HASH = $existingUser->PASSWORD_HASH;
    }

    $model->where('USER_ID', $USER_ID)->update([
        'FIRST_NAME' => $FIRST_NAME,
        'LAST_NAME' => $LAST_NAME,
        'USERNAME' => $USERNAME,
        'PASSWORD_HASH' => $PASSWORD_HASH,
        'ROLE_ID' => $ROLE_ID,
        'ADDRESS' => $ADDRESS,
        'CONTACT_NUMBER' => $CONTACT_NUMBER,
        'ADMIN_ID' => $ADMIN_ID,
    ]);

    return redirect('/pos/user');
}


    public function delete($USER_ID){
        $model = new user_model();
        $dbresults = $model->Get_Specific_User_Entry($USER_ID);
        $data = [
            'userlist' => $dbresults
        ];
        return view('pos/user/delete', $data);
    }

    public function destroy($USER_ID){
        $model = new user_model();
        $model->Set_Destroy_User_Entry($USER_ID);
        return redirect('/pos/user');
        }
}
