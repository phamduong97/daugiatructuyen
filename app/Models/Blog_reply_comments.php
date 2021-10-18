<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog_reply_comments extends Model
{
    protected $table = "blog_reply_comments";

    protected $fillable = ['id_user', 'id_comment', 'comment'];
    

   
}


