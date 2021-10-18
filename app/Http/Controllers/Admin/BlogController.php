<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users;
use App\Models\Blog;
use App\Models\Blog_comments;
use App\Models\Blog_reply_comments;
use App\Models\Blog_types;
use App\Models\Blog_profile;
use App\Models\Blog_feedback;
use App\Models\Blog_settings;
use Hash;
use Session;
use Auth;
use Config;
use DB;
use Cookie;


class BlogController extends Controller
{

    public function __construct() {

    }


   public function Home(){


            $data = Blog::getAllReport(config('app.user_id'));

            return view('admin.home.index',compact('data'));


   }


   public function ListTypeBlog(){



            $data = Blog_types::paginate(10);

            $total = Blog_types::count();

            return view('admin.blog-type.index',compact('data','total'));


   }


   public function SaveTypeBlog(Request $req){

             $query = new Blog_types;
             $query->name = $req->name;
             $query->slug = str_slug($req->name);
             $query->status = 1;
             $query->save();

            return redirect()->back()->with('success-save',true);


   }



   public function UpdateTypeBlog(Request $req){

            $id = $req->id;

            $data = Blog_types::where('id',$req->id)
                                ->take(1)
                                ->get()
                                ->toArray();

            if(count($data)>0){

                if($req->type == 'status'){

                    $tt = $data[0]['status'];

                    if($tt == 1){

                          Blog_types::where('id',$req->id)->update(['status'=>0]);

                    }else{

                          Blog_types::where('id',$req->id)->update(['status'=>1]);

                    }

                }else if($req->type == 'data') {

                  Blog_types::where('id',$req->id)->update(['status'=>$req->status,'name'=>$req->name]);

                  return redirect()->back();


                }

            }else{

                return redirect()->back();
            }


   }



   public function DeleteTypeBlog(Request $req){

            $check = Blog_types::where('id',$req->id)->count();

            if($check >0 ){

                $query = Blog_types::where('id',$req->id)->delete();
            }

            return redirect()->back();

   }


   public function ListBlog(){

            $total = Blog::count();

            $listblog = Blog::paginate(8);

            return view('admin.blog.index',compact('listblog','total'));
   }



   public function CreateBlog(){

            $types = Blog_types::where('status',1)->get();

            return view('admin.blog.create',compact('types'));

   }


   public function SaveBlog(Request $req){


            $fileExtension = $req->file('images')->getClientOriginalExtension(); // Lấy tên của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('blog\images');

            // Bắt đầu chuyển file vào thư mục
            $req->file('images')->move($uploadPath, $fileName);

            if($req->highlight){
                $highlight = 1;
            }else{
                $highlight = 0;
            }

            if($req->status == 1){
                $status = 1;
            }else{
                $status = 0;
            }

            $data = new Blog();
            $data->title= $req->title;
            $data->slug= str_slug($req->title);
            $data->summary = $req->summary;
            $data->content = $req->content;
            $data->images = $fileName;
            $data->highlight = $highlight;
            $data->views = 0;
            $data->id_type = $req->id_type;
            $data->id_user = Auth::user()->id;
            $data->status = $status;
            $data->save();

            return redirect()->back()->with('success','Thêm mới thành công');


   }


    public function DeleteBlog(Request $req){


            $check = Blog::where('id',$req->id)->count();

            if($check >0 ){

                $query = Blog::where('id',$req->id)->delete();
            }

            return redirect()->back();

   }

   public function UpdateBlog(Request $req){


            $id = $req->id;

            $data = Blog::where([['id_user',config('app.user_id')],['id',$req->id]])
                                ->take(1)
                                ->get()
                                ->toArray();

            if(count($data)>0){

                if($req->type == 'status'){

                    $tt = $data[0]['status'];

                    if($tt == 1){

                          Blog::where('id',$req->id)->update(['status'=>0]);

                    }else{

                          Blog::where('id',$req->id)->update(['status'=>1]);

                    }

                }elseif($req->type == 'data'){

                    if($req->images != ''){

                        $fileExtension = $req->file('images')->getClientOriginalExtension();
                         // Lấy tên của file

                        // Filename cực shock để khỏi bị trùng
                        $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;

                        // Thư mục upload
                        $uploadPath = public_path('blog\images');

                        // Bắt đầu chuyển file vào thư mục
                        $req->file('images')->move($uploadPath, $fileName);
                    }else{

                        $fileName = $data[0]['images'];
                    }


                    if($req->highlight){
                        $highlight = 1;
                    }else{
                        $highlight = 0;
                    }

                    if($req->status == 1){
                        $status = 1;
                    }else{
                        $status = 0;
                    }

                    $data =  Blog::where('id',$req->id)
                             ->update([
                                'title'=>$req->title,
                                'summary' => $req->summary,
                                'content' => $req->content,
                                'images' => $fileName,
                                'highlight' => $highlight,
                                'id_type' => $req->id_type,
                                'id_user' => Session::user()->id,
                                'status' => $status
                              ]);

                    return redirect()->route('admin.list_blog');


                }

            }


   }



   public function DetailBlog($id){

            $check = Blog::where('id',$id)->count();

            if($check >0 ){

                $data= Blog::join('blog_types','blog.id_type','=','blog_types.id')->where('blog.id',$id)->first();

                return view('admin.blog.detail',compact('data'));

            }else{

                 return redirect()->back();

            }


   }



   public function UpdateNewBlog($id){

            $check = Blog::where('id',$id)->count();

            if($check >0 ){

                $data= Blog::where('id',$id)->first();

                $types = Blog_types::all();

                return view('admin.blog.update',compact('data','types'));

            }else{

                 return redirect()->back();

            }

   }



   public  function Contact()
   {

            $total = Blog_feedback::count();
            $contact = Blog_feedback::paginate(10);

            return view('admin.contact.index',compact('contact','total'));


   }


   public  function Settings()
   {

            $data = Blog_settings::first();

            return view('admin.settings.index',compact('data'));

   }



   public  function SaveSettings(Request $req)
   {
             $data = Blog_settings::where('id_user',config('app.user_id'))->first();

             if(!$data){

                $settings = Blog_settings::create($req->except(['_token']));

             }else{

                $settings = Blog_settings::where('id_user',config('app.user_id'))->update($req->except(['_token']));
             }
            return redirect()->back();

   }







}
