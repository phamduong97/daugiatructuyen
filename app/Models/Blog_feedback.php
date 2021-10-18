<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_feedback extends Model
{
    protected $table = 'blog_feedback';

    protected $fillable = ['name', 'email', 'phone','id_user','message'];
}
