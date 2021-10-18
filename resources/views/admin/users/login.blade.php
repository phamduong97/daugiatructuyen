<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập | Quản trị hệ thống</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="public/assets/images/logo.png" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background: url('public/assets/images/bg.png')!important;background-size: 1550px 800px;">

<div class="panel-title" style="position: fixed;z-index: 99;background: rgba(255,255,255,0.8);top: 0;left: 0;right: 0;padding: 1em;">
  <h3 style="text-align: center;">
    <b style="color: #015ab4;">TÂN ĐẠI PHÁT</b>
    <br> <b>HỆ THỐNG QUẢN LÝ ĐẤU GIÁ</b>
  </h3>
</div>

<div class="login-box" style="width: 500px!important;padding: 1em 2em;margin-top: 8em;">
  <!-- /.login-logo -->
  <div class="card" >
    <div class="card-body login-card-body" style="box-shadow: 0px 3px 2px 5px #576aa5;padding: 2em;border-radius: 10px;">

      <div style="display: flex;align-items: center;justify-content: center;">
      	<a href="{{Route('home')}}" > <img src="public/assets/images/logo.png" style="width: 100%;height: auto;border-radius: 10px;margin-bottom: 20px;"></a> 
      </div>
       <h3 class="login-box-msg"><b>ĐĂNG NHẬP</b></h3>
      <form action="{{Route('getLogin')}}" method="post">
      	 {{ csrf_field() }}
        <div class="input-group mb-3">
          <input <?php if($errors->has('username')) echo 'style="border: 2px solid red;"';  ?> type="text" name="username" class="form-control" placeholder="Mã cán bộ hoặc email...">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('username'))
          	<span class="text-danger">{{ $errors->first('username') }}</span>
         @endif

        <div class="input-group mb-3">
          <input <?php if($errors->has('password')) echo 'style="border: 2px solid red;"';  ?> type="password" name="password" class="form-control" placeholder="Mật khẩu...">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         @if ($errors->has('password'))
          	<span class="text-danger">{{ $errors->first('password') }}</span>
         @endif

        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ghi nhớ tài khoản
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      @if(Session::has('flag'))
	      <!-- <div class="alert alert-{{Session::get('flag')}}" style="color:red;margin: 20px 0;text-align: center;">
	      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	         {{Session::get('message')}}
	      </div> -->
	      <script type="text/javascript">
	      	 alert('{{Session::get('message')}}');
	      </script>
      @endif

      <p class="mb-1" style="margin: 1em;">
        <a href="forgot-password.html">Tôi quên mật khẩu ?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>

</body>
</html>
