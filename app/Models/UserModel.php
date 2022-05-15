<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{

    protected $table = 'users';

    protected $guarded = [
        'id',
        'roles',
        'email_verified_at',
        'deleted_at',
        'created_at',
        'updated_at',
    ]; //untuk kolom  yang tidak boleh diisi manual

    protected $hidden = [
        'password', 'created_at', 'deleted_at', 'updated_at'
    ];
    
}
