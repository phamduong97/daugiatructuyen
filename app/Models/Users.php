<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";

    protected $fillable = [
        'id', 
        'fullname',
        'birth',
        'email',
        'phone',
        'password',
        'role',
        'id_user'
    ];
}


