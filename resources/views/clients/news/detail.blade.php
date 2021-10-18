@extends('clients.master')

@section('content')

<div id="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1> Chi tiết tin</h1>
        <div class="line"></div>
      </div>
    </div>
  </div>
</div>

<section class="single-blog">
  <div class="container">
    <div class="row">
      <div id="blog-post" class="col-md-8">
        <div class="blog-item">
          <img src="public/blog/images/{{$data->images}}" alt="" width="100%">
          <div class="down-content">
            <div class="post-info">
              <ul>
                <li><i class="fa fa-clock-o"></i> {{$data->created_at}}</li>
                <li>Đăng bởi <a href="#">{{$data->name}}</a></li>
              </ul>
              <div class="tittle">
                <a href="#">
                  <h2>{{$data->title}}</h2>
                </a>
              </div>
            </div>
            {!!$data->content!!} 
          </div>
        </div>
    
        <div class="comments">
          <h2>3 bình luận</h2>
          <div class="comment-item first-comment">
            <img src="public/assets/images/authorpng.png" alt="">
            <div class="Trả lời-button">
              <a href="#">Trả lời</a>
            </div>
            <h4>Pham Nam</h4>
            <span><i class="fa fa-clock-o"></i>2m</span>
            <p>Bài viết hay</p>
          </div>
          <div class="comment-item second-comment">
            <img src="public/assets/images/authorpng.png" alt="">
            <div class="Trả lời-button">
              <a href="#">Trả lời</a>
            </div>
            <h4>Lê Trung</h4>
            <span><i class="fa fa-clock-o"></i>44m</span>
            <p>Hay quá</p>
          </div>
          <div class="comment-item third-comment">
            <img src="public/assets/images/authorpng.png" alt="">
            <div class="Trả lời-button">
              <a href="#">Trả lời</a>
            </div>
            <h4>Hoài Ngân</h4>
            <span><i class="fa fa-clock-o"></i>2m</span>
            <p>Bài viết rất hay.</p>
          </div>
        </div>
        <div class="leave-comment">
          <h2>Viết bình luận</h2>
          <div class="row">
            <div class="col-md-6">
              <input type="text" class="name" name="s" placeholder="Tên" value="">
            </div>
            <div class="col-md-6">
              <input type="text" class="name" name="s" placeholder="Email" value="">
            </div>
            <div class="col-md-12">
              <input type="text" class="name" name="s" placeholder="Số điện thoại" value="">
            </div>
            <div class="col-md-12">
              <textarea id="message" class="message" name="message" placeholder="Bình luận"></textarea>
            </div>
            <div class="col-md-12">
              <div class="advanced-button">
                <a href="#">Gửi bình luận<i class="fa fa-paper-plane"></i></a>
              </div>
            </div>
          </div>
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
              @foreach($user_data['categories'] as $value)
              <li><a href="{{Route('newsByCategory',$value['slug'])}}">{{$value['name']}}</a></li>
              @endforeach
          </ul>
        </div>
        <div class="sidebar-widget latest-posts">
          <h4>Bài viết mới nhất</h4>
          @foreach($user_data['hot_news'] as $new)
          <div class="latest-item">
            <img src="public/blog/images/{{$new['images']}}" alt="" width="25%">
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

        <div class="sidebar-widget tags">
          <h4>Tags</h4>
          <ul>
            <li><a href="#">daugia</a></li>
            <li><a href="#">xehoi</a></li>
            <li><a href="#">tandaiphat</a></li>
            <li><a href="#">congnghe</a></li>

          </ul>
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