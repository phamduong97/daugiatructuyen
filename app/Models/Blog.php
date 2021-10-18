<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog extends Model
{
    protected $table = "blog";
    
    static function updateView($id){

    	$view = DB::table('blog')->where('id', $id)->value('views');

    	DB::table('blog')->where('id', $id)->update(['views'=>$view + 1]);

    }

     static function getAllComments($id){

     	$list_comments = [];

    	$comments = DB::table('blog_comments')
			    	->select('blog_comments.id as id_comment','blog_comments.content','blog_comments.created_at as date','users.user_id as user_id','users.user_firstname','users.user_lastname','users.user_picture')
			    	->join('users','users.user_id','=','blog_comments.id_user')
			    	->where('blog_comments.id_blog', $id)
			    	->orderBy('created_at','desc')
			    	->get()
			    	->toArray();	


    	foreach ($comments as $value) {

    		$rep_comments = DB::table('blog_reply_comments')
				    		  ->select('blog_reply_comments.id_comment as id_comment','blog_reply_comments.comment','blog_reply_comments.created_at as date','users.user_id as user_id','users.user_firstname','users.user_lastname','users.user_picture')
				    		   ->join('users','users.user_id','=','blog_reply_comments.id_user')
				    		   ->where('blog_reply_comments.id_comment', $value->id_comment)
				    		   ->orderBy('created_at','desc')
				    		   ->get()
				    		   ->toArray();

    		$arr = [

                'id'=>$value->id_comment,
                'comment'=>$value->content,
                'date'=>$value->date,
                'user_name'=>$value->user_firstname.' '.$value->user_lastname,
                'avatar'=>$value->user_picture,
                'reply'=>$rep_comments

    		];

    		$list_comments[] = $arr;
    	}
    	
    	return $list_comments;


    }


    static function getAllReport($user_id){

        $blog = DB::table('blog')->where('id_user',$user_id)->count();
        $category = DB::table('blog_types')->where('user_id',$user_id)->count();
        $comment = DB::table('blog_comments')->where('id_user',$user_id)->count();
        $feedback = DB::table('blog_feedback')->where('id_user',$user_id)->count();

        return $data  = array('blog' =>$blog ,'category'=>$category,'comment'=>$comment,'feedback'=>$feedback );

    }

   
}


