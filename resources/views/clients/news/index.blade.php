@extends('clients.master')

@section('content')

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>{{$title}}</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>

<section class="blog-grid">
    <div class="container">
        <div class="row">
            <h4 style=" padding: 0 0 10px 20px;"><b><i class="fa fa-search"></i> Hiển thị tất cả: <span style="color: red;">{{count($news)}}/{{$total}}</span>  bài viết</b></h4>
           
            <div id="blog-posts">
                <div class="col-md-8">
                    <div class="row">
                         @if(count($news) == 0)
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Không tìm thấy bài viết !</strong>
                        </div>
                        @endif
                        @foreach($news as $v)
                        <div class="blog-item col-md-6" style="height: 400px;">
                            <div class="ct-blog" style="border: 1px solid #eee;padding: 10px;height: 100%;overflow-y: scroll;margin-bottom: 10px;border-radius: 10px;box-shadow: 1px 2px 5px;">
                                <img src="public/blog/images/{{$v->images}}" alt="" height="40%" width="100%">
                                <div class="down-content">
                                    <div class="post-info">
                                        <ul>
                                            <li>{{$v->created_at}}</li>
                                            <li>Đăng bởi <a href="#">{{$v->name}}</a></li>
                                            <li>{{$v->views}} Lượt xem</li>
                                        </ul>
                                        <div class="tittle">
                                            <a href="{{Route('detail-news',$v->slug)}}">
                                                <h2>{{$v->title}}</h2>
                                            </a>
                                        </div>
                                    </div>
                                    <p>{{$v->summary}} </p>
                                    <a href="{{Route('detail-news',$v->slug)}}"><b>Xem thêm</b></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 text-center">
                            {!!$news->links()!!}
                    </div>
                </div>
                <div id="side-bar" class="col-md-4">
                    <form action="{{Route('search-news')}}" method="get" class="search-box">
                        <input type="text" class="name" name="keyword" placeholder="Nhập từ khóa tìm kiếm..." value="">
                        <div class="simple-button">
                            <a>Tìm kiếm</a>
                        </div>
                        <i class="fa fa-search"></i>
                    </form>
                    <div class="sidebar-widget categories">
                        <h4>Danh mục tin tức</h4>
                        <ul>
                           @foreach($user_data['categories'] as $cat)
                            <li><a href="{{Route('newsByCategory',$cat['slug'])}}">{{$cat['name']}}</a></li>
                           @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-widget latest-posts">
                        <h4>Bài viết mới nhất</h4>
                        @foreach($user_data['hot_news'] as $new)
                        <div class="latest-item">
                            <img src="public/blog/images/{{$new['images']}}" alt=""  width="25%">
                            <a href="{{Route('detail-news',$new['slug'])}}">
                                <h6>{{$new['title']}}</h6>
                            </a>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> {{$new['created_at']}}</li>
                                <li><i class="fa fa-eye"></i>  {{$new['views']}} Lượt xem</li>
                            </ul>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="cta-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="left-content">
                    <h2>Đăng ký để nhận thông tin đấu giá</h2>
                    <form method="get" id="subscribe" class="blog-search">
                        <input type="text" class="blog-search-field" name="s" placeholder="Địa chỉ E-mail" value="">
                        <div class="simple-button">
                            <a href="#">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="right-content">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection