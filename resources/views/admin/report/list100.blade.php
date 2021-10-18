@extends('../master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-portrait"></i> Hồ sơ hoàn thành thông tin 100%</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Hồ sơ hoàn thành thông tin 100%</li>
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
          <h3 class="card-title"><i class="fa fa-list-alt"></i> Danh sách hồ sơ hoàn thành thông tin 100% <b>(<span style="color: red;">5</span>)</b></h3>

          <div class="card-tools">
                 <button  class="btn btn-default float-right" style="margin-left: 0.5em;"><i class="fas fa-print"></i> In</button>
                <a href="public/files/danhsachnhansu.xlsx" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Xuất file excel
                </a>

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
                          Họ và tên
                      </th>
                      <th >
                          Giới tính
                      </th>
                       <th>
                          Ngày tháng năm sinh
                      </th>
                      <th>
                         Chức vụ
                      </th>
                      <th>
                        Trình độ chuyên môn
                      </th>
                      <th>
                        Chuyên ngành đào tạo
                      </th>
                      <th>
                          Thông tin hồ sơ
                      </th>
                      <th>
                        Thao tác
                      </th>
                  </tr>
              </thead>
              <tbody>
                 
                  <tr>
                      <td>
                          1
                      </td>
                      <td>
                          <p>
                             Phạm Văn Nam
                          </p>
                      </td>
                      <td>
                         Nam
                      </td>
                      <td>
                          09/02/1975
                      </td>
                      <td>
                          Cán bộ quản lý
                      </td>
                      <td>
                          Đại học Luật Hà Nội
                      </td>
                      <td>
                          Luật quản lý Nhà Nước
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="100" aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                              </div>
                          </div>
                          <small>
                              100% hoàn thành
                          </small>
                      </td>
                      <td class="project-actions text-right">
                           <a class="btn btn-primary btn-sm" href="{{Route('admin.detail-employee',1)}}">
                              <i class="fas fa-folder">
                              </i>
                              Xem chi tiết
                          </a>
                      </td>
                  </tr>

                   <tr>
                      <td>
                          2
                      </td>
                      <td>
                          <p>
                             Phạm Văn Trung
                          </p>
                      </td>
                      <td>
                         Nam
                      </td>
                      <td>
                          12/02/1981
                      </td>
                      <td>
                          Cán bộ luật
                      </td>
                      <td>
                          Đại học Luật Hà Nội
                      </td>
                      <td>
                          Luật quản lý Nhà Nước
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="100" aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                              </div>
                          </div>
                          <small>
                              100% hoàn thành
                          </small>
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{Route('admin.detail-employee',1)}}">
                          <i class="fas fa-folder">
                          </i>
                          Xem chi tiết
                        </a>
                      </td>
                  </tr>

                   <tr>
                      <td>
                          3
                      </td>
                      <td>
                          <p>
                             Vũ Thị Hoa
                          </p>
                      </td>
                      <td>
                         Nữ
                      </td>
                      <td>
                          29/05/1992
                      </td>
                      <td>
                          Cán bộ tư pháp
                      </td>
                      <td>
                          Đại học Văn Hóa
                      </td>
                      <td>
                          Luật quản lý Nhà Nước
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="100" aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                              </div>
                          </div>
                          <small>
                              100% hoàn thành
                          </small>
                        </td>
                        <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{Route('admin.detail-employee',1)}}">
                            <i class="fas fa-folder">
                            </i>
                            Xem chi tiết
                          </a>
                        </td>
                  </tr>

                   <tr>
                      <td>
                          4
                      </td>
                      <td>
                          <p>
                            Vũ Văn Cường
                          </p>
                      </td>
                      <td>
                         Nam
                      </td>
                      <td>
                          12/02/1978
                      </td>
                      <td>
                          Cán bộ luật
                      </td>
                      <td>
                          Đại học Luật Hà Nội
                      </td>
                      <td>
                          Luật quản lý Nhà Nước
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="100" aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                              </div>
                          </div>
                          <small>
                              100% hoàn thành
                          </small>
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{Route('admin.detail-employee',1)}}">
                          <i class="fas fa-folder">
                          </i>
                          Xem chi tiết
                        </a>
                      </td>
                  </tr>

                   <tr>
                      <td>
                          5
                      </td>
                      <td>
                          <p>
                             Lê Thị Ngân
                          </p>
                      </td>
                      <td>
                         Nữ
                      </td>
                      <td>
                          25/11/1990
                      </td>
                      <td>
                          Cán bộ tư pháp
                      </td>
                      <td>
                          Học viện tư pháp
                      </td>
                      <td>
                          Luật tư pháp
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="100" aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                              </div>
                          </div>
                          <small>
                              100% hoàn thành
                          </small>
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{Route('admin.detail-employee',1)}}">
                          <i class="fas fa-folder">
                          </i>
                          Xem chi tiết
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


@endsection