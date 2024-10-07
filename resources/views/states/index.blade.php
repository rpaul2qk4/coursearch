@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('countries.index')}}" class="no-decoration">Countries</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		{{$country->country}} states
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>States<span class="badge bg-danger justify-content-start ml-2">{{$country->states->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('states.create',$country->id)}}"><i class="fa fa-plus"></i></a>
				</div>
					
                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>State</th>
									<th class="text-center">Code</th>
									<th class="text-center">Total Cities</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($country->states as $state)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td><a href="{{route('cities.index',$state->id)}}">{{$state->state}}</a></td>
									<td class="text-center">{{$state->code}}</td>
									<td class="text-center">
									@if($state->cities->count())
										<span class="badge bg-success">{{$state->cities->count()}}</span>
									@else
										<span class="badge bg-danger">{{$state->cities->count()}}</span>
									@endif
									</td>
									<td>
										<a class="" href="{{route('states.show',$state->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('states.edit',$state->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										@if($state->cities->count()==0)
										<a class="" href="{{route('states.delete',$state->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>
									@endif	
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
