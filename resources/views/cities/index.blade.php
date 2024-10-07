@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('countries.index')}}" class="no-decoration">Countries</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('states.index',$state->country->id)}}" class="no-decoration">States</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		<span class="text-danger">{{$state->country->country}}</span> - <span class="text-success">{{$state->state}}</span> cities
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Cities<span class="badge bg-danger justify-content-start ml-2">{{$state->cities->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('cities.create',$state->id)}}"><i class="fa fa-plus"></i></a>
				</div>
                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th>S.No</th>
									<th>City</th>
									<th>Code</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($state->cities as $city)
								<tr>
									<td>{{$sno++}}</td>
									<td><a href="#">{{$city->city}}</a></td>
									<td>{{$city->code}}</td>
									<td>
										<a class="" href="{{route('cities.show',$city->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('cities.edit',$city->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('cities.delete',$city->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>
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
