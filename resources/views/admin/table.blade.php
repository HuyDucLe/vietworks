@php ($page=$ql) 
@extends('templates.admin') 
@section('content') 
<div class="container-fluid">
    <h3 class="text-dark mb-4">
        <center>Admin control</center>
    </h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Table {{strtoupper($ql)}}</p>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                        <label class="form-label">Show&nbsp; 
                            <select class="d-inline-block form-select form-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp; 
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                        <label class="form-label">
                            <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                        </label>
                    </div>
                </div>
                <div class=col-md-3">
                    <a class="btn btn-success" href="create.{{$ql}}"> Create new {{$ql}}</a>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead> 
                        @foreach($col as $c) 
                        <th>{{$c}}</th> 
                        @endforeach 
                        <th>Action</th>
                    </thead>
                    <tbody> @foreach($table as $u) <tr> @foreach($u as $c) <td style="max-width:50px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$c}}</td> @endforeach <td>
                                <form action="#" method="POST">
                                    @csrf
                                    <a class="btn btn-primary" href="admin.{{$ql}}.{{$u->id}}.edit" style="min-width:74.06px">Edit</a> @csrf @method('Delete') <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        <tr> @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            @foreach($col as $c) 
                            <td>
                                <strong>{{$c}}</strong>
                            </td> 
                            @endforeach
                            <td>
                                <strong>Action</strong>
                            </td> 
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <!-- {{ $table->links();}} -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection