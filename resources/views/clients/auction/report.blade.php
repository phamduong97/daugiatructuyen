@extends('clients.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><i class="fa fa-file"></i> Biên bản đấu giá</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>

<section class="who-is">
    <div class="container">

        <div class="tab-content" style="border: 1px solid #eee;padding:10px;box-shadow: 1px 8px 7px;">
            <b>{{ $auction->mts .' - '.  $auction->asset_name }}</b>
            <hr>

            <div class="panel-document">
               <div style="text-align: center;">
                <p><strong>CỘNG HO&Agrave; X&Atilde; HỘI CHỦ NGHĨA VIỆT NAM</strong></p>

                <p><strong>Độc lập - Tự do - Hạnh ph&uacute;c</strong></p>
                <br>
                <p><strong>BI&Ecirc;N BẢN ĐẤU GI&Aacute; T&Agrave;I SẢN</strong></p>

                <p><strong>Số: &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</strong></p>

                <p>&nbsp;</p>
            </div>

                <p><em>Căn cứ Bộ luật d&acirc;n sự được Quốc hội kh&oacute;a XI nước Cộng h&ograve;a x&atilde; hội chủ
                        nghĩa
                        Việt Nam th&ocirc;ng qua ng&agrave;y 24/11/2015;</em></p>

                <p><em>Căn cứ Luật đấu gi&aacute; t&agrave;i sản số 01/2016/QH14 ng&agrave;y 17 th&aacute;ng 11 năm
                        2016;</em></p>

                <p><em>Căn cứ Nghị định số 62/2017/NĐ-CP ng&agrave;y 16 th&aacute;ng 5 năm 2017 quy định chi tiết một số
                        điều v&agrave; biện ph&aacute;p thi h&agrave;nh Luật đấu gi&aacute; t&agrave;i sản; </em></p>

                <p><a name="_Hlk17176658"><em>Căn cứ Hợp đồng dịch vụ đấu gi&aacute; t&agrave;i sản số
                        </em></a><em>&hellip;&hellip;&hellip;&hellip;..</em><em> </em><em>ng&agrave;y</em><em>
                    </em><em>&hellip;&hellip;&hellip;..</em><em> </em><em>giữa C&ocirc;ng ty Đấu gi&aacute; hợp danh
                        T&acirc;n Đại Ph&aacute;t v&agrave; </em><em>&hellip;&hellip;&hellip;&hellip;,</em></p>

                <p>H&ocirc;m nay, vào h&ocirc;̀i &hellip;&hellip;&hellip; ng&agrave;y &hellip;. th&aacute;ng
                    &hellip;&hellip; năm 2021, C&ocirc;ng ty Đấu gi&aacute; Hợp danh T&acirc;n Đại Ph&aacute;t tổ chức
                    cuộc
                    đấu gi&aacute; t&agrave;i sản, cụ thể như sau:</p>

                <p><a name="_Hlk42330337"><strong>T&ecirc;n t&agrave;i sản</strong></a><strong>:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>

                <p><strong>Gi&aacute; khởi điểm&nbsp;:
                        ....................................................................................
                    </strong>&nbsp;<a name="_Hlk52738580"></a></p>

                <p><strong>Nguồn gốc t&agrave;i sản:
                    </strong>................................................................................</p>

                <p><strong>H&igrave;nh thức đấu gi&aacute;:</strong> Đấu gi&aacute; trực tiếp qua Trang th&ocirc;ng tin
                    điện
                    tử đấu gi&aacute; trực tuyến (địa chỉ: <a href="http://daugiatructuyenvietnam.com//">http://daugiatructuyenvietnam.com//</a>)
                </p>

                <p><strong>Phương thức đấu gi&aacute;</strong>: Phương thức trả gi&aacute; l&ecirc;n.</p>

                <p><strong>I.&nbsp; </strong><strong>Th&agrave;nh phần tham dự</strong><strong>&nbsp;&nbsp; </strong>
                </p>

                <p><strong>1</strong><strong>.</strong><strong> </strong><strong>Kh&aacute;ch mời chứng
                        kiến</strong><strong>: </strong></p>

                <p><strong>Đơn vị c&oacute; tài sản đ&acirc;́u gi&aacute;: </strong><a
                        name="_Hlk45028262">..................................................................... </a>
                </p>

                <p>&Ocirc;ng/B&agrave;:
                    &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Chức vụ: &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</p>

                <p>&Ocirc;ng/B&agrave;:
                    &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Chức vụ: &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</p>

                <p><strong>2. Đơn vị tổ chức đấu gi&aacute;: </strong>C&ocirc;ng ty Đấu gi&aacute; hợp danh T&acirc;n
                    Đại
                    Ph&aacute;t</p>

                <p>&Ocirc;ng: L&ecirc; B&aacute; Th&agrave;nh
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chức
                    vụ: Gi&aacute;m đốc C&ocirc;ng ty/Đấu gi&aacute; vi&ecirc;n.</p>

                <p>(<em>Số chứng chỉ h&agrave;nh nghề:283/TP/ĐG-CCHN do Bộ Tư ph&aacute;p cấp ng&agrave;y 20/6/2011; Số
                        thẻ
                        đấu gi&aacute; vi&ecirc;n: 242/ĐGV do Sở Tư ph&aacute;p th&agrave;nh phố H&agrave; Nội cấp
                        ng&agrave;y 22/8/2019 )</em></p>

                <p>B&agrave;: B&ugrave;i Thị Thương
                    Huyền&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Chức vụ: Thư k&yacute;</p>

                <p><em><strong>3. Người tham gia đấu gi&aacute;:</strong> &hellip;.. kh&aacute;ch h&agrave;ng <a
                            name="_Hlk42276585">(</a>theo danh s&aacute;ch đ&iacute;nh k&egrave;m)</em></p>

                <p>C&oacute; mặt: &hellip;. kh&aacute;ch h&agrave;ng.&nbsp;</p>

                <p><em>Vắng mặt: &hellip;. kh&aacute;ch h&agrave;ng.&nbsp; </em></p>

                <p><em><strong>II. Diễn biến cụ thể của cuộc đấu gi&aacute;</strong></em></p>

                <p><strong>1. </strong><strong>Thủ tục chuẩn bị cuộc đấu gi&aacute; </strong></p>

                <p>* <strong>Trước thời điểm bắt đầu tiến h&agrave;nh đấu gi&aacute;</strong><strong>, </strong>Đấu
                    gi&aacute; vi&ecirc;n v&agrave; thư k&yacute; hỗ trợ kỹ thuật tiến h&agrave;nh mở trang điện tử đấu
                    gi&aacute; trực tuyến <a href="http://daugiatructuyenvietnam.com//">http://daugiatructuyenvietnam.com/</a>.</p>

                <p>* Đấu gi&aacute; vi&ecirc;n v&agrave; thư k&yacute; hỗ trợ kỹ thuật tiến h&agrave;nh kiểm tra kỹ
                    thuật hệ
                    thống đấu gi&aacute; trực tuyến về: thiết bị, kết nối internet,&hellip;</p>

                <p><strong>2. Diễn biến cụ thể:</strong></p>

                <p>Bắt đầu từ&nbsp; .... giờ .... ph&uacute;t, ng&agrave;y .... th&aacute;ng .... năm .... bắt đầu cuộc
                    đấu
                    gi&aacute; trực tuyến tr&ecirc;n Trang th&ocirc;ng tin điện tử đấu gi&aacute; trực tuyến <a
                        href="http://daugiatructuyenvietnam.com//">http://daugiatructuyenvietnam.com//</a></p>

                <p>Đấu gi&aacute; vi&ecirc;n v&agrave; thư k&yacute; kỹ thuật theo d&otilde;i tr&ecirc;n hệ thống đấu
                    gi&aacute; trực tuyến đảm bảo diễn biến cuộc đấu gi&aacute; theo đ&uacute;ng quy định của
                    ph&aacute;p
                    luật v&agrave; Quy chế cuộc đấu gi&aacute;.</p>

                <p><em>Lịch sử trả gi&aacute; của người tham gia đấu gi&aacute; được tr&iacute;ch xuất theo phụ lục
                        đ&iacute;nh k&egrave;m Bi&ecirc;n bản n&agrave;y.</em></p>

                <p>Tại thời điểm .... giờ .... ph&uacute;t, ng&agrave;y .... th&aacute;ng .... năm .... cuộc đấu
                    gi&aacute;
                    kết th&uacute;c, Đấu gi&aacute; vi&ecirc;n x&aacute;c định:</p>

                <p>* Mức gi&aacute; trả cao nhất được x&aacute;c định l&agrave; gi&aacute; tr&uacute;ng đấu gi&aacute;
                    l&agrave;: .............................</p>

                <p>* Thời điểm hệ thống đấu gi&aacute; trực tuyến ghi nhận gi&aacute; tr&uacute;ng đấu gi&aacute;
                    l&agrave;:
                    .... giờ .... ph&uacute;t, ng&agrave;y .... th&aacute;ng .... năm ....</p>

                <p>* Người tr&uacute;ng đấu gi&aacute; l&agrave;: <a
                        name="_Hlk55052492">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</a>
                </p>

                <p>- Địa chỉ:
                    &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..
                </p>

                <p>- CMND số:
                    &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.
                </p>

                <p>- M&atilde; số tham gia đấu gi&aacute;:
                    &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</p>

                <p>Với gi&aacute; đ&atilde; trả
                    l&agrave;:&nbsp;....................................................................................
                </p>

                <p><em>Cuộc đấu gi&aacute; kết th&uacute;c v&agrave;o l&uacute;c .......... c&ugrave;ng&nbsp;
                        ng&agrave;y.
                        C&aacute;c b&ecirc;n c&ugrave;ng thống nhất k&yacute; t&ecirc;n./.</em></p>

                <div style="text-align: center;">
                    <table cellspacing="0" style="border-collapse:collapse; width:109.06%;">
                        <tbody>
                            <tr>
                                <td style="vertical-align:top; width:45%;">
                                    <p><strong>Người c&oacute; t&agrave;i sản đấu gi&aacute;</strong><br />
                                        (K&yacute;, ghi r&otilde; họ t&ecirc;n)</p>
                                </td>
                                <td style="vertical-align:top; width:54%;">
                                    <p><strong>Người tr&uacute;ng đấu gi&aacute;</strong></p>
    
                                    <p>(K&yacute;, ghi r&otilde; họ t&ecirc;n)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
    
                    <p>&nbsp;</p>
    
                    <p>&nbsp;</p>
    
    
                    <table cellspacing="0" style="border-collapse:collapse; width:109.06%">
                        <tbody>
                            <tr>
                                <td style="vertical-align:top; width:0%">
                                    <p>&nbsp;</p>
                                </td>
                                <td style="vertical-align:top; width:45%">
                                    <p><strong>Đấu gi&aacute; vi&ecirc;n</strong><br />
                                        (K&yacute;, ghi r&otilde; họ t&ecirc;n)</p>
    
                                    <p>&nbsp;</p>
    
                                    <p>&nbsp;</p>
    
                                    <p>&nbsp;</p>
    
                                    <p>&nbsp;</p>
    
                                    <p><strong>L&ecirc; B&aacute; Th&agrave;nh</strong></p>
                                </td>
                                <td style="vertical-align:top; width:54%">
                                    <p><strong>Người ghi bi&ecirc;n bản</strong><br />
                                        (K&yacute;, ghi r&otilde; họ t&ecirc;n)</p>
    
                                    <p>&nbsp;</p>
    
                                    <p>&nbsp;</p>
    
                                    <p>&nbsp;</p>
    
                                    <p>&nbsp;</p>
    
                                    <p><strong>B&ugrave;i Thị Thương Huyền</strong></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>


@endsection