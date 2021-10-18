@extends('admin.master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách tài khoản hệ thống</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách tài khoản hệ thống</li>
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
            <div class="card">
              <a href="{{route('admin.create-users')}}" title="Tạo tài khoản" class="btn btn-success"><i class="fa fa-plus"></i> Tạo tài khoản</a>
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-list"></i>  Danh sách tài khoản (<span style="color: red;">{{$total}}</span>) </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 450px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm...">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th colspan="1" style="text-align: center;">STT</th>
                      <th colspan="1" style="text-align: center;">Mã tài khoản</th>
                      <th colspan="1" style="text-align: center;">Họ và Tên</th>
                      <th colspan="1" style="text-align: center;">Ngày Sinh</th>
                      <th colspan="1" style="text-align: center;">Email</th>
                      <th colspan="1" style="text-align: center;">Quyền</th>
                      <th colspan="1" style="text-align: center;">Trạng thái</th>
                      <th colspan="2" style="text-align: center;">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0; ?>
                    @foreach($data as $user)
                    <tr>
                      <td style="text-align: center;">{{$stt+=1}}</td>
                      <td style="text-align: center;">{{$user->id_user}}</td>
                      <td style="text-align: center;">{{$user->fullname}}</td>
                      <td style="text-align: center;">{{$user->birth}}</td>
                      <td style="text-align: center;">{{$user->email}}</td>
                      <td style="text-align: center;">
                        @if($user->role==4)
                          Quản trị hệ thống
                        @elseif($user->role==3)
                          Quản trị viên
                        @elseif ($user->role==2)
                           Đấu giá viên
                        @endif
                      </td>
                        
                       <td style="text-align: center;">
                        @if($user->stt == 1)
                        <label class="switch">
                          <input type="checkbox" value="{{$user->id}}" class="switch-label" checked>
                          <span class="slider round"></span>
                        </label>
                        @else
                        <label class="switch">
                          <input type="checkbox" value="{{$user->id}}" class="switch-label">
                          <span class="slider round"></span>
                        </label>
                        @endif
                      </td>
                      <td style="text-align: center;"><button type="button" class="btn btn-info"><i class="fa fa-edit"></i> Cập nhật</button></td>
                      <td style="text-align:center;"><a href="{{route('admin.delete-users',$user->idcode)}}" class="btn btn-danger"><i class="fas fa-times-circle"></i> Xóa</a></td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
       
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <style>
      .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
      }

      .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2196F3;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }


    </style>

@endsection