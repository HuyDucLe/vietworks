@php ($page='user') 
@extends('templates.admin') 
@section('content') 
	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left">
					<h2>Admin Users Manager</h2></div>
				<div class="pull-right mb-2"> <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create User</a></div>
			</div>
		</div>
		<div class="alert alert-success alert-dismissible fixed-top" hidden>
        	<p></p>
       	</div>
	   	<<!-- div class="custom-switch custom-switch-label-yesno">
		<input class="custom-switch-input" id="example_2" type="checkbox">
		<label class="custom-switch-btn" for="example_2"></label>
		</div> -->
		<div class="card-body">
			<table class="table table-bordered table-striped display nowrap" id="datatable" width="100%" >
				<thead>
					<tr>
					<th>Id</th>	
					<th>name</th>
					<th>Sex</th>
					<th>Birthday</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Password</th>
					<th>Date join</th>
					<th>Avata</th>
					<th>Role</th>
					<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<!-- boostrap user model -->
	<div class="modal fade" id="fade-modal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="FadeModal"></h4></div>
				<div class="modal-body">
					<form action="javascript:void(0)" id="DataForm" name="DataForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id">
						<div class="form-group pt-3">
							<h4>Name</h4>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name" maxlength="50" required="" autofocus=""></div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4>Sex</h4>
								<div class="col-sm-12">
									<select class="form-control" id="sex" name="sex">
										<option value="">Choose account sex</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<h4>Birthday</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control date-own" id="birthday" name="birthday" placeholder="Enter User birthday" maxlength="50" required=""></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4>Phone</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter User Phone" maxlength="50" required=""></div>
							</div>
							<div class="col-12 col-md-6">
								<h4>Email</h4>
								<div class="col-sm-12">
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter User Email" required=""></div>
							</div>
							
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4>Password</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="password" name="password" placeholder="Enter User Password" maxlength="50" required=""></div>
							</div>
							<div class="col-12 col-md-6">
								<h4>Date join</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control date-own" id="date_join" name="date_join" placeholder="Enter User Date Join" maxlength="50"></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4>Avatar</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="avata" name="avata" placeholder="Enter User Avata" maxlength="50" required=""></div>
							</div>
							<div class="col-12 col-md-6">
								<h4>Role</h4>
								<div class="col-sm-12">
									<select class="form-control" id="role" name="role">
										<option value="">Choose account role</option>
										<option value="Admin">Admin</option>
										<option value="Employee">Employee</option>
										<option value="Candidate">Candidate</option>
									</select>
							</div>
 							
						</div>
						<div class="form-group pt-3">
							<button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
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
	$('.date-own').datepicker({
        maxViewMode: 2,
        format: 'dd-mm-yyyy'
    });
	$('#datatable').DataTable({
		scrollX: true,
		processing: true,
		serverSide: true,
		ajax: "{{ url('admin.user') }}",
		columns: 
		[{	data: 'id' },
		{ 	data: 'name'},
		{ 	data: 'sex'},
		{ 	data: 'birthday'},
		{ 	data: 'phone'},
		{ 	data: 'email'},
		{ 	data: 'password'},
		{ 	data: 'date_join'},
		{ 	data: 'avata'},
		{ 	data: 'role'},
		{ 	data: 'action', name: 'action', orderable: false, searchable: false }],
		// { 	data: 'action', name: 'action'
		// order: [[0, 'desc']]
	});
});

function add() {
	$('#DataForm').trigger("reset");
	$('#FadeModal').html("Add User");
	$('#fade-modal').modal('show');
	$('#id').val('');
}

function editFunc(id) {
	$.ajax({
		type: "post",
		url: "{{ url('admin.user/edit') }}",
		data: {
			id: id
		},
		dataType: 'json',
		success: function(res) {
			$('#FadeModal').html("Edit User");
			$('#fade-modal').modal('show');
			$('#id').val(res.id);
			$('#name').val(res.name);
			$('#sex').val(res.sex);
			$('#birthday').val(res.birthday);
			$('#phone').val(res.phone);
			$('#email').val(res.email);
			$('#password').val(res.password);
			$('#date_join').val(res.date_join);
			$('#avata').val(res.avata);
			$('#file').val(res.file);
			$('#role').val(res.role);
		}
	});
}

function deleteFunc(id) {
	if (confirm("Delete Record?") == true) {
		var id = id;
		$.ajax({
			type: "POST",
			url: "{{ url('admin.user/delete') }}",
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
		url: "{{ url('admin.user/store')}}",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		success: (res) => {
			$("#fade-modal").modal('hide');
			var oTable = $('#datatable').dataTable();
			oTable.fnDraw(false);
			// $("#btn-save").html('Submit');
			// $("#btn-save").attr("disabled", false);
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