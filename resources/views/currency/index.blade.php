@extends('layouts.auth_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header">{{ __('Countries') }}
					<a class="btn btn-primary pull-right" href="{{route('countries.create')}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>Country</th>
									<th class="text-center">Code</th>
									<th class="text-center">Total States</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($countries as $country)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td><a href="{{route('states.index',$country->id)}}">{{$country->country}}</a></td>
									<td class="text-center">{{$country->code}}</td>
									<td class="text-center">
									@if($country->states->count())
										<span class="badge bg-success">{{$country->states->count()}}</span>
									@else
										<span class="badge bg-danger">{{$country->states->count()}}</span>
									@endif
									</td>
									<td>
										<a class="" href="{{route('countries.show',$country->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('countries.edit',$country->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									@if($country->states->count()==0)
										<a class="" href="{{route('countries.delete',$country->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash  text-danger"></i></a>
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
