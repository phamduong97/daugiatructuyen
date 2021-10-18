@extends('clients.master')
@section('content')

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><i class="fa fa-gavel"></i> TẠO PHIÊN ĐẤU GIÁ</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>

<section class="who-is">
    <div class="container">
        <div class="tab-content" style="border: 1px solid #eee;padding:10px;box-shadow: 1px 8px 7px;">
                <form action="{{Route('user.update-auction')}}" class="row" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tên tài sản
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control" placeholder="Tên tài sản" id="asset_name" name="asset_name">
                        </div>
                        <div class="form-group">
                            <label>Giá khởi điểm
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="number" class="form-control money" id="price_start" name="price_start" placeholder="Nhập giá khởi điểm" min="100000"   autocomplete="off"  maxlength="20">
                            <div class="item"></div>
                        </div>
                        <div class="form-group">
                            <label>Thời gian mở đăng ký
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="datetime-local" class="form-control"  id="start_time_reg"  name="start_time_reg">
                        </div>
                        <div class="form-group">
                            <label>Thời gian kết thúc đăng ký:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="datetime-local" class="form-control" id="end_time_reg" name="end_time_reg">
                        </div>
                        <div class="form-group">
                            <label>Phí đăng ký tham gia đấu giá:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control money" placeholder="Phí đăng ký tham gia đấu giá" id="fee"  name="fee">
                        </div>
                        <div class="form-group">
                            <label>Bước giá:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control money" placeholder="Bước giá" id="price_step" name="price_step">
                        </div>
                        <div class="form-group">
                            <label>Số bước giá tối đa/ lần trả:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="number" class="form-control" min="1" max="1000" placeholder="Số bước giá tối đa/ lần trả" id="max_step" name="max_step">
                        </div>
                        <div class="form-group">
                            <label>Tiền đặt trước:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control money" placeholder="Tiền đặt trước" id="deposit" name="deposit">
                        </div>
                        <div class="form-group">
                            <label>Ảnh tiêu đề tài sản:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="file" class="form-control" id="img_title" accept=".jpg,.png,.gif" name="img_title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Phương thức đấu giá
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control" placeholder="Phương thức đấu giá" id="method" name="method">
                        </div>
                        <div class="form-group">
                            <label>Tên chủ tài sản:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control" placeholder="Tên chủ tài sản" id="owner" name="owner">
                        </div>
                        <div class="form-group">
                            <label>Nơi xem tài sản:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control" placeholder="Nơi xem tài sản"  id="place_asset" name="place_asset">
                        </div>
                        <div class="form-group">
                            <label>Thời gian xem tài sản:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control" placeholder="Thời gian xem tài sản" id="view_time" name="view_time">
                        </div>
                        <div class="form-group">
                            <label>Tổ chức đấu giá tài sản:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="text" class="form-control" placeholder="Tổ chức đấu giá tài sản" id="organization" name="organization">
                        </div>
                        <div class="form-group">
                            <label>Thời gian bắt đầu trả giá:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="datetime-local" class="form-control" id="start_time_bid" name="start_time_bid">
                        </div>
                        <div class="form-group">
                            <label>Thời gian kết thúc trả giá:
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="datetime-local" class="form-control" id="end_time_bid" name="end_time_bid">
                        </div>
                        <div class="form-group">
                            <label>Tài liệu liên quan
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="file" class="form-control" id="documents" name="documents[]" accept=".doc,.docx,.pdf" multiple>
                        </div>
                        <div class="form-group">
                            <label>Ảnh chi tiết tài sản
                                <b style="color: red;">*</b>
                            </label><br>
                            <input required type="file" class="form-control" accept=".jpg,.png,.gif" id="img_detail" name="img_detail[]" multiple>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                          <label>Danh mục tài sản
                              <b style="color: red;">*</b>
                          </label><br>
                          <select class="form-control" required name="id_cate" id="id_cate">
                              <option value="">Hãy chọn danh mục tài sản</option>
                              @foreach($cats as $v)
                                <option value="{{$v->id_cate}}">{{$v->name_cate}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Chi tiết tài sản:
                              <b style="color: red;">*</b>
                          </label><br>
                          <textarea rows="100" class="form-control" cols="80" id="description" name="description" required></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> LƯU</button>
                    </div>
                </form>
        </div>
    </div>

</section>
<script src="public/assets/js/time-picker/DateTimePicker.js"></script>
<script src="public/assets/js/time-picker/jquery-1.11.0.min.js"></script>
<script src="public/ckeditor/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- <script type="text/javascript" src="public/assets/js/simple.money.format.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript">

    function format_currency(e,value,el){
            var result = '';
            var valueArray = value.split('');
            var resultArray = [];
            var counter = 0;
            var temp = '';
            for (var i = valueArray.length - 1; i >= 0; i--) {
                temp += valueArray[i];
                counter++
                if(counter == 3){
                    resultArray.push(temp);
                    counter = 0;
                    temp = '';
                }
            };
            if(counter > 0){
                resultArray.push(temp);             
            }
            for (var i = resultArray.length - 1; i >= 0; i--) {
                var resTemp = resultArray[i].split('');
                for (var j = resTemp.length - 1; j >= 0; j--) {
                    result += resTemp[j];
                };
                if(i > 0){
                    result += ',';
                }
            };

            $(el).text(result);

    }


    $("#price_start").on('keydown change blur keypress',function (e) {
           format_currency($(this),$(this).val(),'.item');

    });

</script>


<script type="text/javascript">
  // $('.money').simpleMoneyFormat();

    CKEDITOR.replace( 'description', {
      filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
      filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
      filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
      filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
      filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
      filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    });
    
    
</script>

@if (Session::has('success'))
<script>
    $(document).ready(function() {
        swal({
            title: "Thêm mới thành công",
            text: "Tài sản đã được lưu vào CSDL!",
            type: "success",
            timer: 3000,
            showConfirmButton: false
        });
    });
</script>
@endif
@endsection
