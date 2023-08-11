@php($title='Vietworks | Đăng nhập')
@extends('templates.default') 
@section('content')
		
<!-- login section start -->

<section class="login-wrapper">
	<div class="container">
		<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
		<form action="login" id="DataForm" name="DataForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
				@csrf
				<input class="form-control input-lg" type="text" id="name" name="email" placeholder="Email" value="{{old('email')}}" required>
				@if($errors->has('email'))
					<span class="text-danger">{{ $errors->first('email') }}</span>
				@endif
				<input class="form-control input-lg" type="password" id="password" name="password" placeholder="Mật khẩu"  required>
				@if($errors->has('password'))
					<span class="text-danger">{{ $errors->first('password') }}</span>
				@endif
				<label><a href="">Quên mật khẩu?</a></label>
				<button type="submit" class="btn btn-primary">Đăng nhập</button>
				<p>Have't Any Account <a href="register">Chưa có tài khoản, đăng ký ngay</a></p>
			</form>
		</div>
	</div>
</section>
<!-- login section End -->	
@endsection