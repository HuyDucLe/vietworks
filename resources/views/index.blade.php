@php($title='Vietworks | Tìm kiếm việc làm tốt nhất')
@php ($i = 0)
@extends('templates.default') 
@section('content')


		<!-- Navigation End  -->
		<!-- Main jumbotron for a primary marketing message or call to action -->

		<section class="main-banner" style="background:#242c36 url({{asset('')}}resources/img/cr4.png)">
			<div class="container">
				<div class="caption">
					<!-- <h2>Vietworks</h2> -->
					<form action="search" action="post">
						@csrf
						<fieldset>
							<div class="col-md-4 col-sm-4 no-pad">
								<input type="text" class="form-control border-right" placeholder="Kỹ năng, Công ty" id="search" name ="search"/>
							</div>
							<div class="col-md-3 col-sm-3 no-pad">
								<select class="selectpicker border-right" id="pos" name="pos">
									<option value="">Vị trí</option>
									@foreach($pos as $p)
									<option>{{$p}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-3 col-sm-3 no-pad">
								<select class="selectpicker" id="job" name="job">
									<option value="">Chọn ngành nghề</option>
								@foreach($cate as $c)
									<option">{{$c->name}}</option>
    	                		@endforeach
								</select>
							</div>
							<div class="col-md-2 col-sm-2 no-pad">
								<button type="submit" class="btn seub-btn" value="submit"><i class="fa fa-search"></i></button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</section>

		<section class="features">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <h2> Mọi thứ hoạt động thế nào</h2>
                            <span >Quá trình nhận việc</span>
                        </div>
                    </div>
				</div>
				<div class="row" style="margin-top: 10px;">
					<div class="col-md-4 col-sm-4">
						<div class="features-content">
							<span class="box1">
								<span aria-hidden="true" class="icon-dial"></span>
							</span>
							<h3>Tạo tài khoản</h3>
							<p>Tạo tài khoản nhanh chóng <a href="login" style="color:blue">tại đây</a></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="features-content">
							<span class="box1">
								<span aria-hidden="true" class="icon-search"></span>
							</span>
							<h3>Tìm kiếm công việc</h3>
							<p><a href="search" style="color:blue">Tìm kiếm việc làm theo công ty hoặc ngành nghề...</a></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="features-content">
							<span class="box1">
								<span aria-hidden="true" class="icon-printer"></span>
							</span>
							<h3>Gửi hồ sơ</h3>
							<p>Kết quả việc làm sẽ được gửi về nhanh chóng về tài khoản và email của bạn</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="counter">
			<div class="container">
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span aria-hidden="true" class="icon-briefcase"></span>
						<h3>{{$banner[0]}}</h3>
						<p>Bài đăng mới</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span class="box1">
							<span aria-hidden="true" class="icon-expand"></span>
						</span>
						<h3>207</h3>
						<p>Công ty tuyển dụng</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span class="box1">
							<span aria-hidden="true" class="icon-profile-male"></span>
						</span>
						<h3>1500+</h3>
						<p>Thành viên</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span class="box1">
							<span aria-hidden="true" class="icon-happy"></span>
						</span>
						<h3>500+</h3>
						<p>Ứng viên đã tìm được việc làm</p>
					</div>
				</div>
			</div>
		</section>
		<section class="jobs">
			<div class="container">
				<div class="row heading">
					<h2>Tìm việc làm nổi bật</h2>
					<p>Tuyển dụng và tìm kiếm việc làm nhanh chóng tại Vietworks</p>
				</div>
				<div class="companies">
					@foreach ($com as $c)
					@include('templates.card')
					@endforeach
				</div>
				<div class="row">
					<input type="button" class="btn brows-btn" value="Brows All Jobs" />
				</div>
			</div>
		</section>
		<section class="testimonials dark">
			<div class="container">
				
				<div class="row">
					<div class="col-md-12">
						<div id="testimonial-slider" class="owl-carousel">
							<div class="testimonial">
								<div class="pic">
									<img src="{{asset('')}}resources/img/logo_job.jpg" alt="">
								</div>
								<p class="description"> " Đây là một website đầy đủ các chức năng cần thiết cho tuyển dụng và tìm kiếm việc làm." </p>
								<h3 class="testimonial-title">Lê Huy Đức</h3>
								<span class="post">Web Developer</span>
							</div>
							<div class="testimonial">
								<div class="pic">
									<img src="{{asset('')}}resources/img/logo_job.jpg" alt="">
								</div>
								<p class="description"> " Thiết kế chương trình và giao diện trực quan hơn nhằm mang lại trải nghiệm cũng như cảm hứng cho người sử dụng hơn." </p>
								<h3 class="testimonial-title">Nguyễn Thị Huyền Trang</h3>
								<span class="post">Web Designer</span>
							</div>
							<div class="testimonial">
								<div class="pic">
									<img src="{{asset('')}}resources/img/logo_job.jpg" alt="">
								</div>
								<p class="description"> " Đây là một website đầy đủ các chức năng cần thiết cho tuyển dụng và tìm kiếm việc làm." </p>
								<h3 class="testimonial-title">Lê Hồng Mỹ</h3>
								<span class="post">Web Designer</span>
							</div>
							<div class="testimonial">
								<div class="pic">
									<img src="{{asset('')}}resources/img/logo_job.jpg" alt="">
								</div>
								<p class="description"> " Đây là một website đầy đủ các chức năng cần thiết cho tuyển dụng và tìm kiếm việc làm." </p>
								<h3 class="testimonial-title">Lê Hồng Mỹ</h3>
								<span class="post">Web Designer</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="membercard dark">
			<div class="container">
				<div class="row heading">
					<h2>Các nhà tuyển dụng hàng đầu</h2>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="left-widget-sidebar">
							<div class="card-widget bg-white user-card">
								<div class="u-img img-cover" style="background-image: url({{asset('')}}resources/img//bg-1.jpg);background-size:cover;"></div>
								<div class="u-content">
									<div class="avatar box-80">
										<img class="img-responsive img-circle img-70 shadow-white" src="{{asset('')}}resources/img/job-logo (12).jpg" alt="">
										<i class="fa fa-circle-o fa-green"></i>
									</div>
									<h5>International</h5>
									<p class="text-muted">UX/ Designer</p>
								</div>
								<div class="user-social-profile">
									<ul>
										<li>
											<a href="">
												<i class="fa fa-facebook"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-google-plus"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-twitter"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-instagram"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-linkedin"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="left-widget-sidebar">
							<div class="card-widget bg-white user-card">
								<div class="u-img img-cover" style="background-image: url({{asset('')}}resources/img//bg-2.jpg);background-size:cover;"></div>
								<div class="u-content">
									<div class="avatar box-80">
										<img class="img-responsive img-circle img-70 shadow-white" src="{{asset('')}}resources/img/job-logo (14).jpg" alt="">
										<i class="fa fa-circle-o fa-green"></i>
									</div>
									<h5>Daniel</h5>
									<p class="text-muted">CEO Founder</p>
								</div>
								<div class="user-social-profile">
									<ul>
										<li>
											<a href="">
												<i class="fa fa-facebook"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-google-plus"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-twitter"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-instagram"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-linkedin"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="left-widget-sidebar">
							<div class="card-widget bg-white user-card">
								<div class="u-img img-cover" style="background-image: url({{asset('')}}resources/img//bg-3.jpg);background-size:cover;"></div>
								<div class="u-content">
									<div class="avatar box-80">
										<img class="img-responsive img-circle img-70 shadow-white" src="{{asset('')}}resources/img/job-logo (10).jpg" alt="">
										<i class="fa fa-circle-o fa-green"></i>
									</div>
									<h5>Hermione</h5>
									<p class="text-muted">Human Resource</p>
								</div>
								<div class="user-social-profile">
									<ul>
										<li>
											<a href="">
												<i class="fa fa-facebook"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-google-plus"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-twitter"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-instagram"></i>
											</a>
										</li>
										<li>
											<a href="">
												<i class="fa fa-linkedin"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
						<h2>Muốn cập nhật tin tức việc làm mới nhất? </h2>
						<p>Bấm theo dõi để nhận được email thông báo ngay khi có tin tức mới nahats!</p>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Nhập email...">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default">Theo dõi!</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection