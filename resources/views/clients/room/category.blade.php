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
          <img src="public/assets/images/04-blog-770x390.jpg" alt="">
          <div class="down-content">
            <div class="post-info">
              <ul>
                <li>May 14, 2021</li>
                <li>Đăng bởi <a href="#">Admin</a></li>
              </ul>
              <div class="tittle">
                <a href="single-blog.html">
                  <h2>Thông báo việc đấu giá đối với danh mục tài sản: xe ô tô hiệu Toyota biển số 60M-005.47</h2>
                </a>
              </div>
            </div>
            <p>Ghi chú: <b>Thông báo công khai</b><br>
              Lần đăng: <b>Lần 1</b><br>
              Ngày đăng công khai: <b>10:21 23/06/2021</b>
            </p>
            <h4>Thông tin người có tài sản</h4>
            <p>Tên người có tài sản: <b>Ngân hàng TMCP Tiên Phong</b><br>
              Địa chỉ: <b>Tòa nhà TPBank, số 57 Lý Thường Kiệt, P.Trần Hưng Đạo, Q.Hoàn Kiếm, TP Hà Nội</b></p>

            <h4>Thông tin đơn vị tổ chức đấu giá</h4>
            <p>Tên đơn vị Tổ chức đấu giá: <b>Công ty đấu giá hợp danh Bảo Minh</b></p>
            <p>Địa chỉ: <b>số 9 ngách 57 ngõ 322 Lê Trọng Tấn, phường Khương Mai, Quận Thanh Xuân, Thành phố Hà Nội</b></p>
            <div class="searchbox">
              <div class="left">


                <p>Số điện thoại: <b>0915512295</b></p>
              </div>
              <!--end left-->
              <div class="left right">


                <p>Fax: <b></b></p>
              </div>
              <!--end left-->
              <div style="clear:both;"></div>
            </div>
            <!--end searchBox-->

            <h4>Thông tin việc đấu giá</h4>

            <p>Thời gian tổ chức cuộc đấu giá: <b>00:00 08/07/1921</b></p>

            <p>Địa điểm tổ chức cuộc đấu giá: <b>Số 9, ngách 57, ngõ 322, phố Lê Trọng Tấn, phường Khương Mai, quận Thanh Xuân, Hà Nội.</b></p>

            <br><br>

            <table border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <th style="text-align: center">STT</th>
                  <th style="text-align: center">Tên tài sản</th>
                  <th style="text-align: center">Số lượng</th>
                  <th style="text-align: center">Nơi có tài sản</th>
                  <th style="text-align: center">Giá khởi điểm</th>
                  <th style="text-align: center">Tiền đặt trước</th>
                  <th style="text-align: center">Ghi chú</th>
                </tr>

                <tr ng-repeat="item" in="" pagepropertyinfo.items="" track="" by="" $index="" class="ng-scope">
                  <td style="text-align:center" class="ng-binding">1</td>
                  <td class="ng-binding">01 chiếc xe ô tô con, BKS: 30F-192.26</td>
                  <td style="text-align:center" class="ng-binding">01</td>
                  <td class="ng-binding">Bãi xe Trường Sơn, chợ 365 phường Hà Cầu, quận Hà Đông, thành phố Hà Nội.</td>
                  <td style="text-align:center" class="ng-binding">681,000,000 VNĐ</td>
                  <td style="text-align:center" class="ng-binding">68,000,000 VNĐ</td>
                  <td class="ng-binding"></td>
                </tr><!-- end ngRepeat: item in pagePropertyInfo.items track by $index -->
              </tbody>
            </table>
            <br>

            <p>Thời gian bắt đầu đăng ký tham gia đấu giá: <b>00:00 26/06/2021</b> &nbsp;&nbsp;&nbsp;&nbsp; Thời gian kết thúc đăng ký tham gia đấu giá: <b>00:00 05/07/2021</b><br><br>

            </p>
            <p>Địa điểm, điều kiện, cách thức đăng ký:</p>
            <p><b>Khách hàng nộp hồ sơ tham gia đấu giá trực tiếp tại trụ sở Công ty Đấu giá hợp danh Bảo Minh. Địa chỉ: Số 9, ngách 57, ngõ 322, phố Lê Trọng Tấn, phường Khương Mai, quận Thanh Xuân, Hà Nội. Điều kiện tham gia đấu giá: Các tổ chức, cá nhân đã nộp tiền đặt trước, hồ sơ tham gia đấu giá đúng quy định và không thuộc các trường hợp không được đăng ký tham gia đấu giá theo quy định tại Khoản 4, Điều 38 Luật đấu giá tài sản 2016.</b></p><br>

            <p>Thời gian bắt đầu nộp tiền đặt trước: <b>00:00 05/07/2021</b> &nbsp;&nbsp;&nbsp;&nbsp; Thời gian kết thúc nộp tiền đặt trước: <b>00:00 05/07/2021</b><br><br>

            </p>
            <p>File đính kèm:</p>
            <div ng-repeat="file in item.listFile">
              <p><b><a href="javascript:;" onclick="downloadFile(`TB.pdf`,`/home/btpdgts/files_upload/20210623/CTR_1438231162192876976.dat`)" class="file-dowload">TB.pdf</a></b></p>
            </div>
            <br>

          </div>
        </div>
        <div class="author-writen">
          <img src="public/assets/images/authorpng.png" alt="">
          <div class="border-button">
            <a href="#">Chia sẻ bài viết</a>
          </div>
          <span>Tạo bởi</span>
          <h4>Hoai Nam</h4>
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
        <div class="search-box">
          <input type="text" class="name" name="s" placeholder="Nhập từ khóa tìm kiếm..." value="">
          <div class="simple-button">
            <a href="#">Tìm kiếm</a>
          </div>
          <i class="fa fa-search"></i>
        </div>
        <div class="sidebar-widget categories">
          <h4>Danh mục tin tức</h4>
          <ul>
            <li><a href="#">Tin khác</a></li>
            <li><a href="#">Thông báo đấu giá</a></li>
            <li><a href="#">Thông báo kết quả đấu giá</a></li>
          </ul>
        </div>
        <div class="sidebar-widget latest-posts">
          <h4>Bài viết mới nhất</h4>
          <div class="latest-item">
            <img src="public/assets/images/01-blog-50x50.jpg" alt="">
            <a href="{{Route('detail-news')}}">
              <h6>Thông báo việc đấu giá đối với danh mục tài sản: xe ô tô hiệu Toyota biển số 60M-005.47</h6>
            </a>
            <ul>
              <li>24 Sep,2021</li>
              <li>5 Bình luận</li>
            </ul>
          </div>
          <div class="latest-item">
            <img src="public/assets/images/02-blog-50x50.jpg" alt="">
            <a href="{{Route('detail-news')}}">
              <h6>Thông báo việc đấu giá đối với danh mục tài sản: xe ô tô hiệu Toyota biển số 60M-005.47</h6>
            </a>
            <ul>
              <li>21 Sep,2021</li>
              <li>5 Bình luận</li>
            </ul>
          </div>
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