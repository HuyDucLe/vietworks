@php($title='Chi tiết việc làm')
@extends('templates.default') 
@section('content')
	<style type="text/css">
		
		/* line 1, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area {
		  background: #F5F7FA;
		  padding-top: 100px;
		  padding-bottom: 100px;
		}

		/* line 5, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs {
		  padding: 30px;
		  border-bottom: 1px solid #EAEAEA;
		  -webkit-transition: 0.3s;
		  -moz-transition: 0.3s;
		  -o-transition: 0.3s;
		  transition: 0.3s;
		  -webkit-border-radius: 5px;
		  -moz-border-radius: 5px;
		  border-radius: 5px;
		}

		@media (max-width: 767px) {
		  /* line 5, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .single_jobs {
		    display: block !important;
		  }
		}

		@media (max-width: 767px) {
		  /* line 13, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .single_jobs .jobs_left {
		    display: block !important;
		    overflow: hidden;
		  }
		}

		/* line 18, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_left .thumb {
		  float: left;
		  width: 82px;
		  height: 82px;
		  -webkit-border-radius: 5px;
		  -moz-border-radius: 5px;
		  border-radius: 5px;
		  padding: 15px;
		  background: #F5F7FA;
		  margin-right: 25px;
		  border: 1px solid #F0F0F0;
		}

		/* line 32, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_left .jobs_conetent {
		  float: left;
		}

		/* line 34, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_left .jobs_conetent h4 {
		  font-size: 24px;
		  margin-bottom: 10px;
		  font-weight: 400;
		  -webkit-transition: 0.3s;
		  -moz-transition: 0.3s;
		  -o-transition: 0.3s;
		  transition: 0.3s;
		}

		@media (max-width: 767px) {
		  /* line 34, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .single_jobs .jobs_left .jobs_conetent h4 {
		    margin-top: 15px;
		  }
		}

		/* line 42, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_left .jobs_conetent h4:hover {
		  color: #00D363;
		}

		@media (max-width: 767px) {
		  /* line 46, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .single_jobs .jobs_left .jobs_conetent .links_locat {
		    display: block !important;
		  }
		}

		/* line 50, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_left .jobs_conetent .links_locat .location {
		  margin-right: 50px;
		}

		@media (max-width: 767px) {
		  /* line 50, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .single_jobs .jobs_left .jobs_conetent .links_locat .location {
		    margin-right: 10px;
		  }
		}

		/* line 55, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_left .jobs_conetent .links_locat .location p {
		  margin-bottom: 0;
		  font-size: 16px;
		  color: #AAB1B7;
		}

		/* line 59, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_left .jobs_conetent .links_locat .location p i {
		  margin-right: 7px;
		}

		@media (max-width: 767px) {
		  /* line 68, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .single_jobs .jobs_right .apply_now {
		    margin: 10px 0;
		  }
		}

		/* line 73, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_right .apply_now a.heart_mark {
		  width: 40px;
		  height: 40px;
		  -webkit-border-radius: 5px;
		  -moz-border-radius: 5px;
		  border-radius: 5px;
		  color: #00D363;
		  font-size: 14px;
		  line-height: 40px;
		  text-align: center;
		  display: inline-block;
		  background: #EFFDF5;
		}

		/* line 83, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_right .apply_now a.heart_mark:hover {
		  background: #00D363;
		  color: #fff;
		}

		/* line 88, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_right .apply_now a.boxed-btn3 {
		  padding: 9px 27px 9px 27px;
		  font-size: 14px;
		}

		/* line 94, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_right .date {
		  text-align: right;
		  margin-top: 10px;
		}

		@media (max-width: 767px) {
		  /* line 94, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .single_jobs .jobs_right .date {
		    text-align: left;
		  }
		}

		/* line 100, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .single_jobs .jobs_right .date p {
		  margin-bottom: 0;
		  font-size: 14px;
		  font-style: italic;
		  color: #7A838B;
		}

		/* line 110, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .descript_wrap {
		  padding: 40px;
		}

		/* line 112, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .descript_wrap .single_wrap {
		  margin-bottom: 30px;
		}

		/* line 114, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .descript_wrap .single_wrap:last-child {
		  margin-bottom: 0;
		}

		/* line 117, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .descript_wrap .single_wrap h4 {
		  font-size: 20px;
		  font-weight: 500;
		  color: #001D38;
		  margin-bottom: 25px;
		}

		/* line 123, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .descript_wrap .single_wrap p {
		  color: #7A838B;
		  font-size: 16px;
		  line-height: 28px;
		  font-weight: 400;
		}

		/* line 130, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .descript_wrap .single_wrap ul li {
		  font-size: 16px;
		  line-height: 32px;
		  color: #7A838B;
		  font-weight: 400;
		  position: relative;
		  padding-left: 25px;
		}

		/* line 137, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .descript_wrap .single_wrap ul li::before {
		  position: absolute;
		  left: 0;
		  top: 0;
		  width: 7px;
		  height: 7px;
		  background: #7A838B;
		  content: '';
		  -webkit-border-radius: 50%;
		  -moz-border-radius: 50%;
		  border-radius: 50%;
		  top: 12px;
		}

		/* line 152, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form {
		  margin-top: 30px;
		  padding: 40px;
		}

		@media (max-width: 767px) {
		  /* line 152, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .apply_job_form {
		    padding: 30px;
		  }
		}

		/* line 158, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form h4 {
		  font-size: 24px;
		  font-weight: 500;
		  margin-bottom: 30px;
		}

		/* line 164, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input_field input, .job_details_area .apply_job_form .input_field textarea {
		  height: 60px;
		  border: 1px solid #E8E8E8;
		  width: 100%;
		  -webkit-border-radius: 5px;
		  -moz-border-radius: 5px;
		  border-radius: 5px;
		  padding-left: 20px;
		  margin-bottom: 20px;
		}

		/* line 171, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input_field input::placeholder, .job_details_area .apply_job_form .input_field textarea::placeholder {
		  color: #7A838B;
		  font-size: 16px;
		}

		/* line 175, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input_field input:focus, .job_details_area .apply_job_form .input_field textarea:focus {
		  outline: none;
		}

		/* line 179, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input_field textarea {
		  height: 188px;
		  padding: 20px;
		}

		/* line 184, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input_field.file_up input {
		  position: relative;
		}

		/* line 186, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input_field.file_up input:before {
		  position: absolute;
		  left: 0;
		  top: 0;
		  content: 'Upload CV';
		}

		/* line 195, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input-group {
		  width: 100%;
		  height: 60px;
		  border-radius: 5px !important;
		  margin-bottom: 20px;
		  border: 1px solid #ddd;
		}

		/* line 201, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input-group button {
		  background: transparent;
		  border: none;
		  font-size: 16px;
		  color: #7A838B;
		  padding-left: 20px;
		  margin-right: 5px;
		}

		/* line 209, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input-group .custom-file {
		  margin-bottom: 0;
		  height: 60px;
		  border: none;
		}

		/* line 214, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input-group .custom-file-label {
		  position: absolute;
		  top: 0;
		  right: 0;
		  left: 0;
		  z-index: 1;
		  height: 100%;
		  padding: 0;
		  line-height: 60px;
		  color: #7A838B;
		  background-color: transparent;
		  border-radius: 0;
		  border: none;
		}

		/* line 228, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .apply_job_form .input-group .custom-file-input {
		  height: 100%;
		}

		/* line 233, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .job_sumary {
		  background: #fff;
		}

		@media (max-width: 767px) {
		  /* line 233, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .job_sumary {
		    margin-top: 30px;
		  }
		}

		@media (min-width: 768px) and (max-width: 991px) {
		  /* line 233, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .job_sumary {
		    margin-top: 30px;
		  }
		}

		/* line 241, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .job_sumary .summery_header {
		  border-bottom: 1px solid #EAEAEA;
/*		  padding: 40px;*/
		}

		@media (max-width: 767px) {
		  /* line 241, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .job_sumary .summery_header {
/*		    padding: 30px;*/
		  }
		}

		/* line 247, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .job_sumary .summery_header h3 {
		  font-size: 24px;
		  color: #001D38;
		  font-weight: 400;
		}

		/* line 253, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .job_sumary .job_content {
		  padding: 40px;
		}

		@media (max-width: 767px) {
		  /* line 253, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		  .job_details_area .job_sumary .job_content {
		    padding: 30px;
		  }
		}

		/* line 259, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .job_sumary .job_content ul li {
		  font-size: 16px;
		  font-weight: 400;
		  color: #AAB1B7;
		  line-height: 38px;
		  padding-left: 18px;
		  position: relative;
		}

		/* line 266, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .job_sumary .job_content ul li::before {
		  position: absolute;
		  width: 8px;
		  height: 8px;
		  border: 1px solid #AAB1B7;
		  -webkit-border-radius: 50%;
		  -moz-border-radius: 50%;
		  border-radius: 50%;
		  left: 0;
		  content: '';
		  top: 16px;
		}

		/* line 277, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .job_sumary .job_content ul li span {
		  color: #001D38;
		}

		/* line 284, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .share_wrap {
		  background: #fff;
		  margin: 30px 0;
		  padding: 20px;
		}

		/* line 288, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .share_wrap span {
		  font-size: 16px;
		  font-weight: 500;
		  color: #001D38;
		  margin-right: 20px;
		}

		/* line 295, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .share_wrap ul li {
		  display: inline-block;
		  margin-right: 10px;
		}

		/* line 298, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .share_wrap ul li a {
		  font-size: 16px;
		  color: #D5D5D5;
		}

		/* line 301, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .share_wrap ul li a:hover {
		  color: #00D363;
		}

		/* line 308, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.job_details_area .job_location_wrap {
		  -webkit-border-radius: 5px;
		  -moz-border-radius: 5px;
		  border-radius: 5px;
		  overflow: hidden;
		}

		/* line 314, ../../Arafath/CL/December/235. Job board/HTML/scss/_job_details.scss */
		.custom-file-label::after {
		  position: absolute;
		  top: 0;
		  right: 0;
		  bottom: 0;
		  z-index: 3;
		  display: block;
		  height: calc(calc(2.25rem + 2px) - 1px * 2);
		  padding: .375rem .75rem;
		  line-height: 1.5;
		  color: #495057;
		  content: "Browse";
		  background-color: #e9ecef;
		  border-left: 1px solid #ced4da;
		  border-radius: 0 .25rem .25rem 0;
		  margin-bottom: 0;
		  height: 60px;
		  display: none !important;
		}

	</style>
    <!-- Main jumbotron for a primary marketing message or call to action -->
	<section class="inner-banner" style="backend:#242c36 url({{asset('')}}resources/img/1920x600.png) no-repeat;">
		<div class="container">
			<div class="caption">
				<h2>Tìm việc nhanh</h2>
				<p>Tìm việc làm hot ngay <span style="background: blue; color: white">200+ việc làm mới</span>
				</p>
			</div>
		</div>
	</section>


	<section class="profile-detail">
		<div class="container">
			<div class="row job_details_area">
				<div class="col-md-8">
					<div class="basic-information">
						<div class="row">
							<div class="col-md-3 col-sm-3">
								<img src="{{asset('')}}resources/img/{{$p->logo}}" alt="" class="img-responsive" style="width:200px"></style>
							</div>
							<div class="col-md-9 col-sm-9">
								<div class="profile-content">
									<h2>{{$com->name}}<span>{{$com->job}}</span></h2>
									
									<form action="apply.{{$com->id}}" method="POST" enctype="multipart/form-data">
								        @csrf
				                        <input type="hidden" name="id" id="id" value="@if(isset($com->id)) {{$com->id}} @endif">
								        <p><button type="submit" class="btn btn-primary">Nộp CV ngay</button>
								        </p>
				                    </form>
									
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-user fa-fw"></i> Mô tả công việc
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">
							{{$com->des}}
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-leaf fa-fw"></i> Yêu cầu:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">
							{{$com->requirements}}
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-coffee fa-fw"></i> Quyền lợi:
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">
							{{$com->benefit}}
							</div>
						</div>
						

					</div>
				</div>
				<div class="col-md-4">
					<div class="basic-information job_sumary">
						<div class="row">
							<div class="summery_header">
								<center>
									<strong><h3>Thông tin tuyển dụng<h3></strong>
								</center>
								
							</div>
							<div class="profile-content">
								<ul class="information">
									<li>Ngày bắt đầu: <span>{{$com->date_start}}</span></li>
									<li>Ngày kết thúc: <span>{{$com->date_end}}</span></li>
									<li>Số lượng tuyển: <span>{{$com->number}} vị trí</span></li>
									<li>Lương: <span>{{$com->salary_min}} - {{$com->salary_max}}</span></li>
									<li>Địa điểm: <span>{{$com->location}}</span></li>
									<li>Vị trí: <span> {{$com->position}}</span></li>
								</ul>
							</div>
							<div class="profile-content">
								<div class="summery_header" style="margin-top:20px">
									<center>
										<strong><h3>Thông tin liên hệ<h3></strong>
									</center>
								</div>
								<strong><span>Công ty {{$p->name}}</span></strong>
								<ul class="information">
									<li><span>Địa chỉ:</span>{{$p->address}}</li>
									<li><span>Website:</span>{{$p->email}}</li>
									<li><span>Số nhân viên:</span>{{$p->number}} employer</li>
									<li><span>Mail:</span>{{$p->email}}</li>
									<li><span>From:</span>1998</li>
								</ul>
							</div>
						</div>
					</div>                    
				</div>
			</div>
			
		</div>
	</section>

	@endsection
