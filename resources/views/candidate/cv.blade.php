@php($title='Vietworks | Đăng nhập')
@extends('templates.default') 
@section('content')
		
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
                    <form action="cv" id="DataForm" name="DataForm" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" id="id" value="@if(isset($c->id)) {{$c->id}} @endif">
				        <p><input type="file" name="cv" id="cv" accept="*" class="form-control-file"><button type="submit" class="btn btn-primary">Nộp CV ngay</button>
				        </p>
					</form>
                </p>
                
            </div>
        </div>
    </div>
</div>
<section class="login-wrapper">
	<div class="container">
		<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
		
	</div>
</section>
<!-- login section End -->	
@endsection