<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_comments extends Model
{
    protected $table = "blog_comments";

    protected $fillable = ['id_user', 'id_blog', 'content'];


}


