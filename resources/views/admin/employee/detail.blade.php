@extends('../master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-eye"></i> Chi tiết hồ sơ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Chi tiết hồ sơ</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <div class="timeline">
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-red"><i class="fa fa-user"></i> {{$data->giamdoc}}</span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
              <i class="fas fa-info-circle bg-blue"></i>
              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Thông tin</a></h3>

                <div class="timeline-body">
                  <div class="item-line"><b>Tên đơn vị: </b> {{$data->tendvi}}</div>
                  <div class="item-line"><b>Quận/Huyện: </b> {{$data->quanhuyen}}</div>
                  <div class="item-line"><b>Địa chỉ: </b> {{$data->diachi}}</div>
                  <div class="item-line"><b>Đơn vị chủ quản: </b> {{$data->congty}}</div>
                  <div class="item-line"><b>Số điện thoại: </b> {{$data->sdt}}</div>
                 <div class="item-line"><b>Email :</b> {{$data->email}}</div>
                  <div class="item-line"><b>Chương trình đăng ký: </b>{{$data->ctdk}}</div>
                  <div class="item-line"><b>Số quyết định: </b> {{$data->soqd}}</div>
                  <div class="item-line"><b>Ngày cấp giấy phép: </b> {{$data->thoigiancap}}</div>
                  <div class="item-line"><b>Thời hạn giấy phép: </b> {{$data->thoihan}}</div>
                  <div class="item-line"><b>Ghi chú: </b> {{$data->ghichu}}</div>
                 
                </div>
              </div>
            </div>
            <!-- timeline time label -->
           
            <!-- END timeline item -->
            <div>
              <i class="fas fa-clock bg-gray"></i>
            </div>
          </div>
           <a style="margin: 1em 0;" href="{{Route('admin.list-employee')}}" class="btn btn-primary"><i class="fas fa-redo"></i> Quay lại</a>
        </div>
        
        <!-- /.col -->
      </div>
      </div>
    </section>
    
    <style type="text/css">
        .item-line{
          padding: 10px;
        }
    </style>
  

@endsection