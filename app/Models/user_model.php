<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class user_model extends Model
{
        protected $table = 'user';
    protected $primaryKey = 'USER_ID';
    public $timestamps = false;

    protected $fillable = [
        'FIRST_NAME',
        'LAST_NAME',
        'USERNAME',
        'PASSWORD_HASH',
        'ROLE_ID',
        'ADDRESS',
        'CONTACT_NUMBER',
        'ADMIN_ID',
    ];

    public function Get_User_By_Username($USERNAME){
    $result = DB::select('SELECT * FROM user WHERE USERNAME = ?', [$USERNAME]);
    return count($result) ? $result[0] : null;
}
    
    public function Get_Roles(){
        return DB::select('SELECT ROLE_ID, ROLE_NAME FROM role');
    }

    public function Get_All_User_Entries(){
        return DB::select('SELECT * FROM user');
    }

    public function Set_New_User_Entry($FIRST_NAME, $LAST_NAME, $USERNAME, $PASSWORD_HASH, $ROLE_ID, $ADDRESS, $CONTACT_NUMBER, $ADMIN_ID = null){
    return DB::insert(
        'INSERT INTO user (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD_HASH, ROLE_ID, ADDRESS, CONTACT_NUMBER, ADMIN_ID) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
        [$FIRST_NAME, $LAST_NAME, $USERNAME, $PASSWORD_HASH, $ROLE_ID, $ADDRESS, $CONTACT_NUMBER, $ADMIN_ID]
    );
}


    public function Get_Specific_User_Entry($USER_ID){
        return DB::select('SELECT * FROM user WHERE USER_ID = ?', [$USER_ID]);
    }

    public function Set_Update_User_Entry($USER_ID, $FIRST_NAME, $LAST_NAME, $USERNAME, $PASSWORD_HASH, $ROLE_ID, $ADDRESS, $CONTACT_NUMBER, $ADMIN_ID = null){
    return DB::update(
        'UPDATE user 
        SET FIRST_NAME = ?, LAST_NAME = ?, USERNAME = ?, PASSWORD_HASH = ?, ROLE_ID = ?, ADDRESS = ?, CONTACT_NUMBER = ?, ADMIN_ID = ? 
        WHERE USER_ID = ?',
        [$FIRST_NAME, $LAST_NAME, $USERNAME, $PASSWORD_HASH, $ROLE_ID, $ADDRESS, $CONTACT_NUMBER, $ADMIN_ID, $USER_ID]
    );
}


    public function Set_Destroy_User_Entry($USER_ID){
        return DB::delete('DELETE FROM user WHERE USER_ID =? ', [$USER_ID]);
    }
}
