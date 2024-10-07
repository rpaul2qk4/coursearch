@extends('layouts.auth_app')

@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		<span class="text-danger">Universities</span> list
	</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Universities<span class="badge bg-danger justify-content-start ml-2">{{$universities->count()}}</span></span>
					<a class="pull-right btn btn-primary" href="{{route('universities.create')}}"><i class="fa fa-plus"></i></a>
					<!--
					<a class="pull-right btn btn-success" style="margin-right:6px;" href="{{route('universities.import')}}" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload excel file"><i class="fa fa-upload"></i></a>
					<a class="pull-right btn btn-secondary" style="margin-right:6px;" href="{{asset('build/assets/excel-files/Universities.xls')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Download excel file"><i class="fa fa-download"></i></a>
					<a class="pull-right btn btn-warning" style="margin-right:6px;" href="{{route('universities.export')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Download universities excel sheet"><i class="fa fa-file"></i></a>
					-->
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>University&nbsp;(&nbsp;<span style="font-size:10px;color:red">Total Campuses</span>&nbsp;)</th>
									<th class="text-center">Code</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($universities as $university)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td><a href="{{route('campuses.index',$university->id)}}">{{$university->university}}&nbsp;(&nbsp;<span style="font-size:10px;color:red">{{$university->campuses->count()}}</span>&nbsp;)</a></td>
									<td class="text-center">{{$university->code}}</td>
									<td>
										<a class="" href="{{route('universities.show',$university->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('universities.edit',$university->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('universities.delete',$university->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash  text-danger"></i></a>
									
									</td>
								</tr>
							@empty
								<tr><td colspan="4">No data found!</td></tr>
							@endforelse	
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
	{{$universities->links()}}
</div>



<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Upload Universities</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>   
		<form method="POST" action="{{ route('universities.import') }}" file="true" enctype="multipart/form-data">
		@csrf      
			<div class="modal-body">
				<div class="row mb-3 justify-content-center">
				
					<div class="col-md-8">
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
