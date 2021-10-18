<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_settings extends Model
{
   protected $table = 'blog_settings';

   protected $fillable = ['id_user','menu_color','body_color','footer_color','facebook','google','twitter','youtube','instagram'];
}
