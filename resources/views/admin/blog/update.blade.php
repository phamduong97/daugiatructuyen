@extends('admin.master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-blog"></i> Cập nhật blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Cập nhật blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    @if(Session::has('success'))
    <div class="alert alert-success" style="margin: 1em;text-align: center;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>{{Session::get('success')}}</strong>
    </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật blog <i class="fa fa-edit"></i></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{Route('admin.update_blog')}}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }} 
               <input type="hidden" name="type" value="data">
               <input type="hidden" name="id" value="{{$data->id}}">
               <div class="card-body">
                <div class="form-group">
                  <label >Tiêu đề (<span style="color: red;">*</span>)</label>
                  <input type="text" value="{{$data->title}}" class="form-control" name="title"  placeholder="Nhập tiêu đề bài viết">
                </div>
                <div class="form-group">
                    <label >Tóm tắt (<span style="color: red;">*</span>)</label>
                    <input type="text" value="{{$data->summary}}"  class="form-control" name="summary" placeholder="Nhập tóm tắt">
                  </div>
                  <div class="form-group">
                    <label >Ảnh đại diện (<span style="color: red;">*</span>)</label>
                    <input type="file" id="imgThumb" class="form-control" name="images" accept="image/*">
                  </div>
                  <div class="form-group">
                    @if($data->images != null)
                      <img src="public/blog/images/{{$data->images}}" id="image-preview" style="width: 20%;height: auto;">
                    @endif
                  </div>
                  <div class="form-group">
                    <label >Nội dung (<span style="color: red;">*</span>)</label>
                    <textarea class="form-control" name="content" id="content-blog" required rows="70" placeholder="Nhập nội dung">{!! $data->content !!}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="checkbox-inline">
                      @if($data->highlight == 1)
                      <input type="checkbox" name="highlight" value="1" checked="true">
                      @else 
                      <input type="checkbox" name="highlight" value="1">
                      @endif
                      Bài viết nổi bật
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status">
                      @if($data->status == 1)
                       <option value="1">--Xuất bản--</option>
                       <option value="0">--Ẩn--</option>
                      @else 
                       <option value="0">--Ẩn--</option>
                       <option value="1">--Xuất bản--</option>
                      @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Danh mục blog (<span style="color: red;">*</span>)</label>
                    <select class="custom-select" name="id_type">
                      <option value="">--Chọn danh mục--</option>
                      @foreach($types as $value)
                        @if($value->id == $data->id_type)
                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                        @else 
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Cập nhật</button>
                  <a href="{{Route('admin.list_blog')}}" class="btn btn-danger"><i class="far fa-window-close"></i> Hủy</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
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