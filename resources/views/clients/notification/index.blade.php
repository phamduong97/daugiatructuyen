@extends('clients.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<div id="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><i class="fa fa-bell"></i> Thông báo</h1>
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
                  <label for="inputPassword">Trạng thái: </label>
                 <select class="form-control" name="status">
                     <option value="">Lọc</option>
                     <option value="1">Mới nhất</option>
                     <option value="2">Cũ nhất</option>
                 </select>
                </div>
                <div class="form-group has-success has-feedback">
                  <button class="btn btn-success"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
           </form>
           
           <hr>
            <h4 style=" padding: 0 0 10px 10px;">
                <b><i class="fa fa-search"></i> Hiển thị tất cả: <span style="color: red;">{{count($data)}}/{{$total}}</span>  thông báo</b>
            </h4>
            <br>
            <div class="notification-panel" style="padding: 10px;">
                @foreach($data as $v)
                <div class="item-noti row" style="padding: 5px 0;border-bottom: 1px solid #eee;cursor: pointer;">
                    <div class="col-sm-4">
                        <b><i class="far fa-envelope"></i> {{$v->title}}</b>
                    </div>
                    <div class="col-sm-2">
                        <b><i class="fa fa-clock-o"></i> {{date('d/m/Y H:i', strtotime($v->created_at))}}</b>
                    </div>
                    <div class="col-sm-6">
                        <b>{{$v->message}}</b> 
                    </div>
                </div>
                @endforeach
            </div>

            {{$data->links()}}
         </div>

    </div>
</section>


@endsection