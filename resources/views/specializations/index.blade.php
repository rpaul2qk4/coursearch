@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('specializations.index',$discipline->id)}}" class="no-decoration">Disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	<span class="text-danger">{{$discipline->discipline}} </span></a> specializations
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"> <span>Specializations<span class="badge bg-danger justify-content-start ml-2">{{$discipline->specializations->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('specializations.create',$discipline->id)}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>Specialization&nbsp;(&nbsp;<span style="font-size:10px;color:red">Total Courses</span>&nbsp;)</th>
									<th>Code</th>
									<th>Pdf File</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($discipline->specializations as $specialization)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td><a class="" href="{{route('courses.index',$specialization->id)}}">{{$specialization->specialization}}&nbsp;(&nbsp;<span style="font-size:10px;color:red">{{$specialization->courses->count()}}</span>&nbsp;)</a></td>
									<td>{{$specialization->code}}</td>
									<td>@if(!empty($specialization->sp_pdf)) <span class="text-success">.{{explode('.',$specialization->sp_pdf)[1]}} file is uploaded</span> @else  <span class="text-danger">please upload file</span> @endif</td>
									<td class="text-center">
										<a class="" href="{{route('specializations.show',$specialization->id)}}" target="_blank"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('specializations.edit',$specialization->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('specializations.delete',$specialization->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
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
