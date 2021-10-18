@extends('admin.master')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cài đặt blog </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
              <li class="breadcrumb-item active">Cài đặt blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-cog"></i> Cài đặt blog</h3> 
                </div>
                <form class="card-body" method="post" action="{{Route('admin.save_settings')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="id_user" value="{{config('app.user_id')}}">
                  <!-- Color Picker -->
                  <div class="form-group">
                    <label>Màu menu:</label>
                      <div class="input-group my-colorpicker1 colorpicker-element" data-colorpicker-id="1">
                         <input type="text" value="{{ isset($data->menu_color) ? $data->menu_color : '#262626'}}" class="form-control colorpicker-element" name="menu_color" data-original-title="" title="">
                         <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-square" style="{{isset($data->menu_color) ? $data->menu_color : '#262626'}};"></i></span>
                        </div>
                      </div>
                  </div>
                  <!-- /.form group -->

                  <!-- Color Picker -->
                  <div class="form-group">
                    <label>Màu body:</label>

                    <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                      <input type="text" value="{{ isset($data->body_color) ? $data->body_color : '#fff'}}" name="body_color" class="form-control" data-original-title="" title="">

                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-square" style="color: {{ isset($data->body_color) ? $data->body_color : '#fff'}};"></i></span>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->

                  <!-- Color Picker -->
                  <div class="form-group">
                    <label>Màu footer:</label>
                    <div class="input-group my-colorpicker3 colorpicker-element" data-colorpicker-id="3">
                      <input type="text" class="form-control colorpicker-element" name="footer_color" value="{{ isset($data->footer_color) ? $data->footer_color : '#262626'}}"  data-original-title="" title="">
                       <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-square" style="color: {{ isset($data->footer_color) ? $data->footer_color : '#262626'}};"></i></span>
                      </div>
                    </div>
                  </div>

                  <!-- time Picker -->
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Facebook:</label>

                      <div class="input-group date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" value="{{ isset($data->facebook) ? $data->facebook : ''}}" name="facebook" >
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fab fa-facebook"></i></div>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>

                   <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Google:</label>

                      <div class="input-group date" data-target-input="nearest">
                        <input type="text" value="{{ isset($data->google) ? $data->google : ''}}"  class="form-control datetimepicker-input" name="google" >
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fab fa-google-plus-g"></i></div>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Instagram:</label>

                      <div class="input-group date" data-target-input="nearest">
                        <input type="text" value="{{ isset($data->instagram) ? $data->instagram : ''}}"  class="form-control datetimepicker-input" name="instagram" >
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fab fa-instagram"></i></div>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Twitter:</label>

                      <div class="input-group date" data-target-input="nearest">
                        <input type="text" value="{{ isset($data->twitter) ? $data->twitter : ''}}"  class="form-control datetimepicker-input" name="twitter">
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Youtube:</label>

                      <div class="input-group date" data-target-input="nearest">
                        <input type="text" value="{{ isset($data->youtube) ? $data->youtube : ''}}"  class="form-control datetimepicker-input" name="youtube">
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fab fa-youtube"></i></div>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>

                  <button type="submit" class="btn btn-primary">Lưu cài đặt</button>

                </form>
                <!-- /.card-body -->
              </div> 
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">
      $(document).ready(function(){

          $('.my-colorpicker1').colorpicker();
          $('.my-colorpicker2').colorpicker();
          $('.my-colorpicker3').colorpicker();

          $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
          });

          $('.my-colorpicker3').on('colorpickerChange', function(event) {
            $('.my-colorpicker3 .fa-square').css('color', event.color.toString());
          });

          $('.my-colorpicker1').on('colorpickerChange', function(event) {
            $('.my-colorpicker1 .fa-square').css('color', event.color.toString());
          });

      });
    </script>
    

    <style>
      .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
      }

      .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2196F3;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }

      .pagination {
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: .25rem;
        margin: 20px 0; 
      }

      .pagination>li {
        display: inline;
      }

      .pagination>li:first-child>a, .pagination>li:first-child>span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
      }

      .pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
      }

      .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
      }

      .pagination>li>a, .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
      }
    </style>
@endsection