@extends('clients.master') @section('content')

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>THÔNG TIN CÁ NHÂN</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>

<section class="who-is">
    <div class="container">

       <div class="tab-content" style="border: 1px solid #eee;padding:10px;box-shadow: 1px 8px 7px;">
           <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#1">Thông tin</a></li>
                <li><a data-toggle="tab" href="#2">Đổi mật khẩu</a></li>
            </ul>

            <div class="tab-content all">
                <div id="1" class="tab-pane fade in active" style="padding: 10px;    border: 1px solid #ddd;">
                    @if($data->is_vertified == 0)
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Tài khoản của bạn chưa được xác thực. Vui lòng chờ xác nhận từ chúng tôi đến khi tài khoản được xác thực, bạn mới có thể tham gia đăng ký đấu giá!</strong>
                    </div>
                    @endif
                    <form action="" style="padding-bottom: 250px;">


                        <div class="col-lg-6">
                            <div>
                                <scan>Email
                                    <scan style="color: red;">*</scan>
                                </scan><br>
                                <input type="email" class="form-control" value="{{$data->email}}" id="email">
                                <div style="color:red;" class="form1"></div>
                            </div>
                            <div>
                                <scan>Họ tên
                                    <scan style="color: red;">*</scan>
                                </scan><br>
                                <input type="text" class="form-control" id="name" value=" {{$data->fullname}}">
                                <div style="color:red;" class="form2"></div>
                            </div>
                            <div>
                                <scan>Ngày sinh
                                    <scan style="color: red;">*</scan>
                                </scan><br>
                                <input type="date" class="form-control" id="birthday" value="{{$data->birth}}">
                                <div style="color:red;" class="form3"></div>
                            </div>
                            <div>
                                <scan>Số điện thoại (Nên sử dụng số di động để nhận tin nhắn thông báo khi cần thiết)
                                    <scan style="color: red;">*</scan>
                                </scan><br>
                                <input type="number" class="form-control" id="phone" value="{{$data->phone}}">
                                <div style="color:red;" class="form4"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <scan>Số CMND/CCCD
                                    <scan style="color: red;">*</scan>
                                </scan><br>
                                <input type="number" class="form-control" value="{{$data->cmnd}}" id="cmnd">
                                <div style="color:red;" class="form5"></div>
                            </div>
                            <div>
                                <scan>Ngày cấp CMND/CCCD
                                    <scan style="color: red;">*</scan>
                                </scan><br>
                                <input type="date" class="form-control" value="{{$data->date_range}}" id="DateRange">
                                <div style="color:red;" class="form6"></div>
                            </div>
                            <div>
                                <scan>Nơi cấp CMND/CCCD
                                    <scan style="color: red;">*</scan>
                                </scan><br>
                                <input type="text" class="form-control" value="{{$data->place_range}}" id="IssuedBy">
                                <div style="color:red;" class="form7"></div>
                            </div>
                            <div>
                                <scan>Địa chỉ
                                    <scan style="color: red;">*</scan>
                                </scan><br>
                                <input type="text" class="form-control" value="{{$data->address}}" id="address">
                                <div style="color:red;" class="form8"></div>
                            </div>
                        </div>

                    </form>
                    <div>
                        <button type="button" class="btn btn-success" onclick="KiemTra()" style="margin-left: 15px;">CẬP NHẬT</button>
                    </div>
                </div>


                <div id="2" class="tab-pane fade in fate" style="padding: 10px;    border: 1px solid #ddd;">
                    <form action="">
                        <div class="form-group">
                            <scan>Mật khẩu cũ
                                <scan style="color: red;">*</scan>
                            </scan><br>
                            <input type="password" class="form-control" id="pwd1" name="pwd1">
                            <div style="color:red;" class="form9"></div>
                        </div>
                        <div class="form-group">
                            <scan>Mật khẩu mới
                                <scan style="color: red;">*</scan>
                            </scan><br>
                            <input type="password" placeholder="Mật khẩu phải chứa ít nhất 1 chữ hoa, 1 chữ thường, 1 chữ số và có độ dài trên 8 ký tự" class="form-control" id="pwd2" name="pwd2">
                            <div style="color:red;" class="form10"></div>
                        </div>

                        <div class="form-group">
                            <scan>Xác nhận mật khẩu mới
                                <scan style="color: red;">*</scan>
                            </scan><br>
                            <input type="password" class="form-control" id="pwd3" name="pwd3">
                            <div style="color:red;" class="form11"></div>
                        </div>
                        <button type="button" onclick="KiemTraPwd()" class="btn btn-success">CẬP NHẬT</button>
                    </form>
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
<script type="text/javascript">
    function KiemTra() {
        var email = document.getElementById("email").value;
        var name = document.getElementById("name").value;
        var birthday = document.getElementById("birthday").value;
        var phone = document.getElementById("phone").value;
        var cmnd = document.getElementById("cmnd").value;
        var daterange = document.getElementById("DateRange").value;
        var issueby = document.getElementById("IssuedBy").value;
        var address = document.getElementById("address").value;
        var err = false;

        if (email == "") {
            document.getElementsByClassName("form1")[0].innerText = "Hãy nhập vào Email";
            err = true;
        } else if (!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            document.getElementsByClassName("form1")[0].innerText = "Hãy nhập vào Email đúng định dạng";
            err = true;
        } else {
            document.getElementsByClassName("form1")[0].style.display = "none";
        }


        if (name == "") {
            document.getElementsByClassName("form2")[0].innerText = "Hãy nhập vào đầy đủ họ tên";
            err = true;
        } else {
            document.getElementsByClassName("form2")[0].style.display = "none";
        }

        if (birthday == "") {
            document.getElementsByClassName("form3")[0].innerText = "Hãy nhập vào đầy đủ ngày sinh";
            err = true;
        } else {
            document.getElementsByClassName("form3")[0].style.display = "none";
        }


        if (phone == "") {
            document.getElementsByClassName("form4")[0].innerText = "Hãy nhập vào số điện thoại đủ 10 số";
            err = true;
        } else if (!phone.match(/(84|0[3|5|7|8|9])+([0-9]{8})\b/g)) {
            document.getElementsByClassName("form4")[0].innerText = "Hãy nhập vào số điện thoại đúng định dạng";
            err = true;
        } else {
            document.getElementsByClassName("form4")[0].style.display = "none";
        }


        if (cmnd == "" || cmnd.length != 12) {
            document.getElementsByClassName("form5")[0].innerText = "Hãy nhập vào số cmnd đủ 12 số";
            err = true;
        } else {
            document.getElementsByClassName("form5")[0].style.display = "none";
        }


        if (daterange == "") {
            document.getElementsByClassName("form6")[0].innerText = "Hãy nhập vào ngày cấp CMND/CCCD";
            err = true;
        } else {
            document.getElementsByClassName("form6")[0].style.display = "none";
        }


        if (issueby == "") {
            document.getElementsByClassName("form7")[0].innerText = "Hãy nhập vào nơi cấp CMND/CCCD";
            err = true;
        } else {
            document.getElementsByClassName("form7")[0].style.display = "none";
        }


        if (address == "") {
            document.getElementsByClassName("form8")[0].innerText = "Hãy nhập vào địa chỉ";
            err = true;
        } else {
            document.getElementsByClassName("form8")[0].style.display = "none";
        }



        if (err == false) alert("Cập nhật thành công !")
    };


    function KiemTraPwd() {
        var oldpass = document.getElementById("pwd1").value;
        var newpass = document.getElementById("pwd2").value;
        var repass = document.getElementById("pwd3").value;
        var err = false;
        if (oldpass == "") {
            document.getElementsByClassName("form9")[0].innerText = "Hãy nhập vào mật khẩu cũ";
            err = true;
        } else {
            document.getElementsByClassName("form9")[0].style.display = "none";
        }


        if (newpass == "") {
            document.getElementsByClassName("form10")[0].innerText = "Hãy nhập vào mật khẩu mới";
            err = true;
        } else if (!newpass.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)) {
            document.getElementsByClassName("form10")[0].innerText = "Hãy nhập vào mật khẩu đúng định dạng (Mật khẩu phải chứa ít nhất 1 chữ hoa, 1 chữ thường, 1 chữ số và có độ dài trên 8 ký tự)";
            err = true;
        } else {
            document.getElementsByClassName("form10")[0].style.display = "none";
        }

        if (repass == "") {
            document.getElementsByClassName("form11")[0].innerText = "Hãy nhập lại mật khẩu mới";
            err = true;
        } else if (repass != newpass) {
            document.getElementsByClassName("form11")[0].innerText = "Mật khẩu không khớp";
            err = true;
        } else {
            document.getElementsByClassName("form11")[0].style.display = "none";
        }


        if (err == false) alert("Đổi mật khẩu thành công");

    };
</script>

@endsection