@extends('admin.master')

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
                  <div class="item-line"><b>{{$data->type == 1 ? 'Họ và tên' : 'Người đại diện theo pháp luật'}}: </b> {{$data->fullname}}</div>
                  @if ($data->type == 2)
                  <div class="item-line"><b>Chức vụ của người đại diện: </b> {{$data->represent_position}}</div>
                  @endif
                  <div class="item-line"><b>Số điện thoại: </b> {{$data->phone}}</div>
                  <div class="item-line"><b>Địa chỉ email: </b> {{$data->email}}</div>
                  <div class="item-line"><b>Ngày sinh: </b> {{$data->birth}}</div>
                  <div class="item-line row">
                      <div class="col-sm-4"><b>Tỉnh/thành phố: </b> {{$data->province}}</div>
                      <div class="col-sm-4"><b>Quận/huyện: </b> {{$data->district}}</div>
                      <div class="col-sm-4"><b>Xã/Phường: </b> {{$data->ward}}</div>
                  </div>
                  <div class="item-line"><b>Địa chỉ: </b> {{$data->address}}</div>
                 <div class="item-line"><b>Giới tính :</b> {{$data->gender}}</div>
                  <div class="item-line"><b>Số CMT/ Thẻ căn cước/ Hộ chiếu : </b>{{$data->cmnd}}</div>
                  <div class="item-line"><b>Ngày cấp CMT/ Thẻ căn cước / Hộ chiếu: </b> {{$data->date_range}}</div>
                  <div class="item-line"><b>Nơi cấp CMT/ Thẻ căn cước / Hộ chiếu: </b> {{$data->place_range}}</div>
                  <div class="item-line row">
                      <div class="col-sm-6">
                          <b>Ảnh mặt trước :</b> <br>
                            <img src="public/upload/cmnd/{{$data->img_before}}" alt="" style="border:1px solid #eee;width:80%;">
                      </div>
                      <div class="col-sm-6">
                          <b>Ảnh mặt sau :</b> <br>
                          <img src="public/upload/cmnd/{{$data->img_after}}" alt="" style="border:1px solid #eee;width:80%;">
                      </div>
                  </div>
                  <div class="item-line"><b>Số tài khoản ngân hàng nhận hoàn tiền đặt trước (tài khoản của Cá nhân/ tổ chức đăng ký tham gia đấu giá): </b> {{$data->bank_number}}</div>
                  <div class="item-line"><b>Tên ngân hàng :  </b> {{getBank($data->bank_id)}}</div>
                  <div class="item-line"><b>Chi nhánh ngân hàng: </b> {{$data->	bank_branch}}</div>
                  <div class="item-line"><b>Tên chủ tài khoản ngân hàng : </b> {{$data->bank_owner_name}}</div>
                  @if ($data->type == 2)
                  <div class="item-line"><b>Tên tổ chức: </b> {{$data->org_name}}</div>
                  <div class="item-line"><b>Mã số doanh nghiệp/Mã số thuế: </b> {{$data->tax_code}}</div>
                  <div class="item-line"><b>Ngày cấp Mã số doanh nghiệp/Mã số thuế: </b> {{$data->date_range_tax}}</div>
                  <div class="item-line"><b>Nơi cấp mã số doanh nghiệp/Mã số thuế: </b> {{$data->address_range_tax}}</div>
                  <div class="item-line"><b>Địa chỉ tổ chức: </b> {{$data->org_address}}</div>
                  <div class="item-line"><b>Giấy chứng nhận đăng ký kinh doanh: </b> <a href="public/upload/certificates/{{$data->certificate}}">Tải xuống</a></div>
                  @endif
                </div>
              </div>
            </div>
            <!-- timeline time label -->

            <!-- END timeline item -->
            <div>
              <i class="fas fa-clock bg-gray"></i>
            </div>
          </div>
           <a style="margin: 1em 0;" href="{{Route('admin.all-bidders')}}" class="btn btn-primary"><i class="fas fa-redo"></i> Quay lại</a>
           @if ($data->is_vertified == 0)
           <a style="margin: 1em 0;" href="{{Route('admin.confirm-bidder',$data->id_user)}}" class="btn btn-success"><i class="fas fa-check-circle"></i> Xác thực tài khoản</a>
           @endif
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    @if (Session::has('success'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Xác thực thành công",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
    @endif


@endsection
