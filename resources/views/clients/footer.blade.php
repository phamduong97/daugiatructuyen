<div style="clear: both;"></div>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="about-us">
          <img src="public/assets/images/logo.png" alt="">
          <p>CÔNG TY ĐẤU GIÁ HỢP DANH TÂN ĐẠI PHÁT</p>
          <ul>
            <li><i class="fa fa-map-marker"></i>428 Lĩnh Nam, Trần Phú, Hoàng Mai, Hà Nội, Việt Nam</li>
            <li><i class="fa fa-phone"></i>+84 917-634-7071</li>
            <li><i class="fa fa-envelope-o"></i>daugiatandaiphat@gmail.com</li>
          </ul>
        </div>
      </div>

      <div class="col-md-3">
        <div class="featured-links">
          <h4>Liên kết nhanh</h4>
          <ul>
            <li><a href="{{ Route('introduce') }}"><i class="fa fa-caret-right"></i>Giới thiệu</a>
            </li>
            <li><a href="#"><i class="fa fa-caret-right"></i>Điều khoản và dịch vụ</a></li>
            <li><a href="#"><i class="fa fa-caret-right"></i>Điều lệ tham gia đấu giá</a></li>
            <li><a href="#"><i class="fa fa-caret-right"></i>Chính sách bảo mật thông tin</a></li>
            <li><a href="#"><i class="fa fa-caret-right"></i>Tài liệu hướng dẫn sử dụng</a></li>
          </ul>
          <ul>
            <li><a href="#"><i class="fa fa-caret-right"></i>Quy chế hoạt động</a></li>
            <li><a href="#"><i class="fa fa-caret-right"></i>Văn bản pháp quy </a></li>
            <li><a href="#"><i class="fa fa-caret-right"></i>Liên hệ</a></li>

          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="latest-news">
          <h4>Tin mới nhất</h4>
         
         
          @foreach($user_data['hot_news'] as $new)
            <div class="latest-item">
              <img src="public/blog/images/{{ $new['images'] }}" alt="">
              <a href="{{ Route('detail-news',$new['slug']) }}">
                <h6>{{ $new['title'] }}</h6>
              </a>
              <ul>
                <li><i class="fa fa-clock-o"></i> {{ $new['created_at'] }}</li>
                <li><i class="fa fa-eye"></i> {{ $new['views'] }} Lượt xem</li>
              </ul>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-3">
        <div class="gallery">
          <h4>Bản đồ</h4>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3110.046708036383!2d105.87992413412242!3d20.980992110757395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ae98a319d201%3A0x4c50fc8894b40ee8!2zQ8OUTkcgVFkgVMOCTiDEkOG6oEkgUEjDgVQ!5e0!3m2!1svi!2s!4v1624426128782!5m2!1svi!2s"
            width="300" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>
</footer>

<div id="sub-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <p>@Copyrights 2021 <em>Tân Đại Phát</em>. Developed by HTNCORP</p>
      </div>
      <div class="col-md-6 col-sm-12">
        <ul>
          <li><a href="#">Trang chủ</a></li>
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Cuộc đấu giá</a></li>
          <li><a href="#">Tin tức</a></li>
          <li><a href="#">Liên hệ</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>
