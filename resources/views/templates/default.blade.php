
@php ($name = session()->get('name',''))
@php ($role = session()->get('role', 'Khách'))

<!doctype html>
<html class="no-js"  lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{{$title}}</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- All Plugin Css -->
		<link rel="stylesheet" href="{{asset('')}}resources/asset/css/plugins.css">
		<!-- Style & Common Css -->
		<link rel="stylesheet" href="{{asset('')}}resources/asset/css/common.css">
		<link rel="stylesheet" href="{{asset('')}}resources/asset/css/main.css">
    	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('')}}resources/img/jobico.png">
	</head>
	<body>
		<!-- Navigation Start  -->
		<nav class="navbar navbar-default navbar-sticky bootsnav">
			<div class="container">
				<!-- Start Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="index">
						<img src="{{asset('')}}resources/img/name_logo_sm.png" class="logo" alt="">
					</a>
				</div>
				<!-- End Header Navigation -->
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
						<!-- <form action="">
							<li>
							<div class="no-pad">
								<input type="text" class="form-control border-right" placeholder="Skills, Designation, Companies" />
							</div>
							</li>
								<div class="no-pad">
									<select class="selectpicker border-right">
										<option>Experience</option>
										<option>0 Year</option>
										<option>1 Year</option>
										<option>2 Year</option>
										<option>3 Year</option>
										<option>4 Year</option>
										<option>5 Year</option>
										<option>6 Year</option>
										<option>7 Year</option>
										<option>8 Year</option>
										<option>9 Year</option>
										<option>10 Year</option>
									</select>
								</div>
							<li>
								<div class="no-pad">
									<select class="selectpicker">
										<option>Select Category</option>
										<option>Accounf & Finance</option>
										<option>Information & Technology</option>
										<option>Marketing</option>
										<option>Food & Restaurent</option>
									</select>
								</div>
							</li>
							<li>
								<div class="no-pad">
									<button type="submit" class="btn seub-btn" value="submit"><i class="fa fa-search"></i></button>
								</div>
							</li>
						</form> -->
						<li>
							<a href="index">Trang chủ</a>
						</li>
						<li>
							<a href="companies">Công ty</a>
						</li>
						<li class="dropdown">
							<a href="index" class="dropdown-toggle" data-toggle="dropdown">Việc làm</a>
							<ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
								<li class="active">
									<a href="search">Tìm kiếm việc làm</a>
								</li>
								<li>
									<a href="company-detail">Chi tiết công việc</a>
								</li>
								<li>
									<a href="resume">CV</a>
								</li>

							</ul>
						</li>
						<li class="dropdown">
							<a href="index" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-user" style="margin-right: 3px;"></i>Xin chào {{$role}} {{$name}}</a>
							<ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
							@if($role == 'Khách')
								<li class="active">
									<a href="login">Đăng nhập</a> </li>
								<li>
									<a href="register">Đăng ký</a> </li>
							@elseif ($role == 'Candidate')
								<li>
									<a href="resume.{{session()->get('uid')}}">Thông tin cá nhân</a></li>
								<li>
									<a href="job">Việc làm đã ứng tuyển</a></li>
								<li>
									<a href="logout">Đăng xuất</a> </li>
							@elseif ($role == 'Employee')
								<li class="active">
									<a href="resume.{{session()->get('uid')}}">Thông tin cá nhân</a></li>
								<li>
									<a href="candidate">Ứng viên</a> </li>
								<li>
									<a href="list">Việc làm đã đăng</a> </li>
								<li>
									<a href="post">Đăng việc làm</a> </li>
								<li>
									<a href="logout">Đăng xuất</a> </li>
							@elseif ($role == 'Admin')
								<li class="active">
									<a href="admin">Admin Dashboard</a> </li>
								<li>
									<a href="logout">Đăng xuất</a> </li>
							@endif
							</ul>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</nav>
@if(Session::has('remessage'))
<div class="alert alert-info">
<strong>{{Session::get('remessage')}}</strong></div>
@endif
@if(Session::has('success'))
<div class="alert alert-info">
	<strong>{{Session::get('success')}}</strong></div>
@endif
@yield('content')
			<!-- footer start  -->
			<footer>
			<div class="container">
				<div class="col-md-3 col-sm-6">
					<h4>Dành cho ứng viên</h4>
					<ul>
						<li><a href="index">Tìm việc làm</a></li>
						<li><a href="index">Việc làm đã xem</a></li>
						<li><a href="index">Việc làm đã lưu</a></li>
						<li><a href="index">Tìm kiếm theo công ty</a></li>
						<li><a href="index">Tìm kiếm theo ngành nghề</a></li>
						<li><a href="index">Thông tin cá nhân</a></li>
						<li><a href="index">Báo cáo vấn đề</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6">
					<h4>Dành cho nhà tuyển dụng</h4>
					<ul>
						<li><a href="index">Tìm ứng viên</a></li>
						<li><a href="index">Đăng việc làm</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6">
					<h4>Liên hệ</h4>
					<address>
						<ul>
							<li>117, Lê Thanh Nghị, Hoàng Mai <br>  Hà Nội, Việt Nam </li>
							<li>Email: Support@job.com</li>
							<li>Call: 08412 345 678</li>
							<li>Skype: job@skype</li>
						</ul>
					</address>
				</div>
				<div class="col-md-3 col-sm-6">
					<h4>Để lại lời nhắn</h4>
					<form>
						<input type="text" class="form-control input-lg" placeholder="Your Name">
						<input type="text" class="form-control input-lg" placeholder="Email...">
						<textarea class="form-control" placeholder="Message"></textarea>
						<button type="submit" class="btn btn-primary">Đăng nhập</button>
					</form>
				</div>
			</div>
			<div class="copy-right">
				<p>&copy;Copyright 2023 Vietworks | Design By <a href="https://themezhub.com/">Lê Huy Đức</a>
				</p>
			</div>
		</footer>
		<script type="text/javascript" src="{{asset('')}}resources/asset/js/jquery.min.js"></script>
		<script src="{{asset('')}}resources/asset/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{asset('')}}resources/asset/js/owl.carousel.min.js"></script>
		<script src="{{asset('')}}resources/asset/js/bootsnav.js"></script>
		<script src="{{asset('')}}resources/asset/js/main.js"></script>
	</body>
</html>