@extends('../master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-user-plus"></i> Thêm mới đơn vị</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Thêm mới đơn vị</li>
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
            <h3 class="card-title">Thêm đơn vị <i class="fa fa-users"></i></h3>
          </div>
          <br>
          <div class="btn-group">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="far fa-file-excel"></i> Tải lên danh sách file excel</button>
            &nbsp;
            <button class="btn btn-warning add-content"><i class="fa fa-plus"></i> Nhập dữ liệu</button>
          </div>

          <!-- /.card-header -->
          <!-- form start -->
          @if(Session::has('thanhcong'))
          <div class="alert alert-success" style="margin: 20px 20px;text-align: center;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong style="">{{Session::get('thanhcong')}}</strong>
          </div>
          @endif
          <form role="form" style="padding: 5px;background-color: #eee;" class="form-content" action="{{route('admin.save-employee')}}" method="post" style="display: none;">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group">
                <label for="">Họ và tên giám đốc (<span style="color: red;">*</span>)</label>
                <input type="text" class="form-control" name="hoten" placeholder="Nhập họ và tên giám đốc" required="">
              </div>

              <div class="form-group">
                <label>Đơn vị trung tâm (<span style="color: red;">*</span>)</label>
                <select class="form-control" name="iddonvi" required>
                  <option value="">--Chọn đơn vị trung tâm--</option>
                  @foreach($data as $donvi)
                  <option value="{{$donvi->iddonvi}}">{{$donvi->tendonvi}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="">Tên đơn vị (<span style="color: red;">*</span>)</label>
                <input type="text" class="form-control" name="tendonvi" placeholder="Nhập tên đơn vị" required="">
              </div>

              <div class="form-group">
                <label for="">Quận/Huyện (<span style="color: red;">*</span>)</label>
                <input type="text" class="form-control" name="quanhuyen" placeholder="Nhập quận/huyện" required="">
              </div>

              <div class="form-group">
                <label for="">Đơn vị chủ quản/Công ty (<span style="color: red;">*</span>)</label>
                <input type="text" class="form-control" name="donvichuquan" placeholder="Nhập tên đơn vị chủ quản" required="">
              </div>

              <div class="form-group">
                <label for="">Địa chỉ (<span style="color: red;">*</span>)</label>
                <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ" required="">
              </div>

              <div class="form-group">
                <label for="">Điện thoại (<span style="color: red;">*</span>)</label>
                <input type="tel" class="form-control" name="sdt" placeholder="Nhập số điện thoại" required="">
              </div>

              <div class="form-group">
                <label for="">Email (<span style="color: red;">*</span>) </label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
              </div>

              <div class="form-group">
                <label for="">Chương trình đăng ký </label>
                <input type="text" class="form-control" name="ctdk" placeholder="Nhập chương trình đăng ký">
              </div>

              <div class="form-group" style="margin-top: 1em;">
                <label>Số quyết định</label>
                <input type="text" class="form-control" name="soqd" placeholder="Nhập số quyết định">
              </div>

              <div class="form-group" style="margin-top: 1em;">
                <label>Ngày cấp giấy phép</label>
                <input type="text" class="form-control" name="thoigiancap" placeholder="Nhập ngày cấp giấy phép">
              </div>

              <div class="form-group" style="margin-top: 1em;">
                <label>Thời hạn giấy phép</label>
                <input type="text" class="form-control" name="thoihan" placeholder="Nhập thời hạn của giấy phép">
              </div>

              <div class="form-group" style="margin-top: 1em;">
                <label>Ghi chú</label>
                <input type="text" class="form-control" name="ghichu" placeholder="Nhập ghi chú">
              </div>


              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Lưu</button>
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


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="modal-content" action="{{Route('admin.import-employee')}}" method="POST" enctype='multipart/form-data'>
      {{ csrf_field() }}
      <div class="modal-header">
        <h4 class="modal-title"><b><i class="fas fa-project-diagram"></i> Thêm mới đơn vị/trung tâm</b></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="email">Chọn file excel<span>(<b style="color:red;">*</b>)</span>:</label>
          <input type="file" class="form-control" name="select_file"  required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Lưu</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>

  </div>
</div>

<script>
  $(document).ready(function() {

    $('.add-content').click(function() {
      $('.form-content').slideToggle(300);

    });
  });
</script>
@endsection