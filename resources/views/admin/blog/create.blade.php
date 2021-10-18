@extends('admin.master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-blog"></i> Thêm mới tin tức</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm mới tin tức</li>
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
                <h3 class="card-title">Soạn bài viết <i class="fa fa-plus-circle"></i></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{Route('admin.save_blog')}}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }} 
               <div class="card-body">
                <div class="form-group">
                  <label >Tiêu đề (<span style="color: red;">*</span>)</label>
                  <input type="text" class="form-control" name="title"  placeholder="Nhập tiêu đề bài viết">
                </div>
                <div class="form-group">
                    <label >Tóm tắt (<span style="color: red;">*</span>)</label>
                    <input type="text" class="form-control" name="summary" placeholder="Nhập tóm tắt">
                  </div>
                  <div class="form-group">
                    <label >Ảnh đại diện (<span style="color: red;">*</span>)</label>
                    <input type="file" class="form-control" name="images" required>
                  </div>
                  <div class="form-group">
                    <label >Nội dung (<span style="color: red;">*</span>)</label>
                    <textarea class="form-control" name="content" id="content-blog" required rows="70" placeholder="Nhập nội dung"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" name="highlight" id="checkboxPrimary1" value="1">
                        <label for="checkboxPrimary1">
                          Bài viết nổi bật
                        </label>
                      </div>
                   <!--  <label class="checkbox-inline"><input type="checkbox" name="highlight" value="1">  Bài viết nổi bật</label> -->
                    
                  </div>
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status">
                      <option value="1">--Xuất bản--</option>
                      <option value="0">--Ẩn--</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Danh mục blog (<span style="color: red;">*</span>)</label>
                    <select class="custom-select" name="id_type">
                      <option value="">--Chọn danh mục--</option>
                      @foreach($types as $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                    </select>
                  </div>
                   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
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