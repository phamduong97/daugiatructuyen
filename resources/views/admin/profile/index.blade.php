@extends('admin.master')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tiểu sử của tôi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
              <li class="breadcrumb-item active">Tiểu sử của tôi</li>
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
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                   @if(config('app.user_avatar') != null)
                    <img class="profile-user-img img-fluid img-circle" src="{{config('app.base_url')}}/{{config('app.user_avatar')}}" alt="Image placeholder">
                   @else 
                    <img class="profile-user-img img-fluid img-circle" src="{{config('app.base_url')}}/default/avatar.jpg" alt="">
                   @endif
                </div>

                <h3 class="profile-username text-center">{{config('app.user_fullname')}}</h3>

                <p class="text-muted text-center" style="font-style: italic;">"{{isset($profile->slogan) ? $profile->slogan : ''}}"</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Về tôi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Học vấn</strong>

                <p class="text-muted">
                  @if($user->user_edu_school == null)
                    Chưa cập nhật
                  @else
                  {{$user->user_edu_school}}
                  @endif
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Nơi ở</strong>
                  @if($user->user_current_city == null)
                  Chưa cập nhật
                  @else
                  <p class="text-muted">{{$user->user_current_city}}</p>
                  @endif
                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Kỹ năng</strong>

                <p class="text-muted">

                  @if($user->user_biography == null)
                  Chưa cập nhật
                  @else
                  <span class="tag tag-danger">{{$user->user_biography}}</span>
                  @endif
                  
                </p>

                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Giới thiệu</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Chỉnh sửa hồ sơ</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                    @if(isset($profile))
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                         @if(config('app.user_avatar') != null)
                          <img class="img-circle img-bordered-sm" src="{{config('app.base_url')}}/{{config('app.user_avatar')}}" alt="Image placeholder">
                         @else 
                          <img class="img-circle img-bordered-sm"src="{{config('app.base_url')}}/default/avatar.jpg" alt="">
                         @endif
                          <span class="username">
                            <a href="#">{{config('app.user_fullname')}}</a>
                          </span>
                          <span class="description">Cập nhật - {{date("d/m/Y h:s:i", strtotime($profile->created_at))}}</span>
                        </div>
                        <!-- /.user-block -->
                        <h4>
                         <b>{{$profile->title}}</b>
                        </h4>

                        <img src="public/blog/profile/images/{{$profile->images}}">

                        <div>{!! $profile->content !!}</div>

                      </div>
                      <!-- /.post -->
                    @else

                      <div class="post">
                        <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong>Chưa có thông tin hồ sơ. Hãy cập nhật tiểu sử ngay!</strong>
                        </div>
                      </div>

                    @endif

                  </div>

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{Route('admin.create_profile')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Slogan (<span style="color: red;">*</span>)</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{isset($profile->slogan) ? $profile->slogan : ''}}" name="slogan" class="form-control" id="inputName" placeholder="Nhập slogan" required="true">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="imgThumb" accept="image/*" name="images" placeholder="Email">
                          <img src="public/blog/profile/images/{{isset($profile->slogan) ? $profile->images : ''}}" style="width: 20%;height: auto;margin: 0.4em 0;" id="image-preview">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Giới thiệu ngắn 
                        (<span style="color: red;">*</span>)</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" rows="10" name="title" placeholder="Nhập tiêu đề" required="">{!! isset($profile->slogan) ? $profile->title : ''!!}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Nội dung (<span style="color: red;">*</span>)</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="content-blog" name="content" placeholder="Nhập nội dung" required="">{!! isset($profile->slogan) ? $profile->content : '' !!}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Lưu hồ sơ</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">

      $(document).ready(function(){
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#image-preview').attr('src', e.target.result);
            }

              reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
          }

          $("#imgThumb").change(function() {
            readURL(this);
          });
        });
      </script>

     <script> 
      CKEDITOR.replace( 'content-blog', {
        filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
      });
     </script>


@endsection