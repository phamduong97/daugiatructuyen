<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog_profile extends Model
{
    protected $table = "blog_profile";

    protected $fillable = ['id_user', 'title', 'slogan','images','content'];

    



}


