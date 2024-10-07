@extends('layouts.auth_app')

@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('program_disciplines.index',$program_discipline->campus_program->id)}}" class="no-decoration">{{$program_discipline->campus_program->campus->campus}} - <span style="color:red" href="{{route('campus_programs.index',$program_discipline->campus_program->campus_id)}}">{{$program_discipline->campus_program->program->program}}</span> disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	<span class="text-danger">{{$program_discipline->discipline->discipline}} </span> discipline branches
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Discipline Branches<span class="badge bg-danger justify-content-start ml-2">{{$program_discipline->discipline_branches->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('discipline_branches.create',$program_discipline->id)}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>Branch&nbsp;(&nbsp;<span style="font-size:10px;color:red">Total Specializations with Courses</span>&nbsp;)</th>
									<th>Branch code</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($program_discipline->discipline_branches as $discipline_branch)
								
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td><a class="no-decoration" href="{{route('branch_specializations.index',$discipline_branch->id)}}">{{!empty($discipline_branch->branch)?$discipline_branch->branch->branch:'***'}}&nbsp;(&nbsp;<span style="font-size:10px;color:red">{{$discipline_branch->branch_specializations->count()}}</span>&nbsp;)</a></td>
									<td>{{!empty($discipline_branch->branch)?$discipline_branch->branch->code:'***'}}</td>
									<td class="text-center">
										<a class="" href="{{route('discipline_branches.show',$discipline_branch->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('discipline_branches.edit',$discipline_branch->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('discipline_branches.delete',$discipline_branch->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
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
