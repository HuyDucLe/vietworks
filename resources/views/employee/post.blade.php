@php($title='Vietworks | Danh sách việc làm')
@extends('templates.default') 

<!-- <link rel="stylesheet" href="{{asset('')}}resources/css/bootstrap.min.css"> -->
@section('content')
		
<!-- login section start -->
<div class="container">
	<nav class="my-4" aria-label="breadcrumb">
	    <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="list">Quản lý việc làm</a></li>
		    <li class="breadcrumb-item active"><a href="post">Đăng việc làm</a></li>
	    </ol>
	</nav>
</div>
<div class="container mt-2 alert alert-info" style="min-height:400px">
	<form action="addjob" id="DataForm" name="DataForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id" id="id" value="@if(isset($post->id)) {{$post->id}} @endif">
		<div class="row form-group pt-3">
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Tên công việc</h4>
				<div class="col-sm-12">
					
					<input type="text" class="form-control" id="name" name="name" placeholder="Nhập công việc tên" maxlength="50" value="@if(isset($post->name)) {{$post->name}} @endif" required autofocus></div>
			</div>
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Ngành nghề</h4>
				<div class="col-sm-12">
				<select class="form-control" class="form-control" id="job" name="job" placeholder="Nhập người đăng" maxlength="50" required>
					<option value="">Chọn ngành nghề</option>
					@foreach ($cate as $c)
					<option value="{{$c->name}}" 
					@if(isset($post->id)&&$post->job == $c->name) selected @endif>
					{{$c->name}}					
					</option> 
					@endforeach
				</select></div>
			</div>
		</div>
		<div class="row form-group pt-3">
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Người đăng</h4>
				<div class="col-sm-12">
				<input type="text" class="form-control" id="user" name="user" placeholder="Nhập công việc tên" maxlength="50" value="@if(isset($post->user)) {{$post->user}} @endif" required></div>
			</div>
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Công ty</h4>
				<div class="col-sm-12">
					<select class="form-control"  id="company" name="company" >
					<option value="">Chọn công ty</option>
					@foreach ($com as $c)
					<option value="{{$c->id}}" 
					@if(isset($post)&&$post->company == $c->id) selected @endif>
					{{$c->name}}					
					</option> 
					@endforeach
					</select>
			</div>
		</div>
		<div class="row form-group pt-3">
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Ngày bắt đầu tuyển</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="date_start" name="date_start" value="@if(isset($post->date_start)) {{$post->date_start}} @endif"  placeholder="Nhập Ngày bắt đầu" maxlength="50" required ></div>
			</div>
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Ngày kết thúc tuyển</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="date_end" name="date_end" value="@if(isset($post->date_end)) {{$post->date_end}} @endif" placeholder="Nhập Ngày kết thúc " maxlength="50" required></div>
			</div>
		</div>
		<div class="row form-group pt-3">
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Lương tối thiểu</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="salary_min" name="salary_min" value="@if(isset($post->salary_min)) {{$post->salary_min}} @endif" placeholder="Nhập Lương tối thiểu" maxlength="50" required ></div>
			</div>
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Lương tối đa</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="salary_max" name="salary_max" value="@if(isset($post->salary_max)) {{$post->salary_max}} @endif"  placeholder="Nhập Lương tối đa" maxlength="50" required></div>
			</div>
		</div>
		<div class="row form-group pt-3">
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Số lượng tuyển</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="number" name="number" value="@if(isset($post->number)) {{$post->number}} @endif" placeholder="Nhập Số lượng tuyển" maxlength="50" required ></div>
			</div>
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Giới tính</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="sex" name="sex" value="@if(isset($post->sex)) {{$post->sex}} @endif" placeholder="Nhập iới tính" maxlength="50" required></div>
			</div>
		</div>
		<div class="row form-group pt-3">
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Vị trí</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="position" name="position" value="@if(isset($post->position)) {{$post->position}} @endif" placeholder="Nhập Vị trí" maxlength="50" required ></div>
			</div>
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Địa điểm</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="location" name="location" value="@if(isset($post->location)) {{$post->location}} @endif" placeholder="Nhập Địa điểm" maxlength="50" required></div>
			</div>
		</div>
		<div class="row form-group pt-3">
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Kinh nghiệm</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="exp" name="exp" value="@if(isset($post->exp)) {{$post->exp}} @endif" placeholder="Nhập kinh nghiệm làm việc" maxlength="50"></div>
			</div>
			<div class="col-12 col-md-6">
				<h4 class="mx-4 my-4">Yêu cầu công việc</h4>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="requirements" value="@if(isset($post->requirements)) {{$post->requirements}} @endif" name="requirements" placeholder="Nhập yêu cầu công việc" maxlength="50"></div>
			</div>
		</div>
		<div class="row form-group pt-3">
			<h4 class="col-sm-12 mx-4 my-4">Mô tả công việc</h4>
			<div class="col-sm-12">
				<textarea class="form-control" id="des" name="des" placeholder="Nhập Mô tả công việc" cols="2" value="@if(isset($post->des)) {{$post->des}} @endif" ></textarea></div>
		</div>
		<div class="row form-group pt-3">
			<h4 class="col-sm-12 mx-4 my-4">Phúc lợi</h4>
			<div class="col-sm-12">
				<input type="text" class="form-control" id="benefit" name="benefit" value="@if(isset($post->benefit)) {{$post->benefit}} @endif" placeholder="Nhập Phúc lợi" maxlength="50"></div>
		</div>
		<div class="row form-group mx-4 my-4">
			<button class="btn btn-primary form-control input-lg" type="submit" id="btn-save">Lưu</button>
		</div>
	</form>
</div>
@endsection
