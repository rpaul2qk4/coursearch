@extends('layouts.app')
@section('content')
    <section class="py-3 py-md-8 bg-white">
		<div class="container-fluid">
		@include('common.flash')
		<!-- CONTROL BAR
		================================================== -->
			<div class="container-fluid mb-3 mb-xl-6 z-index-2  d-flex justify-content-between bg-dark">
				<div>
				   <nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-scroll justify-content-center">
							<li class="breadcrumb-item">
								<a class="text-gray-800" href="{{url('/')}}">
									Home
								</a>
							</li>
							<li class="breadcrumb-item text-gray-800 active" aria-current="page">
								Specialization course details
							</li>
						</ol>
					</nav>
				</div>
				<div class="d-lg-flex align-items-center mb-6 mb-xl-0"  style="width:80%">
					 <marquee><span class="mb-lg-0 text-white">We found <span class="">{{$branch_specialization->specialization->specialization}} </span> specialization details for you</span> </marquee>
				</div>
			</div>
			<style>
			.min-height-80 {
				min-height: 0px !important; 
			}
			</style>
			<div class="row" style="padding-left:3%;padding-right:3%;">
				<div class="container">
			
					<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
				
						<div>
						   <label>Specialization&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$branch_specialization->specialization->specialization}}&nbsp;({{$branch_specialization->specialization->code}})</span>
						</div>
					
						<div>
						   <label>Course&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$branch_specialization->course->course}}&nbsp;({{$branch_specialization->course->code}})</span>
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
						   <label>Website&nbsp;:&nbsp;&nbsp;</label>
						   <span><a href="{{$branch_specialization->university->formatted_website}}" style="color:blue">{{$branch_specialization->university->website}}</a></span>
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
						   <span>{{$branch_specialization->discipline_branch->branch->branch}}&nbsp;({{$branch_specialization->discipline_branch->branch->code}})</span>
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
						   <span><span><i class="fa fa-{{$branch_specialization->university->country->currency_icon}}" style="font-size:14px;color:red"></i>{{$branch_specialization->apply_fee}}/-</span>
						</div>
						<div>
						   <label>Country &nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$branch_specialization->university->country->country}}</span>
						</div>
						<div>
						   <label>State &nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$branch_specialization->university->state->state}}</span>
						</div>
					</div>
					<div class="row">
						<div>
						   <label>Description&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$branch_specialization->specialization->description}}
						   </span>
						</div>
					</div>
					<hr>
					<div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4">
			
						<div>
						   <label class="text-danger">Fees Details&nbsp;:&nbsp;&nbsp;</label>
						   @foreach($branch_specialization->branch_specialization_fees as $branch_specialization_fee)
						   <p>University Type&nbsp;:&nbsp;&nbsp;<span>{{$branch_specialization_fee->format->format}}</span> </p><p>Fees&nbsp;:&nbsp;&nbsp;  <span><i class="fa fa-{{$branch_specialization_fee->branch_specialization->university->country->currency_icon}}" style="font-size:14px;color:red"></i>{{$branch_specialization_fee->fees}}/-</span></p>
						   @endforeach
						</div>
						
						<div>
						   <label class="text-danger">Required Score Details&nbsp;:&nbsp;&nbsp;</label>
						   @foreach($branch_specialization->branch_specialization_requirements as $branch_specialization_requirement)
						   
						   <p><span>{{$branch_specialization_requirement->requirement->requirement}}</span> &nbsp; &nbsp;|&nbsp;&nbsp; Score&nbsp;:&nbsp;&nbsp;  <span>{{$branch_specialization_requirement->score}}</span></p>
						   @endforeach
						</div>	
						
					</div>
				</div>
			</div>
		</div>
    </section>
@endsection	