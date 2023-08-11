@php($title='Vietworks | Danh sách việc làm')
@extends('templates.default') 
<!-- <link rel="stylesheet" href="{{asset('')}}resources/css/bootstrap.min.css"> -->

@section('content')
<link rel="stylesheet" href="{{asset('')}}resources/css/dataTables.bootstrap4.min.css">
<script src="{{asset('')}}resources/js/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}resources/js/dataTables.bootstrap4.min.js"></script>	
		
<!-- login section start -->
<div class="container">
	<nav class="my-4" aria-label="breadcrumb">
	    <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="list">Quản lý việc làm</a></li>
	    </ol>
	</nav>
</div>
<div class="container mt-2" style="min-height:400px">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2><center>Danh sách việc làm đã đăng</center></h2></div>
			<div class="pull-right mb-2"> <a class="btn btn-success" href="post"> Tạo mới </a></div>
		</div>
	</div>
	<div class="card-body">
	<table class="table table-bordered table-striped display nowrap" id="datatable" width="100%" >
			<thead>
				<tr>
				<th>Id</th>	
				<th>Việc làm</th>
				<th>Bắt đầu</th>
				<th>Kết thúc</th>
				<th>Lương Min</th>
				<th>Lương Max</th>
				<th>Số lượng</th>
				<th>Vị trí</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($post as $p)
				<tr>
					<td>{{$p->id}}</td>
					<td><a href="candidate.{{$p->id}}">{{$p->name}}</a></td>
					<td>{{$p->date_start}}</td>
					<td>{{$p->date_end}}</td>
					<td>{{$p->salary_min}}</td>
					<td>{{$p->salary_max}}</td>
					<td>{{$p->number}}</td>
					<td>{{$p->position}}</td>
					<td>
						<a href="edit.{{$p->id}}" class="edit btn btn-success edit">Sửa</a>
						<a href="delete.{{$p->id}}" class="delete btn btn-danger">Xóa</a>
					</td>
				</tr>
				@endforeach				
			</tbody>
			<tfoot>
				<tr>
				<th>Id</th>	
				<th>Việc làm</th>
				<th>Bắt đầu</th>
				<th>Kết thúc</th>
				<th>Lương Min</th>
				<th>Lương Max</th>
				<th>Số lượng</th>
				<th>Vị trí</th>
				<th>Action</th>
			</tfoot>
		</table>
		{{$post->links();}}
	</div>
	<div class="row">
	    <div class="col-md-6 align-self-center">
	        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 2 of 2</p>
	    </div>
	    <div class="col-md-6">
	        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
	        </nav>
	    </div>
	</div>
</div>

@endsection
