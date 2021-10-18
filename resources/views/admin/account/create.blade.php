@extends('admin.master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-user-plus"></i> Thêm mới tài khoản</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm mới tài khoản</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tạo tài khoản <i class="fa fa-users"></i></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('thanhcong'))
               <div class="alert alert-success" style="margin: 20px 20px;text-align: center;">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <strong style="">{{Session::get('thanhcong')}}</strong>
               </div>
              @endif
              <form role="form" action="{{route('admin.save-users')}}" method="post">
                 {{ csrf_field() }} 
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Họ và Tên (<span style="color: red;">*</span>)</label>
                    <input type="text" class="form-control" name="name"  placeholder="Nhập họ và tên" required="">
                  </div>
                  <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email (<span style="color: red;">*</span>)</label>
                    <input type="email" <?php if($errors->has('email')) echo 'style="border: 2px solid red;"';  ?> class="form-control" name="email" placeholder="Nhập email" required>
                    @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="">Ngày sinh (<span style="color: red;">*</span>)</label>
                    <input type="date" class="form-control" name="birth"  placeholder="Nhập ngày sinh" required="">
                  </div>
                  
            
                  <div class="form-group">
                    <label>Quyền hạn (<span style="color: red;">*</span>)</label>
                    <select class="custom-select" name="role" required="">
                      <option value="">--Chọn quyền--</option>
                      <option value="4">Quản trị hệ thống</option>
                      <option value="3">Quản trị viên</option>
                      <option value="2">Đấu giá viên</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu (<span style="color: red;">*</span>)</label>
                    <input <?php if($errors->has('password')) echo 'style="border: 2px solid red;"';  ?> type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required="">
                    @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tạo mới</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection