@extends('clients.master')


@section('content')

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Thông tin tài sản</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>

<section class="car-details">
    <div class="container">
        <div class="row">
            <div id="single-car" class="col-md-8">
                <div class="up-content clearfix" style="height:150px;">
                    <h2>{{$data->asset_name}}</h2>
                    <h2 style="color:red;"><i class="fa fa-gavel"></i> {{number_format($data->price_start)}} vnđ</h2>
                </div>
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="public/upload/assets/{{$data->img_title}}">
                            <img src="public/upload/assets/{{$data->img_title}}" alt="" style="height:400px;" />
                        </li>

                        @php
                          $img_detail = json_decode($data->img_detail);
                          $documents = json_decode($data->documents);
                        @endphp

                        @foreach($img_detail as $img)
                        <li data-thumb="public/upload/assets/{{$img}}">
                            <img src="public/upload/assets/{{$img}}" alt="" style="height:400px;" />
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
              
                <div style="text-align: center; padding-top: 30px;">
                    <div style="line-height: normal;">
                     <span>
                        <b style="border: 1px solid #eee; font-size: 35px;padding: 10px;">Giá khởi điểm: {{number_format($data->price_start)}} VNĐ</b>
                    </span>       
                    </div>                    
                </div>

            </div>
            <div id="left-info" class="col-md-4">
                <div class="details">
                    <div class="head-side-bar">
                        <h4>Chi tiết tài sản</h4>
                    </div>
                    <div class="list-info">
                        <ul>
                            <li class="row">
                                <div class="col-sm-6"><span>Mã tài sản:</span>
                                </div>
                                <div class="col-sm-6"> {{$data->mts}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Thời gian mở đăng ký:</span>
                                </div>
                                <div class="col-sm-6">{{date('d/m/Y H:i', strtotime($data->start_time_reg))}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Thời gian kết thúc đăng ký:</span>
                                </div>
                                <div class="col-sm-6">{{date('d/m/Y H:i', strtotime($data->end_time_reg))}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Phí đăng ký tham gia đấu giá </span>
                                </div>
                                <div class="col-sm-6">{{number_format($data->fee)}} VNĐ</div> 
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Bước giá: </span>
                                </div>
                                <div class="col-sm-6">{{number_format($data->price_step)}} VNĐ</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Số bước giá tối đa: </span>
                                </div>
                                <div class="col-sm-6">{{number_format($data->max_step)}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Tiền đặt trước: </span>
                                </div>
                                <div class="col-sm-6">{{number_format($data->deposit)}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Phương thức đấu giá: </span>
                                </div>
                                <div class="col-sm-6">{{$data->method}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Tài sản thuộc sở hữu: </span>
                                </div>
                                <div class="col-sm-6">{{$data->owner}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Nơi xem tài sản: </span>
                                </div>
                                <div class="col-sm-6">{{$data->place_asset}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Thời gian xem tài sản </span>
                                </div>
                                <div class="col-sm-6">{{$data->view_time}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Tổ chức đấu giá tài sản: </span>
                                </div>
                                <div class="col-sm-6">{{$data->organization}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Đấu giá viên </span>
                                </div>
                                <div class="col-sm-6">{{getNameUser($data->bidder)}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Thời gian bắt đầu trả giá: </span>
                                </div>
                                <div class="col-sm-6">{{date('d/m/Y H:i', strtotime($data->start_time_bid))}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Thời gian kết thúc trả giá: </span>
                                </div>
                                <div class="col-sm-6">{{date('d/m/Y H:i', strtotime($data->end_time_bid))}}</div>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    <span>Giá khởi điểm: </span>
                                </div>
                                <div class="col-sm-6">{{number_format($data->price_start)}} VNĐ</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="enquiry">
                    @if(Auth::check() )
                        @if(Auth::user()->role != 1)
                            <a class="btn btn-warning" href="{{Route('user.room-auction',$data->slug)}}"  style="width:100%;">
                                VÀO PHÒNG ĐẤU GIÁ
                            </a>
                        @else
                            @if( !checkRegisterAuction(Auth::user()->id,$data->id,'register') && Auth::user()->is_vertified == 1)
                                <a class="btn btn-success" href="#"  data-toggle="modal" data-target="#register-bid" style="width:100%;">
                                    ĐĂNG KÝ ĐẤU GIÁ
                                </a>
                            @elseif( checkRegisterAuction(Auth::user()->id,$data->id,'register') && Auth::user()->is_vertified == 1 && strtotime($data->start_time_bid) <=time() && strtotime($data->end_time_bid) >=time() )
                                @if(checkRegisterAuction(Auth::user()->id,$data->id,'is_vertified') )
                                    <a class="btn btn-warning" href="{{Route('user.room-auction',$data->slug)}}"  style="width:100%;">
                                        VÀO PHÒNG ĐẤU GIÁ
                                    </a>
                                @else 
                                    <a class="btn btn-warning" href="#" style="width:100%;">
                                        ĐANG CHỜ XÉT DUYỆT
                                    </a>
                                @endif
                                
                            @endif
                        @endif
                       
                    @else
                        <a class="btn btn-success" href="#"  data-toggle="modal" data-target="#myModal" style="width:100%;">
                                ĐĂNG KÝ ĐẤU GIÁ
                        </a>
                    @endif
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="tab-content">
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab1">Thông tin tài sản</a></li>
                        <li><a href="#tab2">Tài liệu liên quan</a></li>
                        <li><a href="#tab3">Thông tin tổ chức đấu giá</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab active">
                           {!!$data->description!!}
                        </div>
                        <div id="tab2" class="tab">
                            <table class="auction-history-table table table-bordered table-hover table-responsive">

                                <thead>
                                    <div class="form-group">
                                        <th class="nameDocument">Tên tài liệu</th>

                                        <th class="downloadDocument">Tải xuống</th>
                                    </div>
                                </thead>
                                <tbody>

                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach($documents as $v)
                                    <div class="form-group">
                                        <td class="nameDocument">📃Tài liệu tham khảo {{$stt++}}</div>
                                        <td class="downloadDocument" style="text-align:center;">
                                            <a target="_blank" href="public/upload/documents/{{$v}}">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div id="tab3" class="tab">
                            <ul class="list-unstyled">

                                <li>
                                    <i style="color: #b41712;" class="fa fa-info-circle"></i>
                                    <span>Tên tổ chức: </span>
                                    <span class="details">
                                        <a href="">Công ty đấu giá hợp danh Tân Đại Phát</a>
                                    </span>
                                </li>
                                <br>
                                <li>
                                    <i style="color: #b41712;" class="fa fa-user"> </i>
                                    <span class="fa-padding-right">
                                        Tên tài khoản:
                                    </span>

                                    <span class="details">
                                        <a href="">Tân Đại Phát</a>
                                    </span>
                                </li>
                                <br>
                                <li>
                                    <i style="color: #b41712;" class="fa fa-map-marker"> </i>
                                    <span style=" padding-left: 6px;">Địa chỉ: </span>
                                    <span style="font-weight: bold;" class="details">
                                        428 Lĩnh Nam, Trần Phú, Hoàng Mai, Hà Nội, Việt Nam
                                    </span>
                                </li>
                                <br>
                                <li>
                                    <i style="color: #b41712;" class="fa fa-clipboard"> </i>
                                    <span>Mô tả: </span>
                                    <span style="font-weight: bold;" class="details">
                                        Tân Đại Phát
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="featured-listing">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="heading-section-2 text-center">
          <h2>Tài sản liên quan</h2>
          <div class="dec"><i class="fa fa-gavel"></i></div>
          <div class="line-dec"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div id="featured-cars">
        @foreach($asset_related as $v)
        <div class="featured-item col-md-15 col-sm-6">
          <img src="public/upload/assets/{{$v->img_title}}" alt="" height="240" width="100%">
          <div class="down-content">
            <a href="{{Route('view-detail-product',$v->slug)}}">
              <h2 style="height:80px;width:100%;overflow: hidden;text-overflow: ellipsis;">{{$v->asset_name}}</h2>
            </a>
            <div class="light-line"></div>
            <p><i class="fa fa-gavel"></i> Giá khởi điểm : <b style="color:red;">{{number_format($v->price_start)}} vnđ</b></p>
            <p><i class="fa fa-clock-o"></i> Thời gian: <b style="color: red;">{{date('d/m/Y H:i', strtotime($v->start_time_bid))}}</b></p>
            <div class="car-info">
              <ul>
                <li><a href="#"><i class="fa fa-eye"></i>Xem chi tiết</a></li>
                <li><a href="#" class="concern"><i class="fa fa-star"></i>Quan tâm</a></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<div id="cta-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="left-content">
                    <h2>Đăng ký để nhận thông tin đấu giá</h2>
                    <form method="get" id="subscribe" class="blog-search">
                        <input type="text" class="blog-search-field" name="s" placeholder="Địa chỉ E-mail" value="">
                        <div class="simple-button">
                            <a href="#">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="right-content">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@if(Auth::check() && Auth::user()->role == 1 && !checkRegisterAuction(Auth::user()->id,$data->id,'register') && Auth::user()->is_vertified == 1 )
  <!-- Modal -->
  <div class="modal" id="register-bid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 120px;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      
          @if(Session::has('flag'))
          <script type="text/javascript">
             alert('{{Session::get('message')}}');
          </script>
           @endif
            <form action="{{ route('user.register-auction') }}" method="post" id="form-confirm">
                <div class="modal-header" style="background:#e19b1bb8;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title success" style="text-align:center;"><b>Đăng ký tham gia đấu giá</b></h3>
                </div>

                <div class="modal-body">
                      {{ csrf_field() }}
                    <legend><b><i class="fa fa-gavel"></i> Số tiền cần phải nộp:</b> </legend>
                        <div class="form-group row">
                            <div class="col-sm-3">Chi phí tham gia đấu giá</div>
                            <div class="col-sm-9"><input class="form-control" disabled readonly type="text" value="{{number_format($data->fee)}}"></div>
                        </div>
                         <div class="form-group row">
                            <div class="col-sm-3">Số tiền đặt trước </div>
                            <div class="col-sm-9"><input class="form-control" disabled readonly type="text" value="{{number_format($data->deposit)}}"></div>
                        </div>
                         <div class="form-group row">
                            <div class="col-sm-3">Tổng số tiền </div>
                            <div class="col-sm-9"><input class="form-control" disabled readonly type="text" value="{{number_format($data->fee + $data->deposit)}}"></div>
                        </div>
                     <legend><b><i class="fa fa-user"></i> Thông tin tài khoản:</b> </legend>
                        <div class="form-group row">
                            <div class="col-sm-3">Số tài khoản </div>
                            <div class="col-sm-9"><input class="form-control" disabled readonly type="text" value="{{Auth::user()->bank_number}}"></div>
                        </div>
                         <div class="form-group row">
                            <div class="col-sm-3">Ngân hàng </div>
                            <div class="col-sm-9"><input class="form-control" disabled readonly type="text" value="{{getBank(Auth::user()->bank_id)}}"></div>
                        </div>
                         <div class="form-group row">
                            <div class="col-sm-3">Chủ tài khoản </div>
                            <div class="col-sm-9"><input class="form-control" disabled readonly type="text" value="{{Auth::user()->bank_owner_name}}"></div>
                        </div>
                        <div class="form-group">
                            <div class="input-wrap" style="padding-bottom:6px;font-size: 14px;">
                                <input type="hidden" value="{{$data->mts}}" name="auction_asset_mts">
                                <input type="checkbox" class="input" id="checked-info" style="width:20px;height:20px" required> <b style="color:green;"><i class="fa fa-pencil"></i> Tôi đã đọc và nghiên cứu đầy đủ các thông tin của hồ sơ tham dự đấu giá. Tôi cam kết thực hiện đúng các quy trình trong hồ sơ và quy định pháp luật liên quan.</b> <br>
                                <span style="color:red" class="lberrror"></span>
                            </div>
                        </div>
                </div>

                <div class="modal-footer" >
                     <button type="submit" id="confirm-reg"  class="btn btn-success" style="width:100%;">ĐĂNG KÝ THAM GIA ĐẤU GIÁ </button>
                </div>
            </form>

      </div>
    </div>
  </div>
  
@endif


@if(Session::has('success'))
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
          $(document).ready(function() {
            swal({
                title: "Đăng ký tham gia thành công",
                text: "Bạn sẽ nhận được email hướng dẫn từ chúng tôi. Vui lòng kiểm tra email và tiến hành thủ tục thanh toán phí tham dự đấu giá tài sản để tham gia đấu giá !",
                type: "success",
                timer: 5000,
                showConfirmButton: false
            });
        });
    </script>
@endif


<script>

    $(document).ready(function(){

        $('#confirm-reg').click(function (e) {
            e.preventDefault();

            if($('#checked-info').is(":checked")){
                  $(this).disabled;
                  $(this).text("Vui lòng đợi...");
                  $('.lberrror').text('');
                  $('#form-confirm').submit();
            }else{

                 $('.lberrror').text('Vui lòng chấp nhận điều khoản trước khi đăng ký !');
            }

        });

    });
  </script>

@endsection