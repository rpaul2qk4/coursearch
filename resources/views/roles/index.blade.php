@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	
	<li class="breadcrumb-item active" aria-current="page">
		Roles
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Roles<span class="badge bg-danger justify-content-start ml-2">{{$roles->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('roles.create')}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
							<input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Role</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($roles as $role)
								<tr>
									<td>{{$sno++}}</td>
									<td>{{$role->role}}</td>
									<td>
										<a class="" href="{{route('roles.show',$role->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('roles.edit',$role->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('roles.delete',$role->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>
									</td>
								</tr>
							@empty
								<tr><td colspan="3">No data found!</td></tr>
							@endforelse	
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() { 
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });
	});
</script>
@endsection
