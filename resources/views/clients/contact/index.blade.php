@extends('clients.master')

@section('content')

    <div id="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Liên hệ</h1>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="map-box">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3110.046708036383!2d105.87992413412242!3d20.980992110757395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ae98a319d201%3A0x4c50fc8894b40ee8!2zQ8OUTkcgVFkgVMOCTiDEkOG6oEkgUEjDgVQ!5e0!3m2!1svi!2s!4v1624426128782!5m2!1svi!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form id="contact_form" action="{{Route('save-contact')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input type="text" class="name" name="name" placeholder="Họ và tên" value="" required>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input type="email" class="email" name="email" placeholder="Địa chỉ Email" value="" required>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="number" class="phone" name="phone" placeholder="Số điện thoại	" value="" required>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="message" class="message" name="message" placeholder="Viết tin nhắn" required></textarea>
                                </div>
                                {!! csrf_field() !!}
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                      <button type="submit" class="btn btn-warning">Gửi liên hệ <i class="fa fa-paper-plane"></i></button>
                                      <br>
                                      <br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="phone">
                            <h4>Số điện thoại</h4>
                            <span>+33 20966400 1342</span>
                        </div>
                        <div class="fax">
                            <h4>Fax</h4>
                            <span>+33 20966400 1342</span>
                        </div>
                        <div class="email">
                            <h4>Email</h4>
                            <a href="#">daugia@tandaiphat.com</a>
                        </div>
                        <div class="address">
                            <h4>Địa chỉ</h4>
                            <span>428 Lĩnh Nam, Trần Phú, Hoàng Mai, Hà Nội, Việt Nam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
 

@endsection