@extends('../master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-project-diagram"></i> Sửa đơn vị</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Sửa đơn vị</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-edit"></i> Sửa đơn vị</h3>
    </div>
    <div class="card-body p-0">
      <form class="modal-content" action="{{Route('admin.update-room')}}" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="email">Tên đơn vị <span>(<b style="color:red;">*</b>)</span>:</label>
            <input type="text" class="form-control" value="{{$data->tendonvi}}" name="tendonvi" placeholder="Nhập tên đơn vị..." required>
          </div>
          <input type="hidden" value="{{$data->iddonvi}}" name="iddonvi">
          <div class="form-group">
            <label for="email">Ghi chú:</label>
            <input type="text" class="form-control" name="ghichu" placeholder="Nhập ghi chú...">
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Lưu</button>
          <a href="{{Route('admin.manage-room')}}"class="btn btn-default" >Quay lại</a>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>
<!-- /.content -->



@endsection