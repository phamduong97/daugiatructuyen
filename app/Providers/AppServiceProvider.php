<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Models\Blog;
use App\Models\Blog_types;
use App\Models\Blog_settings;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){


                $categories = Blog_types::where('status',1)->get()->toArray();

                $settings = Blog_settings::all()->toArray();

                $hot_news = Blog::join('users','blog.id_user','users.id')->where('status',1)->orderBy('blog.created_at','desc')->take(4)->get()->toArray();

                if(count($settings) > 0){
                    $blogsettings = $settings;
                }else{
                     $blogsettings = [];
                }

                $data = ['categories'=>$categories,'settings'=>$blogsettings,'hot_news'=>$hot_news];
                $view->with('user_data',$data);

       


        });

        view()->composer(
            ['clients.master'],
            'App\Http\ViewComposers\MetaComposer'
        );

       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
