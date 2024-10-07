@extends('layouts.app')
@section('content')

<section class="py-6 py-md-8 bg-white">
	<div class="container-fluid">

      <!--  <div class="container text-center py-xl-2">
            <h1 class="display-4 fw-semi-bold mb-0">Courses List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-scroll justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="text-gray-800" href="{{url('/')}}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item text-gray-800 active" aria-current="page">
                        Courses List
                    </li>
                </ol>
            </nav>
        </div>   --> 

    <!-- CONTROL BAR
    ================================================== -->
    <div class="container-fluid mb-5 mb-xl-4 z-index-2  d-flex justify-content-between align-items-center bg-dark">
        	<div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-scroll justify-content-center">
						<li class="breadcrumb-item">
							<a class="text-gray-800" href="{{url('/')}}">
								Home
							</a>
						</li>
						<li class="breadcrumb-item text-gray-800 active" aria-current="page">
							Courses List
						</li>
					</ol>
				</nav>
			</div>   
		
			<div  style="width:80%">
				<marquee><span class="mb-lg-0 h5 text-white">We found <span class="text-dark1">{{$total_specializations}}</span> available specializations</span></marquee>
			</div>
			 <!-- Button trigger modal -->							
				<!-- Button trigger modal -->
			<div>
				<a type="button" class="btn btn-primary1 text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
				  <i class="fa fa-filter"></i>
				</a>
			</div>
	</div>
	<style>
		.min-height-80 {
			min-height: 0px !important; 
		}
		.pt-md-11 {
			padding-top: 3rem !important; 
		}
	</style>
        <div class="row">
            <div class="col-xl-3 ">
                <!-- SIDEBAR FILTER
                ================================================== -->
                <div class=" vertical-scroll" id="courseSidebar1">
                 <form action="{{route('courses.course-list')}}" method="GET"  name="search_form" enctype="multipart/form-data">
					@csrf   
					<!-- Discipline start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="curriculumheadingTwo">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#disciplineFilter" aria-expanded="true" aria-controls="disciplineFilter">
								   
										<div>
										Discipline
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="disciplineFilter" class="collapse show" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum" style="height:100px;overflow-y:scroll">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
							
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
										@forelse(DataHelper::getDisciplines() as $discipline)
											<li class="custom-control custom-checkbox">
												<input type="radio" name="course_list_data[disciplines][]" value="{{$discipline->id}}" class="custom-control-input" id="discipline{{$discipline->id}}" @if(!empty($course_list_data['disciplines']) && (in_array($discipline->id, $course_list_data['disciplines'])))checked @endif>
												<label class="custom-control-label font-size-base" for="discipline{{$discipline->id}}">{{ucfirst($discipline->discipline)}} ({{$discipline->branch_specializations->count()}})</label>
												<!--	
													@if($discipline->discipline_branches->count())													
														<ul class="list-unstyled list-group list-checkbox">
															@foreach($discipline->discipline_branches as $disp_branch)
																@if(!empty($disp_branch->branch))
																<li class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="instructorscustomcheck5">
																	<label class="custom-control-label font-size-base" for="instructorscustomcheck5">{{$disp_branch->branch->branch}} ({{$disp_branch->branch_specializations->count()}})</label>
																</li>
																@endif
															@endforeach
														</ul>
													@endif 
												-->
											</li>
										@empty	
											<li class="custom-control custom-checkbox">
												<label class="custom-control-label font-size-base" >No data found!</label>
											</li>
										@endforelse										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Discipline end -->
					<!-- Loaction start 
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="curriculumheadingTwo">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#locationFilter" aria-expanded="false" aria-controls="locationFilter">
								   
										<div>
										 Location
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
												
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>			
								   
								</button>
							</h5>
						</div>

						<div id="locationFilter" class="collapse show1" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum">
							
							

                            <div class="border-top px-5 py-4 min-height-70 d-md-flex1 align-items-center">
								
									
										<div class="input-group">
											<input class="form-control form-control-sm border-end-0 shadow-none" type="search" placeholder="Search" aria-label="Search">
											<div class="input-group-append">
												<button class="btn btn-sm btn-outline-white border-start-0 text-dark bg-transparent" type="submit">
													
													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.8477 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.8477 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.8477 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor"/>
														<path d="M19.762 18.6121L15.1007 13.9509C14.7831 13.6332 14.2687 13.6332 13.9511 13.9509C13.6335 14.2682 13.6335 14.7831 13.9511 15.1005L18.6124 19.7617C18.7712 19.9205 18.9791 19.9999 19.1872 19.9999C19.395 19.9999 19.6032 19.9205 19.762 19.7617C20.0796 19.4444 20.0796 18.9295 19.762 18.6121Z" fill="currentColor"/>
													</svg>

												</button>
											</div>
										</div>
																
							
									<ul class="list-unstyled list-group list-checkbox list-checkbox-limit">
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck1">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck1">Chris Convrse (03)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck2">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck2">Morten Rand (15)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck3">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck3">Rayi Villalobos (125)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck4">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck4">James William (1.584)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck5">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck5">Villalobos (584)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck6">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck6">Rand joe (44)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck7">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck7">Rand joe (44)</label>
										</li>
									</ul>
								
								
							</div>
							
						</div>
					</div>
					Location end -->
					
					<!-- Tution fee start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="tutionHeading">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#tutionFeeFilter" aria-expanded="true" aria-controls="tutionFeeFilter">
								   
										<div>
										 Tution Fee
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
												
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>			
								   
								</button>
							</h5>
						</div>

						<div id="tutionFeeFilter" class="collapse show" aria-labelledby="tutionHeading" data-parent="#accordionCurriculum">

                            <div class="border-top px-5 py-4 min-height-70 d-md-flex1 align-items-center">
								
								
                                
									<div class="input-group mb-3">
										<span class="input-group-text">Fees&nbsp;<i class="fa fa-rupee fa-1x"></i>&nbsp;|&nbsp;<i class="fa fa-usd fa-1x"></i></span>
										<input id="amount" type="text" class="form-control" placeholder="0" value="{{$course_list_data['fees']??0}}" name="course_list_data[fees]"  >
									</div>  
									<small>Fee Details =>  Min : 0 - Max : 9999999</small>                                  
                             
								

								<input type="range" class="form-range" min="0" max="9999999" step="1" value="{{$course_list_data['fees']??0}}" id="slider-range" >
			
							</div>
							<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

							<script>
							$(document).ready(function(){
								
								$('#slider-range').change(function(){
									$('#amount').val($(this).val());
								});
								$('#amount').change(function(){
									$('#slider-range').val($(this).val());
								});
								
							});
							</script>
						</div>
					</div>
					<!-- Tution fee end -->
					
					
					<!-- Format Type start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="degreeType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#durationFilter" aria-expanded="true" aria-controls="durationFilter">
								   
										<div>
										Duration
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="durationFilter" class="collapse show" aria-labelledby="formatFilter" data-parent="#accordionCurriculum" style="height:100px;overflow-y:scroll">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getDurations() as $duration)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="formatFilter{{$duration->id}}" name="course_list_data[duration][]" value="{{$duration->id}}" @if(!empty($course_list_data['duration']) && (in_array($duration->id, $course_list_data['duration'])))checked @endif>
											<label class="custom-control-label font-size-base" for="formatFilter{{$duration->id}}">{{ucfirst($duration->duration)}} </label>
										</li>
									@empty	
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										</li>
									@endforelse	
										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Format end -->
					
					<!-- Format Type start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="formatType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#formatFilter" aria-expanded="true" aria-controls="formatFilter">
								   
										<div>
										Format
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
												
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="formatFilter" class="collapse show" aria-labelledby="formatFilter" data-parent="#accordionCurriculum">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getFormats() as $format)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="format{{$format->id}}" name="course_list_data[formats][]" value="{{$format->id}}" @if(!empty($course_list_data['formats']) && (in_array($format->id, $course_list_data['formats'])))checked @endif>
											<label class="custom-control-label font-size-base" for="format{{$format->id}}">{{ucfirst($format->format)}} </label>
										</li>
									@empty										
										<label class="custom-control-label font-size-base" >No data found!</label>
									@endforelse	
										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Format end -->
					
					
					<!-- Format Type start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="attendanceType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#attendanceFilter" aria-expanded="true" aria-controls="attendanceFilter">
								   
										<div>
										Attendance
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="attendanceFilter" class="collapse show" aria-labelledby="attendanceFilter" data-parent="#accordionCurriculum">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getAttendance() as $attendance)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="attendanceFilter{{$attendance->id}}" name="course_list_data[attendances][]" value="{{$attendance->id}}" @if(!empty($course_list_data['attendances']) && (in_array($attendance->id, $course_list_data['attendances'])))checked @endif>
											<label class="custom-control-label font-size-base" for="attendanceFilter{{$attendance->id}}">{{ucfirst($attendance->attendance)}} </label>
										</li>
									@empty	
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										<li class="custom-control custom-checkbox">
									@endforelse	
										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Format end -->
					<!-- Degree Type start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="degreeType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#degreeTypeFilter" aria-expanded="true" aria-controls="degreeTypeFilter">
								   
										<div>
										Degree Type
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="degreeTypeFilter" class="collapse show" aria-labelledby="degreeType" data-parent="#accordionCurriculum">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getPrograms() as $program)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="degreeType{{$program->id}}" name="course_list_data[programs][]" value="{{$program->id}}" @if(!empty($course_list_data['programs']) && (in_array($program->id, $course_list_data['programs']))) checked @endif>
											<label class="custom-control-label font-size-base" for="degreeType{{$program->id}}">{{ucfirst($program->program)}} </label>
										</li>
									@empty										
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										<li class="custom-control custom-checkbox">
									@endforelse	
										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Degree Type end -->
					<!-- Rating start
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="curriculumheadingTwo">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#ratingFilter" aria-expanded="false" aria-controls="ratingFilter">
								   
										<div>
										 Rating
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
												
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>			
								   
								</button>
							</h5>
						</div>

						<div id="ratingFilter" class="collapse show" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum">
							
							

                            <div class="border-top px-5 py-4 min-height-70 d-md-flex1 align-items-center">
								
								<ul class="list-unstyled list-group list-checkbox">
                                
								@foreach(AppHelper::options('Rating') as $key=>$value)
                                <li class="custom-control custom-checkbox">
                                    <input type="radio" class="custom-control-input" name="course_list_data[ratings][]" id="ratingcustomcheck{{$key}}" value="{{$value}}"  @if(!empty($course_list_data['ratings']) && (in_array($value, $course_list_data['ratings'])))checked @endif >
                                    <label class="custom-control-label font-size-base" for="ratingcustomcheck{{$key}}">
                                        <span class="d-flex align-items-end">
                                            <span class="star-rating">
                                                <span class="rating" style="width:{{$value}}%;"></span>
                                            </span>

                                            <span class="ms-3">
                                                <span>& up</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
								@endforeach
                            </ul>								
								
							</div>
							
						</div>
					</div>
				Rating end -->

                   <button type="submit" class="btn btn-primary btn-block">FILTER RESULTS</button>
					
				</form> 
				</div>
            </div>

            <div class="col-xl-9">
                <!-- Card -->
                @yield('course-content')
            </div>
        </div>
    </div>
	
    </section>
	
@endsection	