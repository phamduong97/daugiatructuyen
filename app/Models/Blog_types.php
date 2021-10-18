<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog_types extends Model
{
    protected $table = "blog_types";

    protected $fillable = ['user_id', 'name', 'status'];

    static function getAllTypes($user_id){

    	$list_data = [];

    	$data = DB::table('blog_types')->where([['status',1],['user_id',$user_id]])->get();

    	foreach ($data as  $value) {
    		
    		$query = DB::table('blog')->where([['id_type',$value->id],['status',1]])->count();

    		$arr = ['id'=>$value->id,'name'=>$value->name,'total'=>$query];

    		$list_data[] = $arr;
    	}

    	return $list_data;
    }



}


