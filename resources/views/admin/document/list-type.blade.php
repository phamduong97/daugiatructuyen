@extends('../master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-file-prescription"></i> Danh mục tài liệu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh mục tài liệu</li>
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
          <h3 class="card-title"><i class="fa fa-list-alt"></i> Danh sách tài liệu<b>(<span style="color: red;">4</span>)</b></h3>

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
                          Tên danh mục
                      </th>
                      <th  style="text-align: center;">
                        Thao tác
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td style="text-align: center;">
                          1
                      </td>
                      <td style="text-align: center;">
                          <p>
                             Văn bản pháp luật
                          </p>
                      </td>
                      <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{Route('admin.update-employee',1)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          <a class="btn btn-danger btn-sm" >
                              <i class="fas fa-trash">
                              </i>
                              Xóa
                          </a>
                      </td>
                  </tr>

                  <tr>
                      <td style="text-align: center;">
                          2
                      </td>
                      <td style="text-align: center;">
                          <p>
                          Văn bản chính trị
                          </p>
                      </td>
                      <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{Route('admin.update-employee',1)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          <a class="btn btn-danger btn-sm" >
                              <i class="fas fa-trash">
                              </i>
                              Xóa
                          </a>
                      </td>
                  </tr>

                  <tr>
                      <td style="text-align: center;">
                          3
                      </td>
                      <td style="text-align: center;">
                          <p>
                           Tài liệu kế toán
                          </p>
                      </td>
                      <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{Route('admin.update-employee',1)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          <a class="btn btn-danger btn-sm" >
                              <i class="fas fa-trash">
                              </i>
                              Xóa
                          </a>
                      </td>
                  </tr>

                  <tr>
                      <td style="text-align: center;">
                          4
                      </td>
                      <td style="text-align: center;">
                          <p>
                            Văn bản hành chính
                          </p>
                      </td>
                      <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{Route('admin.update-employee',1)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          <a class="btn btn-danger btn-sm" >
                              <i class="fas fa-trash">
                              </i>
                              Xóa
                          </a>
                      </td>
                  </tr>
                 
                 
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <form class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><b><i class="fas fa-project-diagram"></i> Thêm mới danh mục tài liệu</b></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="email">Tên danh mục tài liệu:</label>
              <input type="email" class="form-control" placeholder="Nhập tên tài liệu...">
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