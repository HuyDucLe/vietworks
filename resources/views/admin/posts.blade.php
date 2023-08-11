@php ($page='post') 
@extends('templates.admin') 
@section('content') 
	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left">
					<h2>Admin Job posts Manager</h2></div>
				<div class="pull-right mb-2"> <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Job</a></div>
			</div>
		</div>
		<div class="alert alert-success alert-dismissible fixed-top" hidden>
        	<p></p>
       </div>
		<div class="card-body">
			<table class="table table-bordered table-striped display nowrap" id="datatable" width="100%" >
				<thead>
					<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Job</th>
					<th>User</th>
					<th>Company</th>
					<th>Date start</th>
					<th>Date end</th>
					<th>Salary min</th>
					<th>Salary max</th>
					<th>Number</th>
					<th>Sex</th>
					<th>Position</th>
					<th>Location</th>
					<th>Exp</th>
					<!-- <th>Requirements</th>
					<th>Des</th>
					<th>Benefit</th> -->
					<th>Access</th>
					<th>public</th>
					<th>Action<th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<!-- boostrap post model -->
	<div class="modal alert alert-info" id="fade-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="FadeModal"></h4></div>
			<div class="modal-body">
				<form action="javascript:void(0)" id="DataForm" name="DataForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id">
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Tên công việc</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="name" name="name" placeholder="Nhập công việc tên" maxlength="50" required="" autofocus=""></div>
							</div>
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Ngành nghề</h4>
								<div class="col-sm-12">
									<textarea class="form-control" id="job" name="job" placeholder="Nhập ngành nghề" cols="2" required=""></textarea></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Người đăng</h4>
								<div class="col-sm-12">
									<select class="form-control" class="form-control" id="user" name="user" placeholder="Nhập người đăng" maxlength="50" required="">
										<option value="">Select user ID</option>
										<option value=""></option> 
									</select></div>
							</div>
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Công ty</h4>
								<div class="col-sm-12">
									<select class="form-control"  id="company" name="company" >
										<option value="">Select company ID</option>
									</select></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Ngày bắt đầu tuyển</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="date_start" name="date_start" placeholder="Nhập Ngày bắt đầu" maxlength="50" required="" ></div>
							</div>
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Ngày kết thúc tuyển</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="date_end" name="date_end" placeholder="Nhập Ngày kết thúc " maxlength="50" required=""></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Lương tối thiểu</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="salary_min" name="salary_min" placeholder="Nhập Lương tối thiểu" maxlength="50" required="" ></div>
							</div>
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Lương tối đa</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="salary_max" name="salary_max" placeholder="Nhập Lương tối đa" maxlength="50" required=""></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Số lượng tuyển</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="number" name="number" placeholder="Nhập Số lượng tuyển" maxlength="50" required="" ></div>
							</div>
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Giới tính</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="sex" name="sex" placeholder="Nhập iới tính" maxlength="50" required=""></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Vị trí</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="position" name="position" placeholder="Nhập Vị trí" maxlength="50" required="" ></div>
							</div>
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Địa điểm</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="location" name="location" placeholder="Nhập Địa điểm" maxlength="50" required=""></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Kinh nghiệm</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="exp" name="exp" placeholder="Nhập kinh nghiệm làm việc" maxlength="50"></div>
							</div>
							<div class="col-12 col-md-6">
								<h4 class="mx-4 my-4">Yêu cầu công việc</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="requirements" name="requirements" placeholder="Nhập yêu cầu công việc" maxlength="50"></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<h4 class="col-sm-12 mx-4 my-4">Mô tả công việc</h4>
							<div class="col-sm-12">
								<textarea class="form-control" id="des" name="des" placeholder="Nhập Mô tả công việc" cols="2"></textarea></div>
						</div>
						<div class="row form-group pt-3">
							<h4 class="col-sm-12 mx-4 my-4">Phúc lợi</h4>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="benefit" name="benefit" placeholder="Nhập Phúc lợi" maxlength="50"></div>
						</div>
						<div class="row form-group mx-4 my-4">
							<button class="btn btn-primary form-control input-lg" type="submit" id="btn-save">Lưu</button>
						</div>
					</form>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('#datatable').DataTable({
		scrollX: true,
		processing: true,
		serverSide: true,
		ajax: "{{ url('admin.post') }}",
		columns: 
		[{	data: 'id'},
		{	data: 'name'},
		{	data: 'job'},
		{	data: 'user'},
		{	data: 'company'},
		{	data: 'date_start'},
		{	data: 'date_end'},
		{	data: 'salary_min'},
		{	data: 'salary_max'},
		{	data: 'number'},
		{	data: 'sex'},
		{	data: 'position'},
		{	data: 'location'},
		// {	data: 'exp'},
		// {	data: 'requirements'},
		// {	data: 'des'},
		{	data: 'benefit'},
		{	data: 'access'},
		{	data: 'public'},
		{	data: 'action', name: 'action', orderable: false, searchable: false }],
		// order: [[0, 'desc']]
	});
});

function add() {
	$('#DataForm').trigger("reset");
	$('#FadeModal').html("Add Job");
	$('#fade-modal').modal('show');
	$('#id').val('');
}

function editFunc(id) {
	$.ajax({
		type: "post",
		url: "{{ url('admin.post/edit') }}",
		data: {
			id: id
		},
		dataType: 'json',
		success: function(res) {
			$('#FadeModal').html("Edit Job");
			$('#fade-modal').modal('show');
			$('#id').val(res.id);
			$('name').val(res.name);           
			$('job').val(res.job);
			$('user').val(res.user);
			$('company').val(res.company);
			$('date_start').val(res.date_start);
			$('date_end').val(res.date_end);
			$('salary_min').val(res.salary_min);
			$('salary_max').val(res.salary_max);
			$('number').val(res.number);
			$('sex').val(res.sex);
			$('position').val(res.position);
			$('location').val(res.location);
			$('exp').val(res.exp);
			$('requirements').val(res.requirements);
			$('des').val(res.des);
			$('benefit').val(res.benefit);
			$('access').val(res.access);
			$('public').val(res.public);
		}
	});
}

function deleteFunc(id) {
	if (confirm("Delete Record?") == true) {
		var id = id;
		$.ajax({
			type: "POST",
			url: "{{ url('admin.post/delete') }}",
			data: {
				id: id
			},
			dataType: 'json',
			success: function(res) {
				var oTable = $('#datatable').dataTable();
				oTable.fnDraw(false);
				$(".alert-success").html(res.message);
				$(".alert-success").removeAttr("hidden");
				setTimeout(function() {
					$(".alert-success").attr("hidden","true");
				}, 4000);
			}
		});
	}
}
$('#DataForm').submit(function(e) {
	e.preventDefault();
	var formData = new FormData(this);
	$.ajax({
		type: 'POST',
		url: "{{ url('admin.post/store')}}",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		success: (res) => {
			$("#fade-modal").modal('hide');
			var oTable = $('#datatable').dataTable();
			oTable.fnDraw(false);
			$(".alert-success").html(res.message);
			$(".alert-success").removeAttr("hidden");
			setTimeout(function() {
				$(".alert-success").attr("hidden","true");
			}, 4000);
		},
		error: function(data) {
			alert(data);
		}
	});
});
</script>
@endsection