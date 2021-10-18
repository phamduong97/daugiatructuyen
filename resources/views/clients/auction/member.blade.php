<h4><b>Tên tài sản: </b> {{$data->asset_name}}</h4>
<h4><b>Mã tài sản: </b> {{$data->mts}}</h4>

<table class="table table-bordered table-hover table-responsive">
	<thead style="background: orange;">
		<th width="2%">STT</th>
		<th width="10%">Mã tài khoản</th>
		<th width="25%">Tên khách hàng/người đại diện</th>
		<th>Số điện thoại</th>
		<th>Email</th>
		<th width="30%">Trạng thái</th>
	</thead>

	<tbody>
		@php
		$stt = 1;
		@endphp

		@if(count($members) > 0)
			@foreach($members as $v)
			<tr>
				<td>{{$stt++}}</td>
				<td>{{$v->id_user}}</td>
				<td>{{$v->fullname}}</td>
				<td>{{$v->phone}}</td>
				<td>{{$v->email}}</td>
				<td style="text-align: center;" class="action-{{$v->id_user}}">
					@if($v->is_vertify == 0)
						<b style="color: red;">Chưa được xác thực</b> <br>
						<a style="color:green;cursor: pointer;" onclick="$('.complete-file').attr('data-mts',$(this).attr('val'));" data-toggle="modal" data-target="#confirm-file" val="{{$v->id_user}}"><i class="fa fa-arrow-right"></i> Xác thực hoàn tất thủ tục</a>
					@else 
					   	<b style="color: green;"><i class="fa fa-check-circle"></i> Đã xác thực</b>
					@endif
				</td>
				
			</tr>
			@endforeach
		@else 
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Không có thành viên !</strong>
		</div>
		@endif
	</tbody>
</table>

<!-- Xác nhận hoàn tất thủ tục-->
<div id="confirm-file" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-question-circle"></i> Xác nhận hoàn tất thủ tục</h4>
      </div>
      <div class="modal-body">
        <p>Khi tài khoản được xác nhận đã hoàn tất cả thủ tục, tài khoản sẽ được tham gia phiên đấu giá này. Bạn có muốn tiếp tục ?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-success complete-file" data-mts="" >Xác thực</a>
        <button type="button" class="btn btn-danger" onclick="$('#confirm-file').modal('hide');">Đóng</button>
      </div>
    </div>
  </div>
</div>
<!-- End -->


 <script type="text/javascript">
    $(document).ready(function(){

        $('.complete-file').click(function(){

            var id_user = $(this).attr('data-mts');
            var id_auction = {{$data->id}};
            var _token = $("input[name='_token']").val();

            $(this).text("Vui lòng chờ...");
            $(this).disabled;

            $.ajax({
              url : "{{Route('user.confirm-completion')}}",
              type : "post",
              data : {
                id_user : id_user,
                id_auction : id_auction,
                _token : _token
              },
              success : function (data){

              	if(data === "success"){

              		let target = '.action-'+id_user;

              		$('#confirm-file').modal('hide');
              		$('.complete-file').text("Xác thực");
              		$('.complete-file').enabled;
              		$(target).html('<b style="color: green;"><i class="fa fa-check-circle"></i> Đã xác thực</b>');
              	}
              }
            });
          });
    });
</script>