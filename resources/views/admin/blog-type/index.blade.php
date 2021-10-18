@extends('admin.master')

@section('content')

@if(Session::has('success-save'))
<script type="text/javascript">
  $(document).ready(function(){
    alert('Thêm mới thành công !');

  });
</script>
@endif
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh mục tin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
              <li class="breadcrumb-item active">Danh mục tin</li>
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
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-list"></i> Danh sách danh mục (<span style="color: red;">{{number_format($total)}}</span>)</h3> 
                <div class="card-tools">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Thêm mới</button>
                </div>
              </div>
    
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td style="text-align: center;"><b>STT</b></td>
                      <td style="text-align: center;"><b>Tên danh mục</b></td>
                      <td style="text-align: center;"><b>Trạng thái</b></td>
                      <td style="text-align: center;"><b>Sửa</b></td>
                      <td style="text-align: center;"><b>Xóa</b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0; ?>
                    @foreach($data as $v)
                    <tr class="item-row" id-row="{{$v->id}}">
                      <td style="text-align: center;"><?php echo $stt+=1; ?></td>
                      <td style="text-align: center;" class="type-name">{{$v->name}}</td>
                      <td style="text-align: center;">
                        @if($v->status == 1)
                        <label class="switch">
                          <input type="checkbox" value="{{$v->id}}" class="switch-label" checked>
                          <span class="slider round"></span>
                        </label>
                        @else
                        <label class="switch">
                          <input type="checkbox" value="{{$v->id}}" class="switch-label">
                          <span class="slider round"></span>
                        </label>
                        @endif
                      </td>
                       <td style="text-align: center;">
                         <button class="btn btn-success update-type" data-toggle="modal" data-target="#updateModal"><i class="fa fa-edit"></i></button>
                       </td>
                       <td style="text-align: center;">
                         <button class="btn btn-danger delete-slide"  data-toggle="modal" data-target="#confirm-delete" val="{{$v->id}}" ><i class="fa fa-times"></i></button>
                       </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{csrf_field()}}
                <div class="justify-panel" style="margin: 30px 0;display: flex;justify-content: center;align-items: center;">
                 {{$data->appends(request()->query())->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
    <!-- Xác nhận xóa danh mục-->
    <div id="confirm-delete" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Xác nhận xóa</h4>
          </div>
          <div class="modal-body">
            <p>Bạn có muốn xóa danh mục này ?</p>
          </div>
          <div class="modal-footer">
            <a href="" class="btn btn-warning delete-image">Xóa</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End -->

    <!-- Thêm mới danh mục -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <form class="modal-content" method="post" action="{{Route('admin.save_type_blog')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-header" style="display: flex;justify-content: center;align-items: center;">
              <h4 class="modal-title">Thêm mới danh mục</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="usr">Tên danh mục:</label>
              <input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control">
            </div>
            <div class="form-group">
              <label for="pwd">Trạng thái:</label>
              <select class="form-control" name="status">
                <option value="1">Kích hoạt</option>
                <option value="0">Ẩn</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info">Thêm mới</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form >

      </div>
    </div>


    <!-- Cập nhật danh mục -->
    <div id="updateModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="background: #fff!important;">

        <form class="modal-content" method="post" action="{{Route('admin.update_type_blog')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-header" style="display: flex;justify-content: center;align-items: center;">
              <h4 class="modal-title">Cập nhật danh mục</h4>
          </div>
          <input type="hidden" name="id" class="id_type"  value="">
          <input type="hidden" name="type"  value="data">
          <div class="modal-body">
            <div class="form-group">
              <label for="usr">Tên danh mục:</label>
              <input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control name_type" required>
            </div>
            <div class="form-group">
              <label for="pwd">Trạng thái:</label>
              <select class="form-control status-type" name="status">
                <option value="1">Kích hoạt</option>
                <option value="0">Ẩn</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info">Cập nhật</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form >

      </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){

             $('.delete-slide').click(function(){
                var id = $(this).attr('val');
                var link = "{{Route('admin.delete_type_blog')}}"+'?id='+id;  
                $('.delete-image').attr('href',link);
             });


             $('.update-type').click(function(){
                var parent = $(this).parents('.item-row');
                var id = parent.attr('id-row');
                var name = parent.find('.type-name').html();
                var status = parent.find('.switch-label');

                if(status.is(":checked")){

                   var data = '<option value="1">Kích hoạt</option><option value="0">Ẩn</option>';

                }else{
                    var data = '<option value="0">Ẩn</option><option value="1">Kích hoạt</option>';
                }

                $('.status-type').html(data);
                $('.id_type').val(id);
                $('.name_type').val(name);

                
             });


            $('.switch-label').click(function(){
                var id = $(this).val();
                var _token = $("input[name='_token']").val();

                $.ajax({
                    url : "{{Route('admin.update_type_blog')}}",
                    type : "post",
                    data : {
                         id : id,
                         type: 'status',
                         _token : _token
                    },
                    success : function (result){
                    }
                });
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
    </style>
@endsection