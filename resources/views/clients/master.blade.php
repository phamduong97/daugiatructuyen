<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="description" content="Tân Đại Phát - Đấu giá trực tuyến">
  <meta name="author" content="Tân Đại Phát">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <base href="{{asset('')}}">
  <title> {{ $metaTitle ?? 'Tân Đại Phát - Đấu giá trực tuyến'}}</title>
  <link rel="icon" href="public/assets/images/favicon.ico">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="public/assets/css/bootstrap.css">
  <link rel="stylesheet" href="public/assets/css/animate.css">
  <link rel="stylesheet" href="public/assets/css/flexslider.css">
  <link rel="stylesheet" href="public/assets/css/jquery-ui.css">
  <link rel="stylesheet" href="public/assets/css/simple-line-icons.css">
  <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/assets/css/icon-font.css">
  <link rel="stylesheet" href="public/assets/css/auction.css">
  <link rel="stylesheet" href="public/assets/rs-plugin/css/settings.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body style="position: relative;">

  <div class="sidebar-menu-container" id="sidebar-menu-container">
    <div class="sidebar-menu-push">
      <div class="sidebar-menu-overlay"></div>
      <!-- <div class="sidebar-menu-inner"> -->
      @include('clients.header')
      <!-- Page Content -->
      @yield('content')
      <!-- End Page Content -->
      @include('clients.footer')
      <!-- </div> -->
    </div>

    <nav class="sidebar-menu slide-from-left">
      <div class="nano">
        <div class="content">
          <nav class="responsive-menu">
            <i class="fa fa-times close-bar"></i>
            <ul>
              <li><a href="{{Route('home')}}">Trang chủ</a></li>
              <li><a href="{{Route('introduce')}}">Giới thiệu</a></li>
              <li class="menu-item-has-children"><a href="{{Route('all-auctions')}}">Cuộc đấu giá</a>
                <ul class="sub-menu">
                  <li><a href="{{Route('auction-room-1')}}">Cuộc đấu giá sắp đấu giá</a></li>
                  <li><a href="{{Route('auction-room-2')}}">Cuộc đấu giá đang diễn ra</a></li>
                  <li><a href="{{Route('auction-room-3')}}">Cuộc đấu giá đã kết thúc</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children"><a href="{{Route('news')}}">Tin tức</a>
                <ul class="sub-menu">
                  <li><a href="{{Route('news')}}">Thông báo đấu giá</a></li>
                  <li><a href="{{Route('news')}}">Kết quả đấu giá</a></li>
                  <li><a href="{{Route('news')}}">Tin khác</a></li>
                </ul>
              </li>
              <li><a href="{{Route('contact')}}">Liên hệ</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </nav>
  </div>
  <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
  </div>

  <script type="text/javascript" src="public/assets/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="public/assets/js/bootstrap.min.js"></script>
  <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
  <script src="public/assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script src="public/assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  <script type="text/javascript" src="public/assets/js/plugins.js"></script>
  <script type="text/javascript" src="public/assets/js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- <audio controls autoplay style="display: none;">
    <source src="https://audio-previews.elements.envatousercontent.com/files/262081225/preview.mp3" type="audio/mpeg">
  </audio> -->

  <script>

    $(window).on("load", function() {
      $(".loader-wrapper").fadeOut(1000);
    });

  </script>
  
  @if(Auth::check())
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      //Pusher.logToConsole = true;

      var pusher = new Pusher('c3df2bc0f3da0a18b0f5', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        var data = JSON.parse(data.message); 
        var id_user = '{{Auth::user()->id_user}}';
        var total_current = parseInt($('#message-notification').text());
        console.log(data);

        if(id_user == data.id_user && total_current < data.message.length) {

           $('#message-notification').text(data.message.length);
           toastr.success('Bạn có ' + data.message.length + ' thông báo mới', 'Thông báo');

        }
     });
   </script>
 @endif
  

 <style>
 .nav-tabs>li.active>a,
 .nav-tabs>li.active>a:hover,
 .nav-tabs>li.active>a:focus {
  color: #555555;
  background-color: #dd6f6f;
  border: 1px solid #dddddd;
  border-bottom-color: transparent;
  cursor: default;
  cursor: pointer;
  color: #fff;
  transition: 0.3s;
}
</style>  

</body>
</html>