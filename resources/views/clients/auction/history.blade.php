@extends('clients.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><i class="fa fa-history"></i> Lịch sử đấu giá</h1>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>

<section class="who-is">
    <div class="container">

         <div class="tab-content" style="border: 1px solid #eee;padding:10px;box-shadow: 1px 8px 7px;">
            <form class="form-inline">
                <div class="form-group">
                  <label for="focusedInput">Tìm kiếm :</label>
                  <input class="form-control" id="focusedInput" name="keyword" placeholder="Từ khóa/mã tài sản..." type="text">
                </div>
                <div class="form-group">
                  <label for="inputPassword">Trạng thái: </label>
                 <select class="form-control" name="status">
                     <option value="">Chọn trạng thái</option>
                     <option value="1">Chờ đấu giá</option>
                     <option value="2">Đang diễn ra</option>
                     <option value="3">Kết thúc</option>
                 </select>
                </div>
                <div class="form-group has-success has-feedback">
                  <button class="btn btn-success"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
           </form>
           
           <hr>
            <h4 style=" padding: 0 0 10px 10px;">
                <b><i class="fa fa-search"></i> Hiển thị tất cả: <span style="color: red;">{{count($data)}}/{{$total}}</span>  tài sản</b>
            </h4>

            <table class="table table-bordered table-hover table-responsive">
                <thead style="background: orange;">
                    <th style="text-align: center;" width="2%">STT</th>
                    <th style="text-align: center;" width="10%">Mã tài sản</th>
                    <th style="text-align: center;" width="15%">Tên tài sản</th>
                    <th style="text-align: center;" width="20%">Ảnh tài sản</th>
                    <th style="text-align: center;">Giá khởi điểm</th>
                    <th style="text-align: center;">Biên bản đấu giá</th>
                    <th style="text-align: center;">Lịch sử đấu giá</th>
                </thead>

                <tbody>
                    @php
                    $stt = 1;
                    @endphp

                    @if($total > 0)
                    @foreach($data as $asset)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$asset->mts}}</td>
                        <td><a href="{{Route('view-detail-product',$asset->slug)}}" target="_blank" title="Xem tài sản" style="color:blue;">{{$asset->asset_name}}</a></td>
                        <td style="text-align: center;"><img src="public/upload/assets/{{$asset->img_title}}" alt="" width="100%" height="150"></td>
                        <td><b style="color: red;text-align: center;">{{number_format($asset->price_start)}} </b> VNĐ</td>
                        <td style="text-align: center;">
                            <a href="{{Route('user.auction-detail-history',$asset->slug)}}" style="color:blue;"><i class="fa fa-eye"></i>   Xem lịch sử </a>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{Route('user.auction-report',$asset->slug)}}" style="color:blue;"><i class="fa fa-eye"></i>   Xem biên bản </a>
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Không có dữ liệu !</strong>
                    </div>
                    @endif
                </tbody>
            </table>

            {{$data->links()}}

         </div>

    </div>
</section>


@endsection