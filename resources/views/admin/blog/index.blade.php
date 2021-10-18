@extends('admin.master')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
              <li class="breadcrumb-item active">Danh sách blog</li>
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
                <h3 class="card-title"><i class="fa fa-list"></i> Danh sách blog(<span style="color: red;">{{number_format($total)}}</span>)</h3> 
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{Route('admin.create_blog')}}"><i class="fa fa-plus"></i> Thêm mới</a>
                </div>
              </div>
    
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td style="text-align: center;"><b>STT</b></td>
                      <td style="text-align: center;"><b>Tiêu đề</b></td>
                      <td style="text-align: center;"><b>Tóm tắt</b></td>
                      <td style="text-align: center;"><b>Ảnh tiêu đề</b></td>
                      <td style="text-align: center;"><b>Lượt xem</b></td>
                      <td style="text-align: center;"><b>Ngày đăng</b></td>
                      <td style="text-align: center;"><b>Trạng thái</b></td>
                      <td style="text-align: center;"><b>Sửa</b></td>
                      <td style="text-align: center;"><b>Xóa</b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0; ?>
                    @foreach($listblog as $v)
                    <tr class="item-row">
                      <td style="text-align: center;"><?php echo $stt+=1; ?></td>
                      <td style="text-align: center;" class="type-name"><a href="{{Route('admin.detail_blog',$v->id)}}">{{$v->title}}</a></td>
                      <td style="text-align: center;" class="type-name">{{$v->summary}}</td>
                      <td style="text-align: center;" class="type-name"><img src="public/blog/images/{{$v->images}}" style="width: 100px;height: 100px;"></td>
                      <td style="text-align: center;"><b><i class="fa fa-eye"></i> {{$v->views}}</b></td>
                      <td style="text-align: center;">{{date("d/m/Y h:s:i", strtotime($v->created_at))}}</td>
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
                         <a class="btn btn-success" href="{{Route('admin.update_new_blog',$v->id)}}"><i class="fa fa-edit"></i></a>
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
                 {{$listblog->appends(request()->query())->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
    <!-- Xác nhận xóa blog-->
    <div id="confirm-delete" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Xác nhận xóa</h4>
          </div>
          <div class="modal-body">
            <p>Bạn có muốn xóa blog này ?</p>
          </div>
          <div class="modal-footer">
            <a href="" class="btn btn-warning delete-image">Xóa</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End -->

    <script type="text/javascript">
        $(document).ready(function(){

             $('.delete-slide').click(function(){
                var id = $(this).attr('val');
                var link = "{{Route('admin.delete_blog')}}"+'?id='+id;  
                $('.delete-image').attr('href',link);
             });


             $('.update-type').click(function(){
                var parent = $(this).parents('.item-row');
                var id = parent.attr('id-row');
                var name = parent.find('.type-name').html();
                var status = parent.find('.switch-label');

                if(status.is(":checked")){
                   var tt = 1;
                }else{
                    var tt = 0;
                }

                $('.id_type').val(id);
                $('.name_type').val(name);

                
             });


            $('.switch-label').click(function(){
                var id = $(this).val();
                var _token = $("input[name='_token']").val();

                $.ajax({
                  url : "{{Route('admin.update_blog')}}",
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