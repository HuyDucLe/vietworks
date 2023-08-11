@php($title='Vietworks | Đăng ký tài khoản')
@extends('templates.default') 
@section('content')
<!-- register section start -->
@if(Session::has('fail'))
<div class="alert alert-info">
  	<strong>{{Session::get('fail')}}</strong>
  	<p>@error('name'){{$message}}@enderror</p>
    <p>@error('email'){{$message}}@enderror</p>
    <p>@error('password'){{$message}}@enderror</p>
  </button>
</div>
@endif
<link rel="stylesheet" href="{{asset('')}}resources/css/style.css">
<section class="login-wrapper">
	<div class="container">
		<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
			<form action="register" method='post'>
				@csrf
				<img class="img-responsive" alt="logo" src="{{asset('')}}resources/img/name_logo.png">
				<div class="title">
					<span>Đăng Ký Thành Viên!</span>
				</div>
				<div class="social row form-group">
				    <div class="col-12 col-md-6">
				        <a class="btn btn-default full-width facebook-btn" role="button" href="index">
				            <span class="img-container m-r-xs">
				                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48">
				                    <path d="M44,38.44A5.56,5.56,0,0,1,38.44,44H9.56A5.56,5.56,0,0,1,4,38.44V9.56A5.56,5.56,0,0,1,9.56,4H38.44A5.56,5.56,0,0,1,44,9.56Z" style="fill: #3f51b5;"></path>
				                    <path d="M35.52,25.11H31.78V39.56H26.22V25.11H22.89V20.67h3.33V18c0-3.9,1.62-6.21,6.22-6.21h3.78v4.44H33.68c-1.79,0-1.91.67-1.91,1.91v2.53h4.44Z" style="fill: #fff;"></path>
				                </svg>
				            </span>
				            <span class="text-desktop"> với tài khoản Facebook </span>
				            <span class="text-mobile"> với Facebook </span>
				        </a>
				    </div>
				    <div class="col-12 col-md-6">
				        <a class="btn btn-default full-width google-btn m-r-sm" role="button" href="index">
				            <span class="img-container m-r-xs">
				                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48">
				                    <path style="fill: #FFC107;" d="M 43.609375 20.082031 L 42 20.082031 L 42 20 L 24 20 L 24 28 L 35.304688 28 C 33.652344 32.65625 29.222656 36 24 36 C 17.371094 36 12 30.628906 12 24 C 12 17.371094 17.371094 12 24 12 C 27.058594 12 29.84375 13.152344 31.960938 15.039063 L 37.617188 9.382813 C 34.046875 6.054688 29.269531 4 24 4 C 12.953125 4 4 12.953125 4 24 C 4 35.046875 12.953125 44 24 44 C 35.046875 44 44 35.046875 44 24 C 44 22.660156 43.863281 21.351563 43.609375 20.082031 Z "></path>
				                    <path style="fill: #FF3D00;" d="M 6.304688 14.691406 L 12.878906 19.511719 C 14.65625 15.109375 18.960938 12 24 12 C 27.058594 12 29.84375 13.152344 31.960938 15.039063 L 37.617188 9.382813 C 34.046875 6.054688 29.269531 4 24 4 C 16.316406 4 9.65625 8.335938 6.304688 14.691406 Z "></path>
				                    <path style="fill: #4CAF50;" d="M 24 44 C 29.164063 44 33.859375 42.023438 37.410156 38.808594 L 31.21875 33.570313 C 29.210938 35.089844 26.714844 36 24 36 C 18.796875 36 14.382813 32.683594 12.71875 28.054688 L 6.195313 33.078125 C 9.503906 39.554688 16.226563 44 24 44 Z "></path>
				                    <path style="fill: #1976D2;" d="M 43.609375 20.082031 L 42 20.082031 L 42 20 L 24 20 L 24 28 L 35.304688 28 C 34.511719 30.238281 33.070313 32.164063 31.214844 33.570313 C 31.21875 33.570313 31.21875 33.570313 31.21875 33.570313 L 37.410156 38.808594 C 36.972656 39.203125 44 34 44 24 C 44 22.660156 43.863281 21.351563 43.609375 20.082031 Z "></path>
				                </svg>
				            </span>
				            <span class="text-desktop"> với tài khoản Google </span>
				            <span class="text-mobile"> với Google </span>
				        </a>
				    </div>
				</div>
				<input class="form-control input-lg" type="text" id="name" name="email" placeholder="Email" value='{{old('email')}}' required>
				@if($errors->has('email'))
					<span class="text-danger">{{ $errors->first('email') }}</span>
				@endif
				<input class="form-control input-lg" type="password" id="password" name="password" placeholder="Mật khẩu" value='{{old('password')}}' required>
		        @if($errors->has('password'))
					<span class="text-danger">{{ $errors->first('password') }}</span>
				@endif
				<input class="form-control input-lg" type="text" id="name" name="name" value="{{old('name')}}" placeholder="Họ tên" required>
		        <input class="form-control input-lg" type="text" id="birthday" name="birthday" placeholder="Ngày sinh" value='{{old('birthday')}}' required>
		        @if($errors->has('birthday'))
					<span class="text-danger">{{ $errors->first('birthday') }}</span>
				@endif
				<select class="form-control  input-lg" id="sex" name="sex" value="{{old('sex')}}" placeholder="Chọn giới tính" >
		            <option value="Nữ">Nữ</option>
		            <option value="Nam">Nam</option>
		        </select>
		        <input class="form-control  input-lg" type="text" id="phone" name="phone" value="{{old('phone')}}" placeholder="Số điện thoại" required>
				<select class="form-control  input-lg" id="role" name="role" value="{{old('role')}}" placeholder="Đăng ký với tư cách" required>
					<option value="">Đăng ký với tư cách</option>
					<option value="Candidate">Ứng viên</option>
		            <option value="Employee">Nhà tuyển dụng</option>
		        </select>
				@if($errors->has('role'))
					<span class="text-danger">Vui lòng chọn kiểu tài khoản</span>
				@endif
				<p class="form-group input-lg accept-text">Bằng cách ấn vào nút “Đăng Ký”, tôi đồng ý với <a href="#/thoa-thuan-su-dung" target="_blank" title="Thoả thuận sử dụng">Thoả thuận sử dụng</a> và <a href="#/quy-dinh-bao-mat" target="_blank" title="Quy định bảo mật">Quy định bảo mật</a> của VietnamWorks. </p>
			    <input class="form-control input-lg " type="submit" id="button-register" value="Đăng Ký">
			</form>
			<p class="text-center m-b-none register">Bạn là thành viên VietnamWorks? <a href="login">
			        <strong>Đăng Nhập</strong>
			    </a>
			</p>
			<hr class="hidden-xs">
			<div class="login__footer">
			    <div class="text-center register-as-employer">
			        <span>Nếu bạn đang có nhu cầu tuyển dụng, </span>
			        <br>
			        <span> vui lòng đăng ký tại </span>
			        <a href="register" title="Trang Tuyển Dụng">đây</a>
			        <span>. </span>
			    </div>
			</div>
		</div>
	</div>
</section>

<script src="{{asset('')}}resources/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$('.date-own').datepicker({
		maxViewMode: 2,
		format: 'dd-mm-yyyy'
	});
	$('#register_form').submit(function(e) {
		e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			type: 'POST',
			url: "{{ url('company.store')}}",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: (data) => {
				$("#company-modal").modal('hide');
				var oTable = $('#company-datatable').dataTable();
				$("#button-register")('Submit');
				$("#button-register").attr("disabled", false);
				alert("Success!");
			},
			error: function(data) {
				console.log(data);
			}
		});
	});
</script>
<!-- login section End --> @endsection