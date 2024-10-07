@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('branch_specializations.index',$branch_specialization->discipline_branch_id)}}" class="no-decoration"><span class="text-danger">{{$branch_specialization->branch->branch}} </span>  branch specializations</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	 <span class="text-danger">{{$branch_specialization->specialization->specialization}} </span> specialization details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Details') }}</div>

                <div class="card-body">
					<div>
					   <label>Specialization&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->specialization->specialization}}&nbsp;({{$branch_specialization->specialization->code}})</span>
					</div>
				
					<div>
					   <label>Course&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->course->course}}&nbsp;({{$branch_specialization->course->code}})</span>
					</div>
					<div>
					   <label>Course Ranking&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->course_ranking}}</span>
					</div>
				
					<div>
					   <label>Description&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->specialization->description}}</span>
					</div>
					<div>
					   <label>Application Deadline&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->apply_deadline}}</span>
					</div>
					<div>
					   <label>Start Date&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->start_date}}</span>
					</div>
					<div>
					   <label>Acceptance Rate&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->acceptance_rate}}%</span>
					</div>
					<div>
					   <label>GPA Request Rate&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->gpa_req_rate}}</span>
					</div>
					<div>
					   <label>Scholorship&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->scholorship}}</span>
					</div>
				
					<div>
					   <label>University&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->university->university}}&nbsp;({{$branch_specialization->university->code}})</span>
					</div>
					<div>
					   <label>University Type&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->program->program}}&nbsp;({{$branch_specialization->program->code}})</span>
					</div>
					<div>
					   <label>Discipline&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->discipline->discipline}}&nbsp;({{$branch_specialization->discipline->code}})</span>
					</div>
					<div>
					   <label>Branch&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->branch->branch}}&nbsp;({{$branch_specialization->branch->code}})</span>
					</div>
					<div>
					   <label>Attendance&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->attendance->attendance}}</span>
					</div>
					<div>
					   <label>Duration&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$branch_specialization->duration->duration}}</span>
					</div>
					<div>
					   <label>Application Fee &nbsp;:&nbsp;&nbsp;</label>
					   <span><span><i class="fa fa-{{$branch_specialization->university->country->currency_icon}}" style="font-size:18px"></i>{{$branch_specialization->apply_fee}}/-</span>
					</div>
					<div>
					   <label class="text-danger">Fees Details&nbsp;:&nbsp;&nbsp;</label>
					   @foreach($branch_specialization->branch_specialization_fees as $branch_specialization_fee)
					   <p>University Type&nbsp;:&nbsp;&nbsp;<span>{{$branch_specialization_fee->format->format}}</span> &nbsp; &nbsp;|&nbsp;&nbsp; Fees&nbsp;:&nbsp;&nbsp;  <span><i class="fa fa-{{$branch_specialization_fee->branch_specialization->university->country->currency_icon}}" style="font-size:18px"></i>{{$branch_specialization_fee->fees}}/-</span></p>
					   @endforeach
					</div>
					
					<div>
					   <label class="text-danger">Score Details&nbsp;:&nbsp;&nbsp;</label>
					   @foreach($branch_specialization->branch_specialization_requirements as $branch_specialization_requirement)
					   <p>Requirement&nbsp;:&nbsp;&nbsp;<span>{{$branch_specialization_requirement->requirement->requirement}}</span> &nbsp; &nbsp;|&nbsp;&nbsp; Score&nbsp;:&nbsp;&nbsp;  <span>{{$branch_specialization_requirement->score}}</span></p>
					   @endforeach
					</div>					
					
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
