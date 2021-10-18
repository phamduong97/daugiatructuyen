@extends('../master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-user-plus"></i> Danh sách nhân sự</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách nhân sự</li>
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
          <h3 class="card-title"><i class="fa fa-list-alt"></i> Danh sách nhân sự <b>(<span style="color: red;">{{$total}}</span>)</b></h3>

          <div class="card-tools row">
              <div class="input-group col-sm-6">
                <input class="form-control" style="padding: 1.375rem .75rem!important;" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
             <div class="col-sm-6">
                <button  class="btn btn-default float-right" style="margin-left: 0.5em;"><i class="fas fa-print"></i> In</button>
                <a href="public/files/danhsachnhansu.xlsx" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Xuất file excel
                </a>
             </div>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects table-hover table-bordered">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          STT
                      </th>
                      <th>
                          Giám đốc
                      </th>
                      <th>
                          Trung tâm
                      </th>
                      <th >
                          Tên đơn vị
                      </th>
                      <th>
                         Địa chỉ
                      </th>
                      <th>
                         Số điện thoại
                      </th>
                      
                      
                      <th style="text-align: center;width: 22%;">
                        Thao tác
                      </th>
                  </tr>
              </thead>
              <tbody>
                 <?php $stt = 1; ?>
                 @foreach($data as $nhansu)
                  <tr>
                      <td>
                          {{$stt++}}
                      </td>
                      <td>
                          <p>
                            {{$nhansu->giamdoc}}
                          </p>
                      </td>
                      <td>
                      {{$nhansu->tendonvi}}
                      </td>
                      <td>
                      {{$nhansu->tendvi}}
                      </td>
                      <td>
                      {{$nhansu->diachi}}
                      </td>
                      <td>
                      {{$nhansu->sdt}}
                      </td>
                      
                      <td class="project-actions text-right">
                           <a class="btn btn-primary btn-sm" href="{{Route('admin.detail-employee',$nhansu->idnhansu)}}">
                              <i class="fas fa-folder">
                              </i>
                              Xem chi tiết
                          </a>
                           <a class="btn btn-primary btn-sm" href="{{Route('admin.update-employee',$nhansu->idnhansu)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{Route('admin.delete-employee',$nhansu->idnhansu)}}">
                              <i class="fas fa-trash">
                              </i>
                              Xóa
                          </a>
                      </td>
                  </tr>
                @endforeach
               
                 
              </tbody>
          </table>
          {{$data->links()}}
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->

@endsection