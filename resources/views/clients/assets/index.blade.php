@extends('clients.master')

@section('content')
<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Danh sách tài sản</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>
<section class="listing-grid">
    <div class="container">
        <div class="row">
            <div id="listing-cars" class="col-md-9">
                <div class="pre-featured clearfix">
                    <div class="info-text">
                        <h4><i class="fa fa-list-alt"></i> Tất cả ( <b style="color: red;">{{$total}}</b>)</h4>
                    </div>
                    <div class="right-content">
                        <div class="input-select">
                            <select name="mark" id="mark">
                                <option value="-1">Lọc</option>
                                <option>Giá</option>
                                <option>Ngày đăng</option>
                            </select>
                        </div>
                        <div class="grid-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-list"></i></a></li>
                                <li><a href="#"><i class="fa fa-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="featured-cars">
                    <div class="row">
                        <div id="featured-cars">
                            @foreach($data as $v)
                            <div class="featured-item col-md-4">
                                <img src="public/upload/assets/{{$v->img_title}}" alt="" height="240" width="100%">
                                <div class="down-content">
                                  <a href="{{Route('view-detail-product',$v->slug)}}">
                                    <h2 style="height:80px;width:100%;overflow: hidden;text-overflow: ellipsis;">{{$v->asset_name}}</h2>
                                  </a>
                                  <div class="light-line"></div>
                                  <p><i class="fa fa-gavel"></i> Giá khởi điểm : <b style="color:red;">{{number_format($v->price_start)}} vnđ</b></p>
                                  <p><i class="fa fa-clock-o"></i> Thời gian: <b style="color: red;">{{date('d/m/Y H:i', strtotime($v->start_time_bid))}}</b></p>
                                  <div class="car-info">
                                    <ul>
                                      <li><a href="#"><i class="fa fa-eye"></i>Xem chi tiết</a></li>
                                      <li><a href="#" class="concern"><i class="fa fa-star"></i>Quan tâm</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="pagination">
                    {{$data->links()}}
                </div>
            </div>
            <div id="sidebar" class="col-md-3">
                <div class="sidebar-content">
                    <div class="head-side-bar">
                        <h4>Lọc kết quả tìm kiếm</h4>
                    </div>
                    <div class="search-form">
                        <div class="select">
                            <select name="mark" id="types">
                                <option value="-1">Lọc theo</option>
                                <option>Giá</option>
                                <option>Ngày đăng</option>
                            </select>
                        </div>

                        <div class="slider-range">
                            <p>
                                <input type="text" class="range" id="amount" readonly>
                            </p>
                            <div id="slider-range"></div>
                        </div>
                        
                      
                        <div class="advanced-button">
                            <a href="#">Tìm kiếm<i class="fa fa-search"></i></a>
                        </div>
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