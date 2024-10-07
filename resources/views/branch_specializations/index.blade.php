@extends('layouts.auth_app')

@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('discipline_branches.index',$discipline_branch->program_discipline_id)}}" class="no-decoration"><span class="text-danger">{{$discipline_branch->discipline->discipline}} </span> discipline branches</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	<span class="text-danger">{{$discipline_branch->branch->branch}} </span> branch specializations
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Specialization with Courses <span class="badge bg-danger justify-content-start ml-2">{{$discipline_branch->branch_specializations->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('branch_specializations.create',$discipline_branch->id)}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>Specialization</th>
									<th>Course</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($discipline_branch->branch_specializations as $branch_specialization)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td>{{$branch_specialization->specialization->specialization}}</td>
									<td>{{!empty($branch_specialization->course)?$branch_specialization->course->course:'***'}}</td>
									<td>{{$branch_specialization->start_date}}</td>
									<td>{{$branch_specialization->apply_deadline}}</td>
									<td class="text-center">
										<a class="" href="{{route('branch_specializations.show',$branch_specialization->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('branch_specializations.edit',$branch_specialization->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('branch_specializations.delete',$branch_specialization->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
									</td>
								</tr>
							@empty
								<tr><td colspan="6">No data found!</td></tr>
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
