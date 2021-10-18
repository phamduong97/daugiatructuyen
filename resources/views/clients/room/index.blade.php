@extends('clients.master')

@section('content')

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>{{$metaTitle}}</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>

<section class="blog-grid">
    <div class="container">
        <div class="row">
            <div id="blog-posts">
                <div class="col-md-8">
                    @if(count($listAll) > 0)
                        @foreach($listAll as $data)
                        <div class="blog-item col-md-6">
                            <img src="public/upload/assets/{{$data->img_title}}" alt="" height="200" width="100%">
                            <div class="down-content">
                                <div class="post-info">
                                    <div class="tittle">
                                        <a href="{{Route('view-detail-product',$data->slug)}}">
                                            <h2>{{$data->asset_name}}</h2>
                                        </a>
                                    </div>
                                    <p><i class="fa fa-user"></i> Chủ tài sản: {{$data->owner}} </p>
                                    <p><i class="fa fa-gavel"></i> Giá khởi điểm: <strong style="color:red;">{{number_format($data->price_start)}}</strong> VNĐ</p>
                                    <p><i class="fa fa-clock-o"></i> Thời gian đấu giá: {{date('d/m/Y H:i', strtotime($data->start_time_bid))}} </p>
                                </div>
                                <p>{{$data->auction_name}}</p>
                                <a href="{{Route('view-detail-product',$data->slug)}}">Xem thêm</a>
                            </div>
                        </div>
                        @endforeach
                    @else 
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Không có dữ liệu !</strong>
                        </div>
                    @endif
                   
                </div>
                <div id="side-bar" class="col-md-4">
                    <div class="search-box">
                        <input type="text" class="name" name="s" placeholder="Nhập từ khóa tìm kiếm..." value="">
                        <div class="simple-button">
                            <a href="#">Tìm kiếm</a>
                        </div>
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="sidebar-widget categories">
                        <h4>Danh mục tài sản</h4>
                        <ul>
                            @foreach($categories = getAuctionCates() as $cate)
                            <li><a href="#">{{$cate->name_cate}} <b style="color: red;">({{$cate->total}})</b></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-widget latest-posts">
                        <h4>Tài sản mới</h4>
                        @foreach($new_auctions as $data)
                        <div class="latest-item" style="padding: 5px;">
                            <img src="public/upload/assets/{{$data->img_title}}" alt="" width="25%" height="80">
                            <a href="{{Route('view-detail-product',$data->slug)}}">
                                <h6>{{$data->asset_name}}</h6>
                            </a>
                            <p><i class="fa fa-gavel"></i> Giá khởi điểm: <strong style="color:red;">{{number_format($data->price_start)}}</strong> VNĐ</p>
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