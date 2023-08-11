@php($title='Vietworks | Danh sách ứng viên')
@php($acc='Nhà tuyển dụng')
@extends('templates.default') 
@php ($cage = 'index')
<!-- <link rel="stylesheet" href="{{asset('')}}resources/css/bootstrap.min.css"> -->

@section('content')

		
<!-- login section start -->
<div class="container">
	<nav class="my-4" aria-label="breadcrumb">
	    <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index">Trang chủ</a></li>
		    <li class="breadcrumb-item"><a href="employee.list">Quản lý việc làm</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Back-End developer</li>
	    </ol>
	</nav>
	<div class="company-list">
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <div class="company-logo">
            <img src="{{asset('')}}resources/img/{{$com->logo}}" class="img-responsive" alt="" />
            </div>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="company-content">
                <input type="hidden" name="user" id="user" value="{{session()->get('uid','')}}">
                <a href="company-detail.{{$c->id}}">
                <h3>{{$c->name}}<span class="
                    @switch($c->position)
                    @case('Thực tập')
                        n1
                        @break
                    @case('Nhân viên')
                        n2
                        @break
                    @case('Quản lý')
                        @break
                    @case('Giám đốc')
                        n3
                        @break
                    @case('Fulltime')
                        n4
                        @break
                    @case('Parttime')
                        n5
                        @break    
                    @case('Freelance')
                        n6
                        @break       
                    @default
                        n7
                    @endswitch
                    ">{{$c->position}}</span>
                </h3></a>
                <span><strong>{{$c->job}}</strong></span>
                <p>
                    <span class="company-name">
                        <i class="fa fa-briefcase"></i>{{$com->name}}</span>
                    <span class="company-location">
                        <i class="fa fa-map-marker"></i>{{$com->location}}</span>
                    <span class="package">
                        <i class="fa fa-money"></i>VND{{$c->salary_min}}-{{$c->salary_max}}</span>
                </p>
                
            </div>
        </div>
    </div>
</div>
	<div class="container mt-2" style="min-height:400px">
	<div class="card-body">
		<table class="table table-bordered table-striped display nowrap" id="datatable" width="100%" >
			<thead>
				<tr>
					<th colspan="8"><h2><center>Danh sách ứng viên</center></h2></div></th>
				</tr>
				<tr>
				<th>Id</th>	
				<th>Tên</th>
				<th>Giới tính</th>
				<th>Ngày sinh</th>
				<th>Số điện thoại</th>
				<th>Kinh nghiệm</th>
				<th>Bằng cấp</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<@foreach($user as $c)
				@if($c->accepted == 0)
				<tr>
					<td>1</td>	
					<td><a href="resume.{{$c->user}}">{{$c->id}}</a></td>
					<td>Nam</td>
					<td>29/11</td>
					<td>0918273645</td>
					<td><p>2 năm kinh nghiệm tại AC bank</p>
					</td>
					<td><a href="{{asset('')}}{{$c->cv}}">Link CV</a></td>
					<td>
						<a href="accept.{{$c->id}}" class="edit btn btn-success edit">Chấp nhận</a>
						<a href="deny.{{$c->id}}" id="delete-company" class="delete btn btn-danger">Từ chối</a>
					</td>
				</tr>
				@endif
				@endforeach	
				<@foreach($user as $c)
				@if($c->accepted == 1)
				<tr>
					<td>1</td>	
					<td><a href="resume.{{$c->id}}">{{$c->id}}</a></td>
					<td>Nam</td>
					<td>29/11</td>
					<td>0918273645</td>
					<td><p>2 năm kinh nghiệm tại AC bank</p>
					</td>
					<td><a href="{{asset('')}}{{$c->cv}}">Link CV</a></td>
					<td><span style="color:blue">Chấp nhận</span></td>
				</tr>
				@endif
				@endforeach	
				<@foreach($user as $c)
				@if($c->accepted == -1)
				<tr>
					<td>1</td>	
					<td><a href="resume.{{$c->id}}">{{$c->id}}</a></td>
					<td>Nam</td>
					<td>29/11</td>
					<td>0918273645</td>
					<td><p>2 năm kinh nghiệm tại AC bank</p>
					</td>
					<td><a href="{{asset('')}}{{$c->cv}}">Link CV</a></td>
					<td><span style="color:red">Từ chối</span></td>
				</tr>
				@endif
				@endforeach	

			</tbody>
			<tfoot>
				<tr>
				<th>Id</th>	
				<th>Tên</th>
				<th>Giới tính</th>
				<th>Ngày sinh</th>
				<th>Số điện thoại</th>
				<th>Kinh nghiệm</th>
				<th>Bằng cấp</th>
				<th>Action</th>
				</tr>
			</tfoot>
		</table>
	</div>

	<div class="row">
	    {{$user->links()}}
	</div>
</div>
@endsection