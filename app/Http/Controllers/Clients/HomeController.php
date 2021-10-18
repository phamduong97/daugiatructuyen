<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Blog;
use App\Models\Blog_types;
use App\Models\AuctionCategories;
use App\Models\Auctions;
use Illuminate\Support\Facades\Session;
use Mail;
use Auth;

class HomeController extends Controller
{
    public function home(){

        $auction_cates = AuctionCategories::all();
        $news = Blog::join('users','blog.id_user','users.id')->where('status',1)->orderBy('blog.created_at','desc')->skip(1)->take(4)->get();
        $last_news = Blog::join('users','blog.id_user','users.id')->where('status',1)->orderBy('blog.created_at','desc')->first();
        $assets = Auctions::where('status',1)->orderBy('created_at','desc')->get();

        return view('clients.home.index',compact('news','last_news','auction_cates','assets'));
    }

    public function contact(){

        return view('clients.contact.index');
    }

    public function saveContact(Request $req){

        Mail::send('mail.contact',[
            'name'=> $req->name,
            'content'=> $req->message
        ],function($mail) use ($req){

            $mail->to($req->email,$req->name);
            $mail->from('tandaiphatauction@gmail.com');
            $mail->subject('Test email');
        });

        return redirect()->back();

    }


    public function introduce(){

        return view('clients.introduce.index');
    }

    public function news(){

        $title = 'Tin tức';
        $total =  Blog::join('users','blog.id_user','users.id')->where('status',1)->count();
        $news = Blog::join('users','blog.id_user','users.id')->where('status',1)->orderBy('blog.created_at','desc')->paginate(12);
        return view('clients.news.index',compact('news','total','title'));
    }


    public function newsByCategory($slug){
        $data = Blog_types::where('slug','LIKE','%'.$slug.'%')->first();
        if($data){
            $title = $data->name;
            $total =  Blog::join('users','blog.id_user','users.id')->where([['status',1],['id_type',$data->id]])->count();
            $news = Blog::join('users','blog.id_user','users.id')->where([['status',1],['id_type',$data->id]])->orderBy('blog.created_at','desc')->paginate(12);
            return view('clients.news.index',compact('news','total','title'));

        }else{

            return view('errors.404');

        }

    }

    public function searchNews(Request $req){

        $keyword = $req->keyword;

        if(isset($keyword) && $keyword != ''){
            $title = 'Tìm kiếm bài viết';
            $total =  Blog::join('users','blog.id_type','users.id')->where([['status',1],['title','like','%'.$keyword.'%']])->orWhere([['status',1],['summary','like','%'.$keyword.'%']])->count();
            $news = Blog::join('users','blog.id_type','users.id')->where([['status',1],['title','like','%'.$keyword.'%']])->orWhere([['status',1],['summary','like','%'.$keyword.'%']])->orderBy('blog.created_at','desc')->paginate(12);
            return view('clients.news.index',compact('news','total','title'));

        }else{

            return view('errors.404');

        }

    }

   
    public function profile(){
        $data = Users::where('id_user',Auth::user()->id_user)->first();
        return view('clients.profile.index',compact('data'));
    }


    public function detailnews($slug){

        $data = Blog::join('users','blog.id_user','users.id')->where([['blog.slug',$slug],['blog.status',1]])->first();

        if($data){

            Blog::where([['blog.slug',$slug],['blog.status',1]])->update(['views' => $data->views  + 1]);
             
             return view('clients.news.detail',compact('data'));

        }else{
            return redirect()->back();
        }
    }
}
