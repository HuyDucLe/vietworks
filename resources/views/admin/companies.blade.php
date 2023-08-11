@php ($page='company') 
@extends('templates.admin') 
@section('content') 
	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left">
					<h2>Admin Companies Manager</h2></div>
				<div class="pull-right mb-2"> <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Company</a></div>
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
						<th>Logo</th>
						<th>Employees</th>
						<th>Address</th>
						<th>Contact</th>
						<th>Website</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<!-- boostrap company model -->
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
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter Company Name" maxlength="50" required="" autofocus=""></div>
						</div>
						<div class="form-group pt-3">
							<h4>Intro</h4>
							<div class="col-sm-12">
								<textarea class="form-control" id="intro" name="intro" placeholder="Enter Company intro" cols="2" required=""></textarea></div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4>Logo</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="logo" name="logo" placeholder="Enter Company logo" maxlength="50" required=""></div>
							</div>
							<div class="col-12 col-md-6">
								<h4>Employees</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="employees" name="employees" placeholder="Enter Company Employees" maxlength="50" required=""></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4>Address</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="address" name="address" placeholder="Enter Company Address" required=""></div>
							</div>
							<div class="col-12 col-md-6">
								<h4>Contact</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Company Contact" maxlength="50" required=""></div>
							</div>
						</div>
						<div class="row form-group pt-3">
							<div class="col-12 col-md-6">
								<h4>Websites</h4>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="websites" name="websites" placeholder="Enter Company Websites" maxlength="50" required=""></div>
							</div>
							<div class="col-12 col-md-6">
								<h4>Email</h4>
								<div class="col-sm-12">
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter Company Email" maxlength="50" required=""></div>
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
	$('#datatable').DataTable({
		scrollX: true,
		processing: true,
		serverSide: true,
		ajax: "{{ url('admin.company') }}",
		columns: 
		[{	data: 'id' },
		{ 	data: 'name'},
		{ 	data: 'logo'},
		{ 	data: 'employees'},
		{ 	data: 'address'},
		{ 	data: 'contact'},
		{ 	data: 'website'},
		{ 	data: 'email'},
		{ 	data: 'action', name: 'action', orderable: false, searchable: false }],
		// order: [[0, 'desc']]
	});
});

function add() {
	$('#DataForm').trigger("reset");
	$('#FadeModal').html("Add Company");
	$('#fade-modal').modal('show');
	$('#id').val('');
}

function editFunc(id) {
	$.ajax({
		type: "post",
		url: "{{ url('admin.company/edit') }}",
		data: {
			id: id
		},
		dataType: 'json',
		success: function(res) {
			$('#FadeModal').html("Edit Company");
			$('#fade-modal').modal('show');
			$('#id').val(res.id);
			$('#name').val(res.name);
			$('#intro').val(res.intro);
			$('#logo').val(res.logo);
			$('#employees').val(res.employees);
			$('#address').val(res.address);
			$('#contact').val(res.contact);
			$('#website').val(res.website);
			$('#email').val(res.email);
		}
	});
}

function deleteFunc(id) {
	if (confirm("Delete Record?") == true) {
		var id = id;
		$.ajax({
			type: "POST",
			url: "{{ url('admin.company/delete') }}",
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
		url: "{{ url('admin.company/store')}}",
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