@extends('layouts.auth_app')

@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('campus_programs.index',$campus_program->campus_id)}}" class="no-decoration">{{$campus_program->campus->campus}} - Programs</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	{{$campus_program->campus->campus}} - <span style="color:red" href="{{route('campus_programs.index',$campus_program->campus_id)}}">{{$campus_program->program->program}}</span> disciplines
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"> <span>Program Disciplines<span class="badge bg-danger justify-content-start ml-2">{{$campus_program->program_disciplines->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('program_disciplines.create',$campus_program->id)}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>Discipline&nbsp;(&nbsp;<span style="font-size:10px;color:red">Total Branches</span>&nbsp;)</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
							@forelse($campus_program->program_disciplines as $program_discipline)
								<tr>
									<td class="text-center">{{$sno++}}</td>
									<td><a class="no-decoration" href="{{route('discipline_branches.index',$program_discipline->id)}}">{{$program_discipline->discipline->discipline}}&nbsp;(&nbsp;<span style="font-size:10px;color:red">{{$program_discipline->discipline_branches->count()}}</span>&nbsp;)</a></td>
									<td class="text-center">
										<a class="" href="{{route('program_disciplines.show',$program_discipline->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('program_disciplines.edit',$program_discipline->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
										<a class="" href="{{route('program_disciplines.delete',$program_discipline->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
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
