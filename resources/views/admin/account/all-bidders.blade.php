@extends('admin.master') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-users"></i> Danh sách tài khoản đấu giá</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách tài khoản đấu giá</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-list-alt"></i> Tổng số tài khoản <b>(<span style="color: red;">{{$total}}</span>)</b></h3>

            <div class="card-tools row">
                <div class="input-group col-sm-6">
                    <input class="form-control" style="padding: 1.375rem .75rem!important;" type="search" placeholder="Tìm kiếm" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-default float-right" style="margin-left: 0.5em;"><i class="fas fa-print"></i> In</button>
                    <a href="public/files/danhsachnhansu.xlsx" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Xuất file excel
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            STT
                        </th>
                        <th>
                            Họ và tên <br> (Cá nhân/Tổ chức)
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Số điện thoại
                        </th>
                        <th>
                            Địa chỉ
                        </th>
                        <th>
                            Loại tài khoản
                        </th>
                        <th>Xác thực</th>
                        <th>
                            Trạng thái
                        </th>


                        <th style="text-align: center;width: 22%;">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?> @foreach($data as $v)
                    <tr>
                        <td>
                            {{$stt++}}
                        </td>
                        <td>
                            <p>
                                {{$v->fullname}}
                            </p>
                        </td>
                        <td>
                            {{$v->email}}
                        </td>
                        <td>
                            {{$v->phone}}
                        </td>
                        <td>
                            {{$v->address}}
                        </td>
                        <td>
                            @if ($v->type == 1) Cá nhân @else Tổ chức @endif
                        </td>
                        <td>
                            @if ($v->is_vertified == 1)
                            <b style="color: green;"><i class="fa fa-check-circle"></i>  Đã xác thực</b> 
                            @else
                            <b style="color: red;"><i class="fa fa-ban"></i>  Chưa xác thực</b> 
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if($v->stt == 1)
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

                        <td class="project-actions text-center">
                            <a class="btn btn-primary btn-sm" href="{{ Route('admin.view-bidder',$v->id_user) }}">
                                <i class="fas fa-folder">
                              </i> Xem chi tiết
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->
{!! csrf_field() !!}

<script type="text/javascript">
    $(document).ready(function() {

        $('.switch-label').click(function() {
            var id = $(this).val();
            var _token = $("input[name='_token']").val();
            $.ajax({                    
                    url: "{{Route('admin.update-status-bidder')}}",
                    type: "post",
                    data: {                         
                      id: id,
                      type: 'status',
                     _token: _token                    
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
    
    input:checked+.slider {
        background-color: #2196F3;
    }
    
    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked+.slider:before {
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
    
    .pagination>li:first-child>a,
    .pagination>li:first-child>span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    
    .pagination>.disabled>a,
    .pagination>.disabled>a:focus,
    .pagination>.disabled>a:hover,
    .pagination>.disabled>span,
    .pagination>.disabled>span:focus,
    .pagination>.disabled>span:hover {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
    }
    
    .pagination>.active>a,
    .pagination>.active>a:focus,
    .pagination>.active>a:hover,
    .pagination>.active>span,
    .pagination>.active>span:focus,
    .pagination>.active>span:hover {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }
    
    .pagination>li>a,
    .pagination>li>span {
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