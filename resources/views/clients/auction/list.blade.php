@extends('clients.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><i class="fa fa-gavel"></i> {{$title}}</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>

<section class="who-is">
    <div class="container">

         <div class="tab-content" style="border: 1px solid #eee;padding:10px;box-shadow: 1px 8px 7px;">
            <form class="form-inline">
                <div class="form-group">
                  <label for="focusedInput">Tìm kiếm :</label>
                  <input class="form-control" id="focusedInput" name="keyword" placeholder="Từ khóa/mã tài sản..." type="text">
                </div>
                <div class="form-group">
                  <label for="inputPassword">Trạng thái: </label>
                 <select class="form-control" name="status">
                     <option value="">Chọn trạng thái</option>
                     <option value="1">Chờ đấu giá</option>
                     <option value="2">Đang diễn ra</option>
                     <option value="3">Kết thúc</option>
                 </select>
                </div>
                <div class="form-group has-success has-feedback">
                  <button class="btn btn-success"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
           </form>
           
           <hr>
            <h4 style=" padding: 0 0 10px 10px;">
                <b><i class="fa fa-search"></i> Hiển thị tất cả: <span style="color: red;">{{count($data)}}/{{$total}}</span>  tài sản</b>
            </h4>

            <table class="table table-bordered table-hover table-responsive">
                <thead style="background: orange;">
                    <th style="text-align: center;" width="2%">STT</th>
                    <th style="text-align: center;" width="10%">Mã tài sản</th>
                    <th style="text-align: center;" width="15%">Tên tài sản</th>
                    <th style="text-align: center;" width="20%">Ảnh tài sản</th>
                    <th style="text-align: center;">Giá khởi điểm</th>
                    <th style="text-align: center;">Trạng thái</th>
                    @if(Auth::user()->role != 1)
                    <th style="text-align: center;">Thao tác</th>
                    <th style="text-align: center;">Thành viên tham gia</th>
                    @endif
                    <th style="text-align: center;">Lịch sử đấu giá</th>
                </thead>

                <tbody>
                    @php
                    $stt = 1;
                    @endphp

                    @if($total > 0)
                    @foreach($data as $asset)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$asset->mts}}</td>
                        <td><a href="{{Route('view-detail-product',$asset->slug)}}" target="_blank" title="Xem tài sản" style="color:blue;">{{$asset->asset_name}}</a></td>
                        <td style="text-align: center;"><img src="public/upload/assets/{{$asset->img_title}}" alt="" width="100%" height="150"></td>
                        <td><b style="color: red;">{{number_format($asset->price_start)}} </b> VNĐ</td>
                        <td style="text-align: center;">
                            @if($asset->status == 1)
                            <a href="#" style="color:orange;">Chờ đấu giá</a>
                            @elseif($asset->status == 2)
                            <a href="#" style="color:green;">Đang diễn ra</a>
                            @elseif($asset->status == 3)
                            <a href="#" style="color:red;">Kết thúc</a>
                            @endif
                        </td>
                        @if(Auth::user()->role != 1)
                        <td style="text-align: center;"><a href="#" class="btn btn-warning"><i class="fa fa-edit"></i> Sửa</a></td>
                        <td style="text-align: center;"><a href="#" data-mts="{{$asset->mts}}" class="btn btn-success btn-view-members" data-toggle="modal" data-target="#register-bid"><i class="fa fa-users"></i> Xem thành viên</a></td>
                        @endif
                        <td style="text-align: center;">
                            @if($asset->status == 3)
                            <a href="{{Route('user.auction-detail-history',$asset->slug)}}" style="color:blue;">Xem lịch sử </a>
                            @else
                            <a href="#" style="color:red;"><i>Không có</i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Không có dữ liệu !</strong>
                    </div>
                    @endif
                </tbody>
            </table>

            {{$data->links()}}

         </div>

    </div>
</section>



@if(Auth::check() && Auth::user()->role != 1)
  
      <div class="modal" id="register-bid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 100px;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
                {{csrf_field()}}
                <form action="{{ route('user.register-auction') }}" method="post" id="form-confirm">
                    <div class="modal-header" style="background:#e19b1bb8;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title success" style="text-align:center;"><b><i class="fa fa-users"></i> Thành viên tham dự</b></h3>
                    </div>

                    <div class="modal-body">
                       <div class="loader"></div>
                       <div id="load-content"></div>
                    </div>

                    <div class="modal-footer" >
                         <button type="button" class="btn btn-info" data-dismiss="modal">Đóng </button>
                    </div>
                </form>

          </div>
        </div>
      </div>


    <script type="text/javascript">

        $(document).ready(function(){

            $('.btn-view-members').click(function (e) {
                e.preventDefault();

                var mts = $(this).attr('data-mts');
                var _token = $('input[name="_token"]').val();

                $('.loader').show();
                $('#load-content').html('');
                $.ajax({
                        url: '{{Route('user.list-member-auction')}}',
                        type: 'post',
                        data: {
                            mts:mts,
                            _token:_token
                        },
                        success: function (data) {

                            $('.loader').hide();
                            $('#load-content').html(data);
                        }
                });
                
            });

        });


    </script>



    <style type="text/css">
        
    .loader {
      position: relative;
      text-align: center;
      margin: 15px auto 35px auto;
      z-index: 9999;
      display: block;
      width: 80px;
      height: 80px;
      border: 10px solid rgba(0, 0, 0, .3);
      border-radius: 50%;
      border-top-color: #000;
      animation: spin 1s ease-in-out infinite;
      -webkit-animation: spin 1s ease-in-out infinite;
      display: none;
    }

    @keyframes spin {
      to {
        -webkit-transform: rotate(360deg);
      }
    }

    @-webkit-keyframes spin {
      to {
        -webkit-transform: rotate(360deg);
      }
    }

    </style>

@endif



@endsection