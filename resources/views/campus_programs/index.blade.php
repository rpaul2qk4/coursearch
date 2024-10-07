@extends('layouts.auth_app')

@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('campuses.index',$campus->university_id)}}" class="no-decoration">Campuses</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	<span class="no-decoration text-danger">{{$campus->campus}}</span> campus programs
	</li>
@endsection

@section('content')

<div class="container">



    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Campus Programs<span class="badge bg-danger justify-content-start ml-2">{{$campus->campus_programs->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('campus_programs.create',$campus->id)}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						        <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>Program&nbsp;(&nbsp;<span style="font-size:10px;color:red">Total Disciplines</span>&nbsp;)</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($campus->campus_programs as $campus_program)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td><a href="{{route('program_disciplines.index',$campus_program->id)}}">{{$campus_program->program->program}}&nbsp;(&nbsp;<span style="font-size:10px;color:red">{{$campus_program->program_disciplines->count()}}</span>&nbsp;)</a></td>
									<td class="text-center">
										<a class="" href="{{route('campus_programs.show',$campus_program->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('campus_programs.edit',$campus_program->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('campus_programs.delete',$campus_program->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
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
