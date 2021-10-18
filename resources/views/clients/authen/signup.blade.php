@extends('clients.master') @section('content')

<div class="authentication-panel">
    <div class="container">
        <div id="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Đăng ký tài khoản</h1>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" style="border: 1px solid #dddddd;">
                    <li class="active"><a style="padding: 10px 50px;" data-toggle="tab" href="#canhan">Cá nhân</a></li>
                    <li><a style="padding: 10px 50px;" data-toggle="tab" href="#phapnhan">Tổ chức</a></li>
                </ul>

                <div class="tab-content">

                    <div id="canhan" class="tab-pane fade in active">
                        <form id="form_personal" action="{{ Route('register-bidder-personal') }}"
                            method="post" enctype="multipart/form-data" class="panel-form-body"
                            style="border: 0.1px solid #2a2a2a36;margin-bottom: 50px;">
                            <div class="left-col" style="margin: 40px;">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="personalLabel">Họ và
                                            tên</span> <span style="color:red"> *</span></label>
                                    <div class="input-wrap row">
                                        <div class="col-sm-4">
                                            <input required type="text" tabindex="1" class="form-control input" name="FirstName"
                                                id="FirstName" placeholder="Họ">
                                             <br>
                                            @if ($errors->has('FirstName'))
                                                <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('FirstName') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <input required type="text" tabindex="1" class="form-control input" name="MiddleName"
                                                id="MiddleName" placeholder="Tên đệm">
                                                <br>
                                                @if ($errors->has('MiddleName'))
                                                    <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('MiddleName') }}</span>
                                                @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <input required type="text" tabindex="1" class="form-control input" name="LastName"
                                                id="LastName" placeholder="Tên">
                                             @if ($errors->has('LastName'))
                                                <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('LastName') }}</span>
                                             @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="">Số điện
                                            thoại</span> <span style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                          <input required type="text" tabindex="5" class="form-control input" name="phone_number"
                                            id="phone_number" placeholder="Nhập số điện thoại">
                                          <br>
                                          @if ($errors->has('phone_number'))
                                            <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('phone_number') }}</span>
                                         @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="">Địa chỉ
                                            email</span> <span style="color:red"> *</span></label>
                                    <div class="input-wrap ">
                                        <input required type="text" tabindex="6" class="form-control input register-email-input"
                                            name="email" id="email" placeholder="Nhập email"> <br>
                                            <br>
                                            @if ($errors->has('email'))
                                              <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('email') }}</span>
                                           @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label control-label-Novatic" for="pasword">Mật khẩu <span
                                            style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                           <input required type="password" tabindex="7" class="form-control input" name="password"
                                            id="password" placeholder="Tối thiểu 8 kí tự gồm ký tự viết hoa và số">
                                            <br>
                                            @if ($errors->has('password'))
                                              <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('password') }}</span>
                                           @endif
                                    </div>
                                </div>
                                <div id="userNameRegister" class="form-group ">
                                    <label class="control-label control-label-Novatic" for="pasword">Nhập lại mật khẩu
                                        <span style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                           <input required type="password" tabindex="8" class="form-control input"
                                            name="re_password" id="re_password"
                                            placeholder="Tối thiểu 8 kí tự gồm ký tự viết hoa và số">
                                            <br>
                                          @if ($errors->has('re_password'))
                                              <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('re_password') }}</span>
                                           @endif
                                    </div>
                                </div>

                                <div class="form-group" id="register_birthday">
                                    <label class="control-label control-label-Novatic" for="birthdate">
                                        Ngày Sinh <span style="color:red"> *</span>
                                    </label>
                                    <div class="input-wrap">
                                          <input required type="date" tabindex="18" class="form-control register input"
                                            name="birth" id="birth">
                                            <br>
                                          @if ($errors->has('birth'))
                                              <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('birth') }}</span>
                                           @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="personalLabel">Địa
                                            chỉ</span></label>
                                    <div class="input-wrap">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input required type="text" class="form-control" name="province" id="province"
                                                    placeholder="Tỉnh/Thành Phố">
                                                <br>
                                                @if ($errors->has('province'))
                                                   <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('province') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                   <input required type="text" class="form-control" name="district" id="district"
                                                    placeholder="Quận/Huyện">
                                                    <br>
                                                    @if ($errors->has('district'))
                                                       <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('district') }}</span>
                                                    @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <input required type="text" class="form-control" name="ward" id="ward"
                                                    placeholder="Xã/Phường">
                                                <br>
                                                @if ($errors->has('ward'))
                                                   <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('ward') }}</span>
                                                @endif    
                                            </div>
                                        </div>
                                        <br>
                                        <input required type="text" tabindex="15" class="form-control input " id="address"
                                            name="address" placeholder="Địa chỉ chi tiết">
                                       <br>
                                       @if ($errors->has('address'))
                                          <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('address') }}</span>
                                       @endif 

                                    </div>
                                </div>

                                <div style="padding-top:5px;margin-top:0px;" class="form-group cmtNovatic">
                                    <label class="control-label cntrol-label-Novatic">Giới tính</label>
                                    <div class="input-wrap">
                                        <select required id="gender" name="gender" class="form-control input">
                                            <option value="">Chọn giới tính</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                        <br>
                                        @if ($errors->has('gender'))
                                           <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('gender') }}</span>
                                        @endif 
                                    </div>
                                </div>

                                <div id="showOne" class="myDiv" style="display:block">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Số CMT/ Thẻ căn cước/ Hộ
                                            chiếu <span style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required type="text" class="form-control register input" name="idCard_number"
                                                id="IdCardNumber"
                                                placeholder="Nhập số CMT, số thẻ căn cước, số hộ chiếu">
                                             <br>
                                             @if ($errors->has('idCard_number'))
                                                <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('idCard_number') }}</span>
                                             @endif 
                                        </div>
                                    </div>

                                    <div class="form-group " style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Ngày cấp CMT/ Thẻ căn cước /
                                            Hộ
                                            chiếu<span style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required type="date" tabindex="18" class="form-control register input"
                                                name="idCard_grantedDate" id="IdCardGrantedDate">
                                             <br>
                                             @if ($errors->has('idCard_grantedDate'))
                                                <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('idCard_grantedDate') }}</span>
                                             @endif 
                                        </div>
                                    </div>

                                    <div class="form-group " style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Nơi cấp CMT/ Thẻ căn cước /
                                            Hộ
                                            chiếu<span style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required tabindex="20" type="text" class="form-control register input"
                                                name="idCard_GrantedPlace" id="IdCardGrantedPlace"
                                                placeholder="Nơi cấp CMT, số thẻ căn cước, số hộ chiếu">
                                             <br>
                                             @if ($errors->has('idCard_GrantedPlace'))
                                                <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('idCard_GrantedPlace') }}</span>
                                             @endif 
                                        </div>
                                    </div>
                                    <div class="form-group" style="height:240px">
                                        <label class="control-label control-label-Novatic"></label>
                                        <div id="imagePreview" class="input-wrap ">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div style="padding:0px !important" class="col-sm-12">
                                                        <label style="padding: 4px 0px;font-size:14px;font-weight: 600;"
                                                            class="col-sm-12 control-label">
                                                            Ảnh mặt trước
                                                        </label>
                                                        <div style="padding: 0px !important;display:none"
                                                            class="col-sm-6">
                                                            <input required tabindex="21" class="form-control" type="file"
                                                                onchange="UploadFileIdCardPhoto1(event)"
                                                                name="img_before" value="" id="img_before"
                                                                accept=".jpg,.png,.svg,.gif">
                                                                <br>
                                                                @if ($errors->has('img_before'))
                                                                   <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('img_before') }}</span>
                                                                @endif 
                                                        </div>

                                                    </div>
                                                    <div style="padding:5px 0px 0px" class="col-sm-12">
                                                        <img style="width:50%;height:50px ;border: 1px solid #00000026;height:auto; object-fit:cover;"
                                                            id="img_IdCardPhoto1Company" alt=""
                                                            src="public/assets/images/idcard-front.png">
                                                    </div>

                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div style="padding:0px !important" class="col-sm-12">
                                                        <label style="padding: 4px 0px;font-size:14px;font-weight: 600;"
                                                            class="col-sm-12 control-label">
                                                            Ảnh mặt sau
                                                        </label>
                                                        <div style="padding: 0px !important;display:none"
                                                            class="col-sm-6">
                                                            <input required tabindex="22" class="form-control" type="file"
                                                                name="img_after"
                                                                onchange="UploadFileIdCardPhoto2(event)" value=""
                                                                id="img_after" accept=".jpg,.png,.svg,.gif">
                                                                <br>
                                                                @if ($errors->has('img_after'))
                                                                   <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('img_after') }}</span>
                                                                @endif 
                                                        </div>

                                                    </div>
                                                    <div style="padding:5px 0px 0px" class="col-sm-12">
                                                        <img style="width:50%;height:50px;border: 1px solid #00000026;height:auto; object-fit:cover"
                                                            id="img_IdCardPhoto2Company" alt=""
                                                            src="public/assets/images/idcard-back.png">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Số tài khoản ngân hàng nhận
                                            hoàn tiền
                                            đặt trước (tài khoản của Cá nhân/ tổ chức đăng ký tham gia đấu giá)<span
                                                style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required tabindex="23" type="number" class="form-control register input"
                                                name="bankAccount_number" id="BankAccountNumber"
                                                placeholder="Số tài khoản ngân hàng nhận hoàn tiền đặt trước">
                                                <br>
                                                @if ($errors->has('bankAccount_number'))
                                                   <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('bankAccount_number') }}</span>
                                                @endif 
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Chọn ngân hàng<span
                                                style="color:red"> *</span></label>
                                        <div class="input-wrap input-wrap-select2">
                                            <select required name="bank_id" id="bank_id"
                                                class="form-control fill dataSelect  input-accountId select2-hidden-accessible"
                                                aria-hidden="true">
                                                <option value="">Chọn tên ngân hàng</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{ $bank->id_bank }}">{{ $bank->bank_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <br>
                                            @if ($errors->has('bank_id'))
                                               <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('bank_id') }}</span>
                                            @endif 
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Chi nhánh ngân hàng<span
                                                style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required tabindex="25" type="text" class="form-control register input"
                                                name="bankAccount_Branch" id="BankAccountBranch"
                                                placeholder="Chi nhánh ngân hàng">
                                                <br>
                                                @if ($errors->has('bankAccount_Branch'))
                                                   <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('bankAccount_Branch') }}</span>
                                                @endif 
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Tên chủ tài khoản ngân
                                            hàng<span style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required tabindex="25" type="text" class="form-control register input"
                                                name="bankAccount_Own" id="BankAccountOwn"
                                                placeholder="Tên chủ tài khoản">
                                                <br>
                                                @if ($errors->has('bankAccount_Own'))
                                                   <span style="color: red;font-size: 12px; font-weight: bold;font-style: italic;">{{ $errors->first('bankAccount_Own') }}</span>
                                                @endif 
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="input-wrap" style="padding-bottom:6px;font-size: 14px;">
                                        <input required type="checkbox" class="input" id="checkboxRegister"
                                            style="width:20px;height:20px"> Tôi cam kết tuân thủ
                                        <a style="color:#b41712"
                                            href="https://drive.google.com/drive/folders/1qV8rJr6sRUeM55ijDsxpPYUJwQ8UKweo?usp=sharing"
                                            target="_blank">Quyền và trách nhiệm của khách tham gia đấu giá</a>,
                                        <a style="color:#b41712"
                                            href="https://drive.google.com/drive/folders/1NFIqghij9Mk6BsOrTBbtesx7-xeslAk1?usp=sharing"
                                            target="_blank">Chính sách bảo mật thông tin khách hàng</a>,
                                        <a style="color:#b41712"
                                            href="https://drive.google.com/drive/folders/1oSLhYQCz9AJxlD6QqqmG2x5QFpcNSIwb?usp=sharing"
                                            target="_blank">Cơ chế giải quyết tranh chấp</a>,
                                        <a style="color:#b41712"
                                            href="https://drive.google.com/drive/folders/1RGAjjAUiIa9612_9VFwP9SqLLawe5RdV?usp=sharing"
                                            target="_blank">Quy chế hoạt động</a> tại website đấu giá trực tuyến <span
                                            style="color:#b41712">Tân Đại phát</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <button tabindex="34"
                                            style="margin-bottom: 20px !important;width: 180px;float:right"
                                            type="submit" id="register_personal"
                                            class="btn btn-info btn-block btn-register-submit Novatic-login">Đăng ký tài
                                            khoản</button>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </form>
                      
                        <script>
                            function readURL1(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#img_IdCardPhoto1Company').attr('src', e.target.result);
                                        $("#img_IdCardPhoto1Company").css("border", "1px solid #00000026");
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            function readURL2(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#img_IdCardPhoto2Company').attr('src', e.target.result);
                                        $("#img_IdCardPhoto2Company").css("border", "1px solid #00000026");
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            $(document).ready(function () {
                                $("#img_IdCardPhoto1Company").click(function () {
                                    $("#img_before").click();
                                });
                                $("#img_IdCardPhoto2Company").click(function () {
                                    $("#img_after").click();
                                });

                                $("#img_before").change(function () {
                                    readURL1(this);
                                });
                                $("#img_after").change(function () {
                                    readURL2(this);
                                });

                                $("#form_personal").validate({
                                    rules: {
                                        FirstName: "required",
                                        MiddleName: "required",
                                        LastName: "required"
                                        
                                    },
                                  
                                    messages: {
                                        FirstName: "Please enter your firstname",
                                        MiddleName: "Please enter your lastname",
                                        LastName: "Please enter your lastname",
                                        
                                    },
                                
                                    submitHandler: function(form) {
                                      form.submit();
                                    }
                                });
                            });
                        </script>

                    </div>

                    <div id="phapnhan" class="tab-pane fade">
                        <form id="form_organization" action="{{ Route('register-bidder-org') }}"
                            method="post" enctype="multipart/form-data" class="panel-form-body"
                            style="border: 0.1px solid #2a2a2a36;margin-bottom: 50px;">
                            <div class="left-col" style="margin: 40px;">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="personalLabel">Người
                                            đại diện theo pháp luật </span> <span style="color:red"> *</span></label>
                                    <div class="input-wrap row">
                                        <div class="col-sm-4">
                                            <input required   type="text" tabindex="1" class="form-control input" name="FirstName2"
                                                id="FirstName2" placeholder="Họ">
                                        </div>
                                        <div class="col-sm-4">
                                            <input required   type="text" tabindex="1" class="form-control input"
                                                name="MiddleName2" id="MiddleName2" placeholder="Tên đệm">
                                        </div>
                                        <div class="col-sm-4">
                                            <input required   type="text" tabindex="1" class="form-control input" name="LastName2"
                                                id="LastName2" placeholder="Tên">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="">Chức vụ của người
                                            đại diện </span> <span style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required   type="text" class="form-control input" name="position" id="position"
                                            placeholder="Chức vụ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="">Số điện
                                            thoại</span> <span style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required   type="text" tabindex="5" class="form-control input" name="phone_number2"
                                            id="phone_number2" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="">Địa chỉ
                                            email</span> <span style="color:red"> *</span></label>
                                    <div class="input-wrap ">
                                        <input required   type="text" tabindex="6" class="form-control input register-email-input"
                                            name="email2" id="email2" placeholder="Nhập email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label control-label-Novatic" for="pasword">Mật khẩu <span
                                            style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required   type="password" tabindex="7" class="form-control input" name="password2"
                                            id="password2" placeholder="Tối thiểu 8 kí tự gồm ký tự viết hoa và số">
                                    </div>
                                </div>
                                <div id="userNameRegister" class="form-group ">
                                    <label class="control-label control-label-Novatic" for="pasword">Nhập lại mật khẩu
                                        <span style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required   type="password" tabindex="8" class="form-control input"
                                            name="re_password2" id="re_password2"
                                            placeholder="Tối thiểu 8 kí tự gồm ký tự viết hoa và số">
                                    </div>
                                </div>

                                <div class="form-group" id="register_birthday">
                                    <label class="control-label control-label-Novatic" for="birthdate">
                                        Ngày Sinh <span style="color:red"> *</span>
                                    </label>
                                    <div class="input-wrap">
                                        <input required type="date" tabindex="18" class="form-control register input"
                                            name="birth2" id="birth2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label control-label-Novatic"><span class="personalLabel">Địa
                                            chỉ</span></label>
                                    <div class="input-wrap">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input required type="text" class="form-control" name="province2" id="province2"
                                                    placeholder="Tỉnh/Thành Phố">
                                            </div>
                                            <div class="col-sm-4">
                                                <input required type="text" class="form-control" name="district2" id="district2"
                                                    placeholder="Quận/Huyện">
                                            </div>
                                            <div class="col-sm-4">
                                                <input required type="text" class="form-control" name="ward2" id="ward2"
                                                    placeholder="Xã/Phường">
                                            </div>
                                        </div>
                                        <br>
                                        <input required type="text" tabindex="15" class="form-control input " id="address2"
                                            name="address2" placeholder="Địa chỉ chi tiết">

                                    </div>
                                </div>

                                <div style="padding-top:5px;margin-top:0px;" class="form-group cmtNovatic">
                                    <label class="control-label cntrol-label-Novatic">Giới tính</label>
                                    <div class="input-wrap">
                                        <select required id="gender2" name="gender2" class="form-control input">
                                            <option value="">Chọn giới tính</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="showOne" style="display:block">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Số CMT/ Thẻ căn cước/ Hộ
                                            chiếu <span style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required type="text" class="form-control register input" name="idCard_number2"
                                                id="IdCardNumber2"
                                                placeholder="Nhập số CMT, số thẻ căn cước, số hộ chiếu">
                                        </div>
                                    </div>

                                    <div class="form-group " style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Ngày cấp CMT/ Thẻ căn cước /
                                            Hộ
                                            chiếu<span style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required type="date" tabindex="18" class="form-control register input"
                                                name="idCard_grantedDate2" id="IdCardGrantedDate2">
                                        </div>
                                    </div>

                                    <div class="form-group " style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Nơi cấp CMT/ Thẻ căn cước /
                                            Hộ
                                            chiếu<span style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required tabindex="20" type="text" class="form-control register input"
                                                name="idCard_GrantedPlace2" id="IdCardGrantedPlace2"
                                                placeholder="Nơi cấp CMT, số thẻ căn cước, số hộ chiếu">
                                        </div>
                                    </div>
                                    <div class="form-group" style="height:240px">
                                        <label class="control-label control-label-Novatic"></label>
                                        <div id="imagePreview" class="input-wrap ">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div style="padding:0px !important" class="col-sm-12">
                                                        <label style="padding: 4px 0px;font-size:14px;font-weight: 600;"
                                                            class="col-sm-12 control-label">
                                                            Ảnh mặt trước
                                                        </label>
                                                        <div style="padding: 0px !important;display:none"
                                                            class="col-sm-6">
                                                            <input required tabindex="21" class="form-control" type="file"
                                                                onchange="UploadFileIdCardPhoto3(event)"
                                                                name="img_before2" value="" id="img_before2"
                                                                accept=".jpg,.png">
                                                        </div>

                                                    </div>
                                                    <div style="padding:5px 0px 0px" class="col-sm-12">
                                                        <img style="width:50%;height:50px ;border: 1px solid #00000026;height:auto; object-fit:cover;"
                                                            id="img_IdCardPhoto3Company" alt=""
                                                            src="public/assets/images/idcard-front.png">
                                                    </div>

                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div style="padding:0px !important" class="col-sm-12">
                                                        <label style="padding: 4px 0px;font-size:14px;font-weight: 600;"
                                                            class="col-sm-12 control-label">
                                                            Ảnh mặt sau
                                                        </label>
                                                        <div style="padding: 0px !important;display:none"
                                                            class="col-sm-6">
                                                            <input required tabindex="22" class="form-control" type="file"
                                                                name="img_after2"
                                                                onchange="UploadFileIdCardPhoto4(event)" value=""
                                                                id="img_after2" accept=".jpg,.png">
                                                        </div>

                                                    </div>
                                                    <div style="padding:5px 0px 0px" class="col-sm-12">
                                                        <img style="width:50%;height:50px;border: 1px solid #00000026;height:auto; object-fit:cover"
                                                            id="img_IdCardPhoto4Company" alt=""
                                                            src="public/assets/images/idcard-back.png">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Số tài khoản ngân hàng nhận
                                            hoàn tiền
                                            đặt trước (tài khoản của Cá nhân/ tổ chức đăng ký tham gia đấu giá)<span
                                                style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required tabindex="23" type="number" class="form-control register input"
                                                name="bankAccount_number2" id="BankAccountNumber2"
                                                placeholder="Số tài khoản ngân hàng nhận hoàn tiền đặt trước">
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Chọn ngân hàng<span
                                                style="color:red"> *</span></label>
                                        <div class="input-wrap input-wrap-select2">
                                            <select required name="bank_id2" id="bank_id2"
                                                class="form-control fill dataSelect  input-accountId select2-hidden-accessible"
                                                aria-hidden="true">
                                                <option value="">Chọn tên ngân hàng</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{ $bank->id_bank }}">{{ $bank->bank_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Chi nhánh ngân hàng<span
                                                style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required tabindex="25" type="text" class="form-control register input"
                                                name="bankAccount_Branch2" id="BankAccountBranch2"
                                                placeholder="Chi nhánh ngân hàng">
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label class="control-label control-label-Novatic">Tên chủ tài khoản ngân
                                            hàng<span style="color:red"> *</span></label>
                                        <div class="input-wrap">
                                            <input required tabindex="25" type="text" class="form-control register input"
                                                name="bankAccount_Own2" id="BankAccountOwn2"
                                                placeholder="Tên chủ tài khoản">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group form-row">
                                    <label class="control-label control-label-Novatic">Tên tổ chức<span
                                            style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required type="text" tabindex="26" class="form-control input" name="name_company2"
                                            id="name_company2" placeholder="Tên doanh nghiệp">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="control-label control-label-Novatic">Mã số doanh nghiệp/Mã số
                                        thuế<span style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required type="number" class="form-control input" name="tax_code2" id="tax_code2"
                                            placeholder="Mã số thuế">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="control-label control-label-Novatic">Ngày cấp Mã số doanh nghiệp/Mã số
                                        thuế<span style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required type="date" tabindex="29" class="form-control input"
                                            name="date_code_company2" id="date_code_company2">
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <label class="control-label control-label-Novatic">Nơi cấp mã số doanh nghiệp/Mã số
                                        thuế<span style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required type="text" tabindex="30" class="form-control input"
                                            name="place_code_company2" id="place_code_company2"
                                            placeholder="Nơi cấp mã số doanh nghiệp/Mã số thuế">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="control-label control-label-Novatic">Địa chỉ tổ chức<span
                                            style="color:red"> *</span></label>
                                    <div class="input-wrap">
                                        <input required type="text" tabindex="31" class="form-control input"
                                            name="address_company2" id="address_company2"
                                            placeholder="Địa chỉ doanh nghiệp">
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <label class="control-label control-label-Novatic">Tải lên giấy chứng nhận đăng ký
                                        kinh doanh (định dạng .pdf, .doc, .docx)<span style="color:red">
                                            *</span></label>
                                    <div class="input-wrap">
                                        <input required type="file" onchange="UploadCompanyFile(event)" accept=".doc,.docx,.pdf"
                                            class="form-control input" name="fileupload_company"
                                            id="fileupload_company">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-wrap" style="padding-bottom:6px;font-size: 14px;">
                                        <input required type="checkbox" class="input" id="checkboxRegister2"
                                            style="width:20px;height:20px"> Tôi cam kết tuân thủ
                                        <a style="color:#b41712"
                                            href="https://drive.google.com/drive/folders/1qV8rJr6sRUeM55ijDsxpPYUJwQ8UKweo?usp=sharing"
                                            target="_blank">Quyền và trách nhiệm của khách tham gia đấu giá</a>,
                                        <a style="color:#b41712"
                                            href="https://drive.google.com/drive/folders/1NFIqghij9Mk6BsOrTBbtesx7-xeslAk1?usp=sharing"
                                            target="_blank">Chính sách bảo mật thông tin khách hàng</a>,
                                        <a style="color:#b41712"
                                            href="https://drive.google.com/drive/folders/1oSLhYQCz9AJxlD6QqqmG2x5QFpcNSIwb?usp=sharing"
                                            target="_blank">Cơ chế giải quyết tranh chấp</a>,
                                        <a style="color:#b41712"
                                            href="https://drive.google.com/drive/folders/1RGAjjAUiIa9612_9VFwP9SqLLawe5RdV?usp=sharing"
                                            target="_blank">Quy chế hoạt động</a> tại website đấu giá trực tuyến <span
                                            style="color:#b41712">Tân Đại phát</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <button tabindex="34"
                                            style="margin-bottom: 20px !important;width: 180px;float:right"
                                            type="submit" id="register_org"
                                            class="btn btn-info btn-block btn-register-submit Novatic-login">Đăng ký tài
                                            khoản</button>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </form>

                        <script>
                            function readURL3(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#img_IdCardPhoto3Company').attr('src', e.target.result);
                                        $("#img_IdCardPhoto3Company").css("border", "1px solid #00000026");
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            function readURL4(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#img_IdCardPhoto4Company').attr('src', e.target.result);
                                        $("#img_IdCardPhoto4Company").css("border", "1px solid #00000026");
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            $(document).ready(function () {
                                $("#img_IdCardPhoto3Company").click(function () {
                                    $("#img_before2").click();
                                });
                                $("#img_IdCardPhoto4Company").click(function () {
                                    $("#img_after2").click();
                                });

                                $("#img_before2").change(function () {
                                    readURL3(this);
                                });
                                $("#img_after2").change(function () {
                                    readURL4(this);
                                });
                            });
                        </script>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="public/assets/js/jquery.validate.min.js"></script>
    <script src="public/assets/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        function UploadCompanyFile(e) {
            var file = e.target.files[0];
            if (file.size < parseInt("52428800")) {
                if (!["doc", "docx", "pdf"].includes(e.target.files[0].name.split(".")[e.target.files[0].name.split(".")
                        .length - 1].toLowerCase())) {
                    swal({
                        title: 'Tệp tải lên không hợp lệ, vui lòng kiểm tra lại!',
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK'
                    }, function () {
                        $("#fileupload-company").val("");
                    });
                }
            } else {
                swal({
                    title: 'Tệp tải lên tối đa là 50Mb, vui lòng kiểm tra lại !',
                    icon: 'info',
                    showCancelButton: false,
                    confirmButtonText: 'OK'
                }, function () {
                    $("#fileupload-company").val("");
                });
            }
        }
    </script>

    @if(Session::has('success'))
        <script>
            $(document).ready(function () {
                swal({
                    title: "Thêm mới thành công",
                    text: "Tài khoản của bạn đăng ký thành công. Bạn sẽ nhận được email xác nhận đăng ký tài khoản, chúng tôi sẽ xác nhận tài khoản của bạn sớm nhất !",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
    @endsection