@extends('clients.master')

@section('content')
<div style="clear: both;"></div>
<div class="slider">
  <div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
      <ul>
        <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
          <img src="public/assets/images/01-slide.jpg" data-fullwidthcentering="on" alt="slide">
          <div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="160" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Chào mừng đến với Tân Đại Phát</div>
          <div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="210" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Đấu giá trực tuyến</div>
          <div class="tp-caption third-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="280" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Bạn cần <em>bán</em>. Chúng tôi sẽ giúp bạn</div>
          <div class="tp-caption slider-thumb sfb tp-resizeme start container hidden-xs hidden-sm" data-x="center" data-hoffset="0" data-y="460" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">
            <div class="col-md-4">
              <a href="{{Route('view-detail-product',1)}}">
                <div class="thumb-item">
                  <div class="top-content">
                    <span>$55,000</span>
                    <div class="span-bg"></div>
                    <h2> Xe hơi 2015 bmw 328i</h2>
                  </div>
                  <div class="down-content">
                    <p>Đấu giá ô tô thanh lý đã qua sử dụng</p>
                    <img src="public/assets/images/01-featured-50x50.jpg" alt="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a href="{{Route('view-detail-product',1)}}">
                <div class="thumb-item">
                  <div class="top-content">
                    <span>$30,000</span>
                    <div class="span-bg"></div>
                    <h2> xe hơi santafe huyndai 2015 </h2>
                  </div>
                  <div class="down-content">
                    <p>Đấu giá ô tô thanh lý đã qua sử dụng</p>
                    <img src="public/assets/images/01-featured-50x50.jpg" alt="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a href="{{Route('view-detail-product',1)}}">
                <div class="thumb-item">
                  <div class="top-content">
                    <span>$45,000</span>
                    <div class="span-bg"></div>
                    <h2>Xe hơi CLS63 AMG 4MATIc</h2>
                  </div>
                  <div class="down-content">
                    <p>Đấu giá ô tô thanh lý đã qua sử dụng</p>
                    <img src="public/assets/images/01-featured-50x50.jpg" alt="">
                  </div>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
          <img src="public/assets/images/01-slide.jpg" data-fullwidthcentering="on" alt="slide">
          <div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="160" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Tân Đại Phát</div>
          <div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="210" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">UY TÍN, CHUYÊN NGHIỆP, HIỆU QUẢ</div>
          <div class="tp-caption third-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="280" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Hệ thống đấu giá <em>hiện đại</em>, bậc nhất hiện nay</div>
          <div class="tp-caption slider-thumb sfb tp-resizeme start container hidden-xs hidden-sm" data-x="center" data-hoffset="0" data-y="460" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">
            <div class="col-md-4">
              <a href="{{Route('view-detail-product',1)}}">
                <div class="thumb-item">
                  <div class="top-content">
                    <span>$55,000</span>
                    <div class="span-bg"></div>
                    <h2> Xe hơi 2015 bmw 328i</h2>
                  </div>
                  <div class="down-content">
                    <p>Đấu giá ô tô thanh lý đã qua sử dụng</p>
                    <img src="public/assets/images/01-featured-50x50.jpg" alt="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a href="{{Route('view-detail-product',1)}}">
                <div class="thumb-item">
                  <div class="top-content">
                    <span>$30,000</span>
                    <div class="span-bg"></div>
                    <h2> xe hơi santafe huyndai 2015 </h2>
                  </div>
                  <div class="down-content">
                    <p>Đấu giá ô tô thanh lý đã qua sử dụng</p>
                    <img src="public/assets/images/01-featured-50x50.jpg" alt="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a href="{{Route('view-detail-product',1)}}">
                <div class="thumb-item">
                  <div class="top-content">
                    <span>$45,000</span>
                    <div class="span-bg"></div>
                    <h2>Xe hơi CLS63 AMG 4MATIc</h2>
                  </div>
                  <div class="down-content">
                    <p>Đấu giá ô tô thanh lý đã qua sử dụng</p>
                    <img src="public/assets/images/01-featured-50x50.jpg" alt="">
                  </div>
                </div>
              </a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<section class="featured-listing">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="heading-section-2 text-center">
          <h2>Danh mục tài sản</h2>
          <div class="dec"><i class="fa fa-home"></i></div>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($categories = getAuctionCates() as $cate)
      <div class="col-lg-4 col-md-4 col-xs-6">
        <div class="featured-image">
          <img src="public/assets/images/{{$cate->img_cate}}" width="100%" height="300px" alt="">
          <div class="box-text">
            <div class="text-panel">
              <h2><b>{{$cate->name_cate}}</b></h2>
              <p>Tài sản ({{$cate->total}})</p>
              <br>
              <a href="{{Route('product-by-cate',$cate->slug)}}">Xem thêm</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


<section class="featured-listing">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="heading-section-2 text-center">
          <h2>Danh sách tài sản đấu giá</h2>
          <span>Tài sản sắp được đấu giá</span>
          <div class="dec"><i class="fa fa-gavel"></i></div>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div id="featured-cars">
        @foreach($assets as $v)
        <div class="featured-item col-md-15 col-sm-6">
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
</section>

<div id="cta-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- <p>Owners of salvage-title <em>vehicles</em> will encounter some unique issues.</p> -->
        <div class="advanced-button" style="float: left!important;">
          <a href="{{Route('all-products')}}">Xem tất cả<i class="fa fa-list-alt"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="why-us">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="left-content">
          <div class="heading-section">
            <h2>Tại sao bạn nên chọn Tân Đại Phát?</h2>
            <div class="line-dec"></div>
          </div>
          <div class="services">
            <div class="col-md-6">
              <div class="service-item">
                <i class="fa fa-bar-chart-o"></i>
                <div class="tittle">
                  <h2>Hệ thống đấu giá bảo mật</h2>
                </div>
                <!-- <p>Integer nec posuere metus, at feugiat. Sed sodales venenat malesuada.</p> -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="service-item">
                <i class="fa fa-gears"></i>
                <div class="tittle">
                  <h2>Công nghệ hiện đại</h2>
                </div>
                <!-- <p>Integer nec posuere metus, at feugiat. Sed sodales venenat malesuada.</p> -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="service-item second-row">
                <i class="fa fa-pencil"></i>
                <div class="tittle">
                  <h2>Nhiều khách hàng sử dụng và tin tưởng</h2>
                </div>
                <!-- <p>Integer nec posuere metus, at feugiat. Sed sodales venenat malesuada.</p> -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="service-item second-row last-service">
                <i class="fa fa-wrench"></i>
                <div class="tittle">
                  <h2>Truy cập nhanh</h2>
                </div>
                <!-- <p>Integer nec posuere metus, at feugiat. Sed sodales venenat malesuada.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="right-img">
          <img src="public/assets/images/daugia.jpg" alt="">
          <div class="img-bg"></div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="blog-news">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading-section-2 text-center">
          <h2>Tin tức mới nhất</h2>
          <span>Tin tức đấu giá</span>
          <div class="dec"><i class="fa fa-file"></i></div>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="left-video">
          <img src="public/blog/images/{{$last_news->images}}" alt="">
          <div class="video-content">
            <div class="inner-content">
              <i class="fa fa-play"></i>
              <div class="tittle">
                <a href="{{Route('detail-news',$last_news->slug)}}">
                  <h2>{{$last_news->title}}</h2>
                </a>
                <ul>
                  <li>{{$last_news->created_at}}</li>
                  <li>Đăng bởi <a href="#">{{$last_news->name}}</a></li>
                  <li>{{$last_news->views}} Lượt xem</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        @foreach($news as $v)
        <div class="blog-item">
          <div class="up-content">
            <ul>
              <li>{{$v->created_at}}</li>
              <li>{{$v->views}} Lượt xem</li>
            </ul>
            <div class="tittle">
              <a href="{{Route('detail-news',$v->slug)}}">
                <h2>{{$v->title}} </h2>
              </a>
            </div>
          </div>
          <p>{{$v->summary}} </p>
          <a href="{{Route('detail-news',$v->slug)}}">Xem chi tiết</a>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</section>

<section class="clients">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="owl-demo">
          <div class="item">
            <img src="public/assets/images/client-1.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-2.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-3.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-4.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-5.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-6.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-3.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-2.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-1.png" alt="">
          </div>
          <div class="item">
            <img src="public/assets/images/client-4.png" alt="">
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
<div style="clear: both;"></div>
@endsection
