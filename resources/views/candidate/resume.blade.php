@php($title='Vietworks | Chi tiết ứng viên')
@php($acc='Ứng viên')
@extends('templates.default') 
@section('content')
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<section class="inner-banner" style="backend:#242c36 url({{asset('')}}resources/img/1920x600.png) no-repeat;">
			<div class="container">
				<div class="caption">
					<h2>Tìm việc nhanh</h2>
					<p>Tìm việc làm hot ngay <span style="background: blue; color: white">200+ việc làm mới</span></p>
				</div>
			</div>
		</section>
		<section class="profile-detail">
			<div class="container">
				<div class="col-md-12">
					<div class="row">
						<div class="basic-information">
							<div class="col-md-3 col-sm-3">
							 <img src="{{asset('')}}resources/img/{{$info->avata}}" alt="" class="img-responsive">
							</div>
							<div class="col-md-9 col-sm-9">
								<div class="profile-content">
										<h2><span>Web designer</span></h2>
										<p>Soft Techi Infoteck Pvt.</p>
										<ul class="information">
											<li><span>Name:</span>{{$info->name}}</li>
											<li><span>Email:</span>{{$info->email}}</li>
											<li><span>Mobile:</span>+{{$info->phone}}</li>
											<li><span>Company:</span>Soft Techi Infoteck Pvt.</li>
											<li><span>Date of Birth:</span>{{$info->birthday}}</li>
										</ul>
									</div>
								</div>
							<ul class="social">
								<li><a href="" class="facebook"><i class="fa fa-facebook"></i>Facebook</a></li>
								<li><a href="" class="google"><i class="fa fa-google-plus"></i>Google Plus</a></li>
								<li><a href="" class="twitter"><i class="fa fa-twitter"></i>Twitter</a></li>
								<li><a href="" class="linkedin"><i class="fa fa-linkedin"></i>Linked In</a></li>
								<li><a href="" class="instagram"><i class="fa fa-instagram"></i>Instagram</a></li>
							</ul>
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-user fa-fw"></i> About Me
								</div>
													<!-- /.panel-heading -->
								<div class="panel-body">
								<p>The front end is the part that users see and interact with, includes the User Interface, the animations, and usually a bunch of logic to talk to the backend. It is the visual bit that the user interacts with. This includes the design, images, colours, buttons, forms, typography, animations and content. It’s basically everything that you as a user of the website can see.</p>	
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-leaf fa-fw"></i> Responsibilities:
								</div>
													<!-- /.panel-heading -->
								<div class="panel-body">
								<p>The front end is the part that users see and interact with, includes the User Interface, the animations, and usually a bunch of logic to talk to the backend. It is the visual bit that the user interacts with.</p>	
								<ul>
									<li>Software testing in a Web Applications/Mobile environment.</li>
									<li>Software Test Plans from Business Requirement Specifications for test engineering group.</li>
									<li>Software testing in a Web Applications environment.</li>
									<li>Translate designs into responsive web interfaces</li>
									<li>Software testing in a Web Applications/Mobile environment.</li>
									<li>Software testing in a Web Applications environment.</li>
									<li>Translate designs into responsive web interfaces</li>
									<li>Software Test Plans from Business Requirement Specifications for test engineering group.</li>
									<li>Run production tests as part of software implementation; Create, deliver and support test plans for testing group to execute.</li>
									<li>Run production tests as part of software implementation; Create, deliver and support test plans for testing group to execute.</li>
								</ul>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-cog fa-fw"></i> Skills
								</div>
													<!-- /.panel-heading -->
								<div class="panel-body">
								<p>{{$info->skill}}</p>	
								<span class="service-tag">Web Design</span>
								<span class="service-tag">Graphics</span>
								<span class="service-tag">Development</span>
								<span class="service-tag">App design</span>
								<span class="service-tag">IOS Apps</span>
								<span class="service-tag">CMS Development</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>@endsection