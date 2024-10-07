@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Users List
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Users<span class="badge bg-danger justify-content-start ml-2">{{$users->count()}}</span></span>
					<a class="pull-right btn btn-primary" style="margin-right:6px;" href="{{route('users.create')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Create user"><i class="fa fa-plus"></i></a>
					<!--
					<a class="pull-right btn btn-success" style="margin-right:6px;" href="{{route('users.import')}}" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload excel file"><i class="fa fa-upload"></i></a>
					<a class="pull-right btn btn-secondary" style="margin-right:6px;" href="{{asset('build/assets/excel-files/Users.xls')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Download excel file"><i class="fa fa-download"></i></a>
					<a class="pull-right btn btn-warning" style="margin-right:6px;" href="{{route('users.export')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Download users excel sheet"><i class="fa fa-file"></i></a>
					-->
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						        <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Role</th>
									<th>Permission</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($users as $user)
								<tr>
									<td>{{$sno++}}</td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->mobile}}</td>
									<td>{{$user->role->role}}</td>
									<td>
										@if(!strcmp($user->role->role,'Admin'))
											<a class="text-success" style="text-decoration:none" href="#">Perminent Access</a>&nbsp;&nbsp;
										@else
											@if(!$user->flag)
												<a class="btn btn-success btn-sm" href="{{route('users.permission',['id'=>$user->id,'flag'=>1])}}">Permit Access</a>&nbsp;&nbsp;
											@else
												<a class="btn btn-danger btn-sm" href="{{route('users.permission',['id'=>$user->id,'flag'=>0])}}">Stop Permission</a>&nbsp;&nbsp;
											@endif	
										@endif	
									</td>
									<td>
										<a class="" href="{{route('users.show',$user->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('users.edit',$user->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('users.delete',$user->id)}}"><i class="fa fa-trash text-danger"></i></a>
									</td>
								</tr>
							@empty
								<tr><td colspan="5">No data found!</td></tr>
							@endforelse	
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Upload Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>   
		<form method="POST" action="{{ route('users.import') }}" file="true" enctype="multipart/form-data">
		@csrf      
			<div class="modal-body">
				<div class="row mb-3">
					<label for="uploaded_file" class="col-md-4 col-form-label text-md-end">{{ __('Upload File') }}</label>

					<div class="col-md-6">
						<input id="uploaded_file" type="file" class="form-control @error('uploaded_file') is-invalid @enderror" name="uploaded_file" value="{{ old('uploaded_file') }}" required autocomplete="uploaded_file" autofocus>

						@error('uploaded_file')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
	  		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Upload File</button>
			</div>
		</form>
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
