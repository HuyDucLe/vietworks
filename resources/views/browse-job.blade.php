@php($title='Vietworks | Tìm kiếm việc làm')
@php($acc='Ứng viên')
@extends('templates.default') 
@section('content')

		<!-- Inner Banner -->
		<section class="inner-banner" style="backend:#242c36 url({{asset('')}}resources/img/1920x600.png) no-repeat;">
			<div class="container">
				<div class="caption">
					<h2>Tìm việc</h2>
					<p>Nhanh chóng nhận việc <span>202 việc làm mới</span></p>
				</div>
			</div>
		</section>
		<div class="main-banner p-0 my-0">
			<div class="container p-0 my-0">
				<form action="search" method="POST">
				@csrf
					<fieldset>
						<div class="col-md-4 col-sm-4 no-pad">
							<input type="text" class="form-control border-right" placeholder="Kỹ năng, Công ty" id="search" name ="search" value="{{old('search')}}"/>
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
								@foreach($cate as $t)
								<option>{{$t}}</option>
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
		<section class="jobs">
			<div class="container">
				<div class="row top-pad">
					<div class="filter">
						<div class="col-md-2 col-sm-3">
							<p>Tìm theo:</p>
						</div>
						
						<div class="col-md-10 col-sm-9 pull-right">
							<ul class="filter-list">
								<li>
									<input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox" checked="">
									<label for="checkbox-1" class="part-time checkbox-custom-label">Part Time</label>
								</li>
								
								<li>
									<input id="checkbox-2" class="checkbox-custom" name="checkbox-2" type="checkbox">
									<label for="checkbox-2" class="full-time checkbox-custom-label">Full Time</label>
								</li>
								
								<li>
									<input id="checkbox-3" class="checkbox-custom" name="checkbox-3" type="checkbox">
									<label for="checkbox-3" class="freelancing checkbox-custom-label">Freelancing</label>
								</li>
								
								<li>
									<input id="checkbox-4" class="checkbox-custom" name="checkbox-4" type="checkbox">
									<label for="checkbox-4" class="internship checkbox-custom-label">Internship</label>
								</li>

							</ul>	
						</div>
					</div>
				</div>
				<div class="companies">
					@if(isset($com)) 
					@foreach ($com as $c)
					@include('templates.card')
					@endforeach
				</div>
				{{$com->links();}}
				@endif
			</div>
		</section>
@endsection