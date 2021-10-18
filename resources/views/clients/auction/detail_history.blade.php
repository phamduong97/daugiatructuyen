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
            <b>{{$auction->mts .' - '.  $auction->asset_name}}</b>
           <hr>
            <h4 style=" padding: 0 0 10px 10px;">
                <b><i class="fa fa-eye"></i> Hiển thị tất cả: <span style="color: red;">{{count($data)}}/{{$total}}</span> </b>
            </h4>
            <div class="history-panel" style="padding: 10px;">
                @foreach($data as $v)
                <div class="item-noti row" style="padding: 5px 0;border-bottom: 1px solid #eee;cursor: pointer;">
                    <div class="col-sm-8">
                        <b><i class="far fa-dot-circle" style="color: orange;"></i> {{$v->content}}</b>
                    </div>
                    <div class="col-sm-4">
                        <b><i class="fa fa-clock-o"></i> {{$v->created_at}}</b>
                    </div>
                </div>
                @endforeach
            </div>

            {{$data->links()}}

         </div>

    </div>
</section>


@endsection