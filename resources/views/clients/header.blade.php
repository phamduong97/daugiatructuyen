  <div id="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-12">
          <div class="social-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              @if(Auth::check())
                 @if(Auth::user()->role != 1)
                  <li><a href="{{Route('user.create-auction')}}"><i class="fa fa-pencil"></i> Tạo phiên đấu giá</a></li>
                 @endif
                <li><a href="{{Route('user.list-all-auctions')}}"><i class="fa fa-list"></i> Danh sách phiên đấu giá</a></li>
                <li><a href="{{Route('user.auction-history')}}"><i class="fa fa-history"></i> Lịch sử đấu giá</a></li>

              @endif
            </ul>
          </div>
        </div>
        @if(Auth::check())
        <div class="col-md-7 col-sm-12">
          <div class="right-info">
            <ul>
              <li>
                <a href="{{Route('user.notification')}}">
                  <i class="fa fa-bell"></i> Thông báo (<em id="message-notification" style="color:red;">{{App\Models\AuctionNotify::where([['id_user',Auth::user()->id],['is_read',0]])->count()}}</em>)
                </a>
              </li>
              <li>Liên hệ: <em>570-694-4002</em></li>
              <li>
                <a href="{{Route('user.profile')}}"><i class="fa fa-user"></i> Xin chào : {{Session::get('username')}} </a>
              </li>
              <li><a href="{{Route('logout-account')}}"><i class="fa fa-power-off"></i> Đăng xuất </a></li>
            </ul>
          </div>
        </div>
        @else
        <div class="col-md-7 col-sm-12">
          <div class="right-info">
            <ul>
              <li>Liên hệ: <em>570-694-4002</em></li>
              <li><a href="#" data-toggle="modal" data-target="#myModal">Đăng ký / Đăng nhập →</a></li>
            </ul>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>

  <header class="site-header">
    <div id="main-header" class="main-header header-sticky">
      <div class="inner-header container clearfix">
        <div class="logo">
          <a href="{{Route('home')}}"><img src="public/assets/images/logo.png" alt=""></a>
        </div>
        <div class="header-right-toggle pull-right hidden-md hidden-lg">
          <a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="main-navigation text-left hidden-xs hidden-sm">
          <ul>
            <li><a href="{{Route('home')}}">Trang chủ</a></li>
            <li><a href="{{Route('introduce')}}">Giới thiệu</a></li>
            <li><a href="{{Route('all-auctions')}}" class="has-submenu">Cuộc đấu giá</a>
              <ul class="sub-menu">
                <li><a href="{{Route('auction-room-1')}}">Cuộc đấu giá sắp đấu giá</a></li>
                <li><a href="{{Route('auction-room-2')}}">Cuộc đấu giá đang diễn ra</a></li>
                <li><a href="{{Route('auction-room-3')}}">Cuộc đấu giá đã kết thúc</a></li>
              </ul>
            </li>
            <li><a href="{{Route('news')}}" class="has-submenu">Tin tức</a>
              @if(count($user_data['categories']) > 0)
              <ul class="sub-menu">
                @foreach($user_data['categories'] as $value)
                <li><a href="{{Route('newsByCategory',$value['slug'])}}">{{$value['name']}}</a></li>
                @endforeach
              </ul>
              @endif
            </li>
            <li><a href="{{Route('contact')}}">Liên hệ</a></li>
            <li>
              <p><a href="#" id="example-show" class="showLink" onclick="showHide('example');return false;"><i class="fa fa-search"></i></a></p>
              <div id="example" class="more">
                <form method="get" id="blog-search" class="blog-search">
                  <input type="text" class="blog-search-field" name="s" placeholder="Nhập từ khóa để tìm kiếm" value="">
                </form>
                <p><a href="#" id="example-hide" class="hideLink" onclick="showHide('example');return false;"><i class="
											fa fa-close"></i></a></p>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  @if(!Auth::check())
  <!-- Modal -->
  <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 200px;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home"><b>Đăng nhập</b></a></li>
          <li><a href="{{Route('signup')}}">Đăng ký</a></li>
        </ul>
        <div class="tab-content">
          @if(Session::has('flag'))
          <script type="text/javascript">
             alert('{{Session::get('message')}}');
          </script>
           @endif
          <form action="{{ route('login-account') }}" method="post" id="home" class="tab-pane fade in active">
            <div class="modal-body">
              <div class="contact-form">
                <div>
                   <div class="form-group" style="text-align: center;">
                    <img src="public/assets/images/logo.png" alt="">
                  </div>
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="usr">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="email" placeholder="Tên đăng nhập/email" required autocomplete="false" id="usr">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Mật khẩu:</label>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required autocomplete="false" id="pwd">
                  </div>
                   <div class="form-group">
                    <a href="#">Quên mật khẩu ?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer" style="display: flex;align-items: center;">
                 <button type="submit" class="btn btn-primary">ĐĂNG NHẬP </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif

  </div>
  </div>
