@extends('../master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-edit"></i> Cập nhật nhân sự</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Cập nhật nhân sự</li>
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
                <h3 class="card-title">Cập nhật nhân sự <i class="fa fa-users"></i></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('thanhcong'))
               <div class="alert alert-success" style="margin: 20px 20px;text-align: center;">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <strong style="">{{Session::get('thanhcong')}}</strong>
               </div>
              @endif
              <form role="form" action="{{route('admin.edit-employee')}}" method="post">
                 {{ csrf_field() }} 
                 <input type="hidden" value="{{$nhansu->idnhansu}}" name="idnhansu">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Họ và tên giám đốc (<span style="color: red;">*</span>)</label>
                    <input type="text" value="{{$nhansu->giamdoc}}" class="form-control" name="hoten"  placeholder="Nhập họ và tên giám đốc" required="">
                  </div>

                  <div class="form-group">
                    <label>Đơn vị trung tâm (<span style="color: red;">*</span>)</label>
                    <select class="form-control" name="iddonvi" required>
                      <option value="">--Chọn đơn vị trung tâm--</option>
                      @foreach($data as $donvi)
                      <option value="{{$donvi->iddonvi}}" <?php if($donvi->iddonvi = $nhansu->iddonvi) echo 'selected'; ?>>{{$donvi->tendonvi}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Tên đơn vị (<span style="color: red;">*</span>)</label>
                    <input type="text"  value="{{$nhansu->tendvi}}"  class="form-control" name="tendonvi"  placeholder="Nhập tên đơn vị" required="">
                  </div>

                  <div class="form-group">
                    <label for="">Quận/Huyện (<span style="color: red;">*</span>)</label>
                    <input type="text" value="{{$nhansu->quanhuyen}}"  class="form-control" name="quanhuyen"  placeholder="Nhập quận/huyện" required="">
                  </div>

                  <div class="form-group">
                    <label for="">Đơn vị chủ quản/Công ty (<span style="color: red;">*</span>)</label>
                    <input type="text" value="{{$nhansu->congty}}"  class="form-control" name="donvichuquan"  placeholder="Nhập tên đơn vị chủ quản" required="">
                  </div>

                  <div class="form-group">
                    <label for="">Địa chỉ (<span style="color: red;">*</span>)</label>
                    <input type="text" value="{{$nhansu->diachi}}"  class="form-control" name="diachi"  placeholder="Nhập địa chỉ" required="">
                  </div>

                  <div class="form-group">
                    <label for="">Điện thoại (<span style="color: red;">*</span>)</label>
                    <input type="tel" value="{{$nhansu->sdt}}"   class="form-control" name="sdt"  placeholder="Nhập số điện thoại" required="">
                  </div>

                  <div class="form-group">
                    <label for="">Email  (<span style="color: red;">*</span>) </label>
                    <input type="email" value="{{$nhansu->email}}"  class="form-control" name="email"  placeholder="Nhập email" required>
                  </div>

                  <div class="form-group">
                    <label for="">Chương trình đăng ký </label>
                    <input type="text" value="{{$nhansu->ctdk}}"  class="form-control" name="ctdk"  placeholder="Nhập chương trình đăng ký" >
                  </div>

                  <div class="form-group" style="margin-top: 1em;">
                    <label>Số quyết định</label>
                    <input type="text" value="{{$nhansu->soqd}}"  class="form-control" name="soqd" placeholder="Nhập số quyết định" >
                  </div>

                  <div class="form-group" style="margin-top: 1em;">
                    <label>Ngày cấp giấy phép</label>
                    <input type="text" value="{{$nhansu->thoigiancap}}" class="form-control" name="thoigiancap" placeholder="Nhập ngày cấp giấy phép">
                  </div>

                  <div class="form-group" style="margin-top: 1em;">
                    <label>Thời hạn giấy phép</label>
                    <input type="text" value="{{$nhansu->thoihancap}}" class="form-control" name="thoihan" placeholder="Nhập thời hạn của giấy phép" >
                  </div>

                  <div class="form-group" style="margin-top: 1em;">
                    <label>Ghi chú</label>
                    <input type="text" value="{{$nhansu->ghichu}}" class="form-control" name="ghichu" placeholder="Nhập ghi chú" >
                  </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Lưu</button>
                  <a style="margin: 1em 0;" href="{{Route('admin.list-employee')}}" class="btn btn-primary"><i class="fas fa-redo"></i> Quay lại</a>
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