@extends('../master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-project-diagram"></i> Danh mục đơn vị</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh mục đơn vị</li>
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
          <h3 class="card-title"><i class="fa fa-list-alt"></i> Danh sách đơn vị<b>(<span style="color: red;">{{$total}}</span>)</b></h3>

          <div class="card-tools">
              <div class="input-group">
                <input class="form-control" style="padding: 1.375rem .75rem!important;" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
                <button style="margin-left:0.3em;" data-toggle="modal" data-target="#myModal" class="btn btn-success">Thêm mới</button>

              </div>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects table-hover table-bordered">
              <thead>
                  <tr>
                      <th style="width: 1%;text-align: center;">
                          STT
                      </th>
                      <th style="text-align: center;">
                          Tên đơn vị
                      </th>
                      <th style="text-align: center;">
                          Ghi chú
                      </th>
                      <th  style="text-align: center;">
                        Thao tác
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php $stt = 1; ?>
                  @foreach($data as $donvi)
                  <tr>
                      <td style="text-align: center;">
                          {{$stt++}}
                      </td>
                      <td style="text-align: center;">
                          <p>
                             {{$donvi->tendonvi}}
                          </p>
                      </td>
                      <td style="text-align: center;">
                          <p>
                          {{$donvi->ghichu}}
                          </p>
                      </td>
                      <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{Route('admin.edit-room',$donvi->iddonvi)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{Route('admin.delete-room',$donvi->iddonvi)}}">
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

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <form class="modal-content" action="{{Route('admin.save-room')}}" method="POST">
          {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title"><b><i class="fas fa-project-diagram"></i> Thêm mới đơn vị</b></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="email">Tên đơn vị <span>(<b style="color:red;">*</b>)</span>:</label>
              <input type="text" class="form-control" name="tendonvi" placeholder="Nhập tên đơn vị..." required>
            </div>

            <div class="form-group">
              <label for="email">Ghi chú:</label>
              <input type="text" class="form-control" name="ghichu" placeholder="Nhập ghi chú...">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Lưu</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>

@endsection