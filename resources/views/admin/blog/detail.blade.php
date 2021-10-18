@extends('admin.master')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Chi tiết blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
              <li class="breadcrumb-item active">Chi tiết blog</li>
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
                <h3 class="card-title"><i class="fas fa-blog"></i> Chi tiết blog </h3> 
              </div>
    
              <div class="card-body table-responsive p-0">
                <h3 style="padding: 1em;">{{$data->summary}}</h3>
                <div style="padding: 1em;">
                  <img src="public/blog/images/{{$data->images}}">
                </div>
                <div class="author" style="display: flex;flex-direction: row;padding: 1em;">
                  <div>
                   @if(config('app.user_avatar') != null)
                   <img style="height: 50px;width: 50px;border-radius: 50%;" src="{{config('app.base_url')}}/{{config('app.user_avatar')}}" alt="Image placeholder">
                   @else 
                   <img style="height: 50px;width: 50px;border-radius: 50%;" src="{{config('app.base_url')}}/default/avatar.jpg" alt="Colorlib">
                   @endif
                    <span>{{config('app.user_fullname')}}</span>
                  </div>
                  
                  <div style="padding: 0.8em;">
                    <span>{{date("d/m/Y h:s:i", strtotime($data->created_at))}}</span>
                  </div>
                  <div style="padding: 0.8em;">
                    <span><b><i class="fa fa-eye"></i> {{$data->views}}</b></span>
                  </div>
                  
                </div>


                <h2 style="padding: 1em;"><b>{{$data->title}}</b></h2>

                <div style="padding: 1em;margin: 0.5em 0;">
                    <label style="padding: 0.5em;background: #6610f2;color: #fff;border-radius: 10px;"><i class="fas fa-tags"></i> {{$data->name}}</label>
                </div>

                <div style="padding: 1em;">
                  {!! $data->content !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection