@extends('clients.master')


@section('content')

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><i class="fa fa-gavel"></i> PHÒNG ĐẤU GIÁ</h1>
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
                <div class="clock-timer-auction" style="text-align: center; padding-top: 10px;">
                    <div id="clockdiv">
                        <div><span class="days"></span><div class="smalltext">Ngày</div></div>
                        <div><span class="hours"></span><div class="smalltext">Giờ</div></div>
                        <div><span class="minutes"></span><div class="smalltext">Phút</div></div>
                        <div><span class="seconds"></span><div class="smalltext">Giây</div></div>
                    </div>                    
                </div>

                <div style="text-align: center; padding-top: 30px;">
                    <h3><b>GIÁ CAO NHẤT HIỆN TẠI</b></h3>
                    <div style="line-height: normal;">
                        <span>
                            <label id="show-price-mts" style="border: 1px solid; height: 45px; width: 400px; font-size: 35px;">{{number_format($data->current_price)}} VNĐ</label>
                        </span>
                        <input type="hidden" id="curent-price-number" value="{{$data->current_price}}">       
                        <input type="hidden" id="max-step-number" value="1">       
                    </div>                    
                </div>
                <br>
                @if(Auth::user()->role == 1)
                    <div style="text-align: center; padding-top: 30px;">
                        <h3><b>GIÁ CỦA BẠN</b></h3>
                        <div style="line-height: normal;">
                            <button type="button" onclick="minus_money({{$data->max_step}},{{$data->price_step}})" id="plus-price-step" style="height: 45px;width: 50px;font-size: 30px;">-</button>
                            <input onchange="format_money_vnd('show-format-money',this.value);" onkeyup="format_money_vnd('show-format-money',this.value);" value="{{$data->current_price}}" style="border: 1px solid; height: 45px; width: 400px; font-size: 35px;" id="bid-price-number"  type="number" />
                            <button type="button" onclick="plus_money({{$data->max_step}},{{$data->price_step}})" id="minus-price-step" style="height: 45px;width: 50px;font-size: 30px;">+</button>
                        </div>                    
                    </div>  
                    <div style="text-align: center;"> <b id="show-format-money"></b></div>
                    <ul id="step-price-panel" style="text-align: center;padding: 5px; ">
                        @for($istep = 1; $istep <= $data->max_step;$istep ++)
                            <li class="istep-{{$istep}} istep" val="{{$istep}}" style="display: inline-block;padding: 5px; border-radius: 2px;background: orange;color:#fff;cursor: pointer;">x{{$istep}}</li>
                        @endfor
                    </ul>
                    <br>
                    <div class="enquiry">
                        <a class="btn btn-success bid-price"  style="width:100%;">
                            TRẢ GIÁ
                        </a>
                    </div>
                    <br>
                    @if ($current_price == $data->current_price)
                    <div class="enquiry">
                        <a class="btn btn-danger recovery-price"  style="width:100%;">
                            RÚT GIÁ
                    </a>
                    </div> 
                    @else
                    <div class="enquiry">
                        <a class="btn btn-danger recovery-price"  style="width:100%;display: none;">
                            RÚT GIÁ
                    </a>
                    </div> 
                    @endif
                @endif
                <br>
                <div class="panel-header" style="border-radius:10px 10px 0 0;background: #4ac9dd;color: #fff;text-align: center;width:100%;padding: 10px;">
                    <b><i class="fa fa-history"></i> Lịch sử đấu giá</b>
                </div>
                <div class="box-history" style="height: 400px;border: 2px solid #eee;border-radius: 0 0 10px 10px;overflow-y:scroll;padding: 5px;">
                    @foreach($auction_history as $v)
                     <p style="text-align: center;">{{$v->content}}</p>
                    @endforeach
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
                                <div class="col-sm-6">{{date('d/m/Y H:i', strtotime($data->start_time_reg))}}</div>
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
               
                <br>
                @if(Auth::user()->role != 1)
                <div class="panel-header" style="border-radius:10px 10px 0 0;background: #4ac9dd;color: #fff;text-align: center;width:100%;padding: 10px;">
                    <b><i class="fa fa-users"></i> Tài khoản tham gia</b>
                </div>
                <div class="box-members" style="height: 200px;border: 2px solid #eee;border-radius: 0 0 10px 10px;overflow-y:scroll;padding: 5px;">

                    @foreach($members as $v)
                     <p style="text-align: center;"><b>{{$v->id_user}} </b> - {{$v->fullname}} <b style="color:green;"><i class="fa fa-check-circle"></i></b> </p>
                    @endforeach

                </div>
                @endif
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
                        <div style="clear: both;"></div>                                              
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
                                    <tr class="form-group">
                                        <td class="nameDocument">📃Tài liệu tham khảo {{$stt++}}</div>
                                        <td class="downloadDocument" style="text-align:center;">
                                            <a target="_blank" href="public/upload/documents/{{$v}}">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </tr
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="clear: both;"></div>
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


 <!----------------------------------------  Process auction room   ----------------------------------------->
<script src="{{env('NODE_SERVER')}}/socket.io/socket.io.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="public/assets/js/format_money.js"></script>
<script src="public/assets/js/step_price_control.js"></script>
<script>
    var socket = io("{{env('NODE_SERVER')}}",{ transports: ['websocket', 'polling', 'flashsocket'] });   
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-left",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    socket.on("receive-data",function(data){
      // console.log(data);
    });

    socket.on("confirm-end-room",function(data){
        swal.close();
        clearInterval(updateTimerEnd);
        clearInterval(updateTimerConfirm);

        // if(parseInt(data.user_id) == parseInt('{{Auth::user()->id}}')){

        //     swal({
        //         title: "Thông báo",
        //         text: "Bạn là người trúng giá phiên đấu giá này !. Nhấn xác nhận để thoát khỏi phòng !",
        //         icon: "success",
        //         buttons: [
        //             'Thoát',
        //             'Xác nhận!'
        //         ],
        //         }).then(function(isConfirm) {
        //         if (isConfirm) {
        //             window.location.href = '{{Route("home")}}';
        //         } else {
        //             window.location.href = '{{Route("home")}}';
        //         }
        //     });

        // }else{

         window.location.href = '{{Route("home")}}';

        // }

      
    });

    socket.on("send-room-socket",function(data){

        if(data.id_user == '{{Auth::user()->id_user}}'){

            toastr.success('Bạn vừa trả giá '  + new Intl.NumberFormat().format(data.price) + ' VNĐ' , 'Thông báo');

        }else{
            
            toastr.success(data.id_user + ' vừa trả giá '  + new Intl.NumberFormat().format(data.price) + ' VNĐ' , 'Thông báo');

        }

        @if(Auth::user()->role == 1)
            $('.box-history').prepend('<p style="text-align:center;">'+ data.id_user + ' vừa trả giá '  + new Intl.NumberFormat().format(data.price) + ' VNĐ </p>');
        @else
             $('.box-history').prepend('<p style="text-align:center;">'+ data.id_user + ' - ' + '<b>'+ data.username +'</b>'  +' vừa trả giá '  + new Intl.NumberFormat().format(data.price) + ' VNĐ </p>');
        @endif
        
         $('#bid-price-number').val(data.price);

         var current_price = parseInt($('#curent-price-number').val());

         if(current_price == data.price){
            
            $('.recovery-price').show();

         }else{

            $('#show-price-mts').text(new Intl.NumberFormat().format(data.price) + " VNĐ");
            $('#curent-price-number').val(data.price);
            $('.recovery-price').hide();

         }

      
     });

    $(document).ready(function(){
        
        var arr = {'id_user': '{{Auth::user()->id_user}}','id_room': '{{$data->mts}}','price':0};
        socket.emit("send-data",JSON.stringify(arr));

        $('.bid-price').click(function(){
            var offer_price = parseInt($('#bid-price-number').val());
            var current_price = parseInt($('#curent-price-number').val());
            var _token = '{{ csrf_token() }}' ;
            var mts = '{{$data->mts}}';
            var price_step = parseInt({{$data->price_step}});

            if( offer_price == 0 || offer_price == "undefined"){

                toastr.warning("Bạn hãy nhập vào số tiền để định giá !", 'Lỗi định giá');
            }else if((offer_price - current_price) % price_step != 0){

                 toastr.warning("Số tiền bạn đưa ra so với giá cao nhất phải có bước giá là bội số của " + new Intl.NumberFormat().format(price_step) +" !", 'Lỗi định giá');
            
            }else{

                if(offer_price > current_price){

                    $.ajax({
                        url: "{{Route('user.process-auction','offer_price')}}",
                        method: "post",
                        data:{offer_price:offer_price, current_price:current_price,mts:mts,_token:_token},
                        success: function(result){
                            if(result == "success"){
                                
                                $('#show-price-mts').text(new Intl.NumberFormat().format(offer_price) + " VNĐ");
                                $('#curent-price-number').val(offer_price);
                                var data = {'id_user': '{{Auth::user()->id_user}}','username':'{{Auth::user()->fullname}}','id_room': '{{$data->mts}}','price':offer_price};
                                socket.emit("send-data",JSON.stringify(data));
                            }
                           
                        }
                    });
                   
    
                }else{
    
                    toastr.warning("Giá bạn đưa ra phải cao hơn giá hiện tại !", 'Lỗi định giá');
    
                }
            }
           
        });

        $('.recovery-price').click(function(){
            var offer_price = parseInt($('#bid-price-number').val());
            var current_price = parseInt($('#curent-price-number').val());
            var _token = '{{ csrf_token() }}' ;
            var mts = '{{$data->mts}}';
            var price_step = parseInt({{$data->price_step}});

            if( offer_price == 0 || offer_price == "undefined"){

                toastr.warning("Bạn hãy nhập vào số tiền để rút giá !", 'Lỗi định giá');

            }else if(((current_price - offer_price ) % price_step != 0) && current_price > offer_price){

                 toastr.warning("Số tiền bạn đưa ra so với giá cao nhất phải có bước giá là bội số của " + new Intl.NumberFormat().format(price_step) +" !", 'Lỗi định giá');
            
            }else{

                if(current_price > offer_price  ){

                    $.ajax({
                        url: "{{Route('user.process-auction','recovery_price')}}",
                        method: "post",
                        data:{offer_price:offer_price, current_price:current_price,mts:mts,_token:_token},
                        success: function(result){
                            if(result == "success"){
                                
                                $('#show-price-mts').text(new Intl.NumberFormat().format(offer_price) + " VNĐ");
                                $('#curent-price-number').val(offer_price);
                                var data = {'id_user': '{{Auth::user()->id_user}}','username':'{{Auth::user()->fullname}}','id_room': '{{$data->mts}}','price':offer_price};
                                socket.emit("send-data",JSON.stringify(data));
                                
                            }else if(result == "error"){

                                toastr.warning("Giá rút của bạn phải lớn hơn giá của người thứ 2 !", 'Lỗi định giá');
                                 
                            }

                        }
                    });
                   
    
                }else{
    
                    toastr.warning("Giá rút phải nhỏ hơn giá hiện tại !", 'Lỗi định giá');
    
                }
            }
           
        });

    });
</script>

<script>

    var deadline = '{{ date('Y-m-d\TH:i',strtotime($data->end_time_bid))}}';

    function time_remaining(endtime) {
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      var days = Math.floor(t / (1000 * 60 * 60 * 24));
      return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
      };
    }

    function run_clock(id, endtime) {
      var clock = document.getElementById(id);

      // get spans where our clock numbers are held
      var days_span = clock.querySelector('.days');
      var hours_span = clock.querySelector('.hours');
      var minutes_span = clock.querySelector('.minutes');
      var seconds_span = clock.querySelector('.seconds');

      function update_clock() {
        var t = time_remaining(endtime);
        // update the numbers in each part of the clock
        days_span.innerHTML = t.days;
        hours_span.innerHTML = ('0' + t.hours).slice(-2);
        minutes_span.innerHTML = ('0' + t.minutes).slice(-2);
        seconds_span.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {

            clearInterval(timeinterval);
            days_span.innerHTML = '00';
            hours_span.innerHTML = '00';
            minutes_span.innerHTML = '00';
            seconds_span.innerHTML = '00';

            var mts = '{{$data->mts}}';
            var _token = '{{ csrf_token() }}' ;
            $('.recovery-price').attr('disabled', 'disabled');
            $('.bid-price').attr('disabled', 'disabled');

            $.ajax({
                url: "{{Route('user.process-auction','check_end_auction')}}",
                method: "post",
                data:{mts:mts,_token:_token},
                success: function(result){
                    if(result == "success"){
                        
                        swal({
                            title: "Thông báo",
                            text: "Bạn là người trả giá cao nhất cho phiên đấu giá này. Bạn có 5 phút để nhấn 'Xác nhận', nếu bạn không xác nhận người trúng giá là người thứ 2!,",
                            icon: "success",
                            buttons: [
                                'Hủy',
                                'Xác nhận!'
                            ],
                            dangerMode: true,
                            }).then(function(isConfirm) {
                            if (isConfirm) {

                                confirmPrice(mts);
                                socket.emit("end-room",mts);

                            } else {

                               clearInterval(updateTimerEnd);
                               clearInterval(updateTimerConfirm);
                               dissmissPrice(mts);

                            }
                        });
                            
                        setInterval(updateTimerConfirm, 1000);
                        
                    }else{

                        swal({
                            title: "Thông báo",
                            text: "Phiên đấu giá đã kết thúc, kết quả trả giá của phiên đấu giá sẽ được quyết định sau 5 phút khi người đấu giá cao nhất xác nhận trả giá !",
                            icon: "warning",
                            timer: 300000,
                            }).then(function(isConfirm) {
                            if (isConfirm) {

                                window.location.href = "{{Route('home')}}";

                            } else {

                                window.location.href = "{{Route('home')}}";
                            }

                        });
                        setInterval(updateTimerEnd, 1000);
                    }

                }
            });

        }

        if(t.days == 0 && t.hours == 0 && t.minutes == 5 && t.seconds == 0){

            toastr.error("Thời gian diễn ra phiên đấu giá còn lại 5 phút!", 'Thông báo',{fadeOut:3000});

        }


      }
      update_clock();
      var timeinterval = setInterval(update_clock, 1000);
    }

    function confirmPrice(mts){

            var _token = '{{ csrf_token() }}' ;
            $.ajax({
                url: "{{Route('user.process-auction','end_auction')}}",
                method: "post",
                data:{mts:mts,_token:_token}
            });
    }


    function dissmissPrice(mts){

            var _token = '{{ csrf_token() }}' ;
            $.ajax({
                url: "{{Route('user.process-auction','dissmiss_auction')}}",
                method: "post",
                data:{mts:mts,_token:_token},
                success: function(data){

                    socket.emit("dissmiss-room",{'id_room':mts,'user_id':data});
                        
                }
            });
        
    }

    run_clock('clockdiv', deadline);

     //Kiểm tra sau 5 phút không thao tác tự động đăng xuất
    var duration = 300; // duration timer in seconds
    var endduration = 300; // duration end timer in seconds

    setInterval(updateTimer, 1000);

    function updateTimer() {
        duration--;
        if (duration < 1) {
            window.location.href = "{{Route('logout-account')}}";
        } else if (duration < 11) {
            swal({
                title: "Cảnh báo",
                text: "Hệ thống nhận thấy bạn không thao tác với phòng đấu giá trong 5 phút qua, hệ thống sẽ tự động đăng xuất sau 10 s. Nhấn OK để xác nhận hủy !",
                icon: "error",
                timer: 10000,
                showConfirmButton: true
            });
            document.querySelector('.swal-text').innerText = "Hệ thống sẽ tự động đăng xuất sau " + formatTime(duration);
        }

    }

    function updateTimerEnd() {
        endduration--;
        if(endduration < 1){
            location.reload();
        }
        document.querySelector('.swal-text').innerText = "Phiên đấu giá đã kết thúc, kết quả trả giá của phiên đấu giá sẽ được quyết định sau " + formatTime(endduration) +" khi người đấu giá cao nhất xác nhận trả giá ! " ;

    }

    function updateTimerConfirm() {
        endduration--;
        if(endduration < 1){
            location.reload();
        }
        document.querySelector('.swal-text').innerText = "Bạn là người trả giá cao nhất cho phiên đấu giá này. Bạn có "+ formatTime(endduration) +" phút để nhấn OK xác nhận, nếu bạn không xác nhận người trúng giá là người thứ 2!"  ;

    }


    window.addEventListener("mousemove", resetTimer);

    function resetTimer() {
        duration = 300;
    }

    function formatTime(timeInSeconds) {
        var minutes = Math.floor(timeInSeconds / 60);
        var seconds = timeInSeconds % 60;
        if (minutes < 10) { minutes = "0" + minutes; }
        if (seconds < 10) { seconds = "0" + seconds; }
        return minutes + ":" + seconds;
    }

  </script>
  <style>
    .active-step {
        transition: 0.3s;
        background: green!important;
    }
</style>
@endsection