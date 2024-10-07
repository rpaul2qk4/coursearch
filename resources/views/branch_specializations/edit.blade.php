@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('branch_specializations.index',$branch_specialization->discipline_branch_id)}}" class="no-decoration"><span class="text-danger">{{$branch_specialization->branch->branch}} </span>  branch specializations</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	 Edit <span class="text-danger">{{$branch_specialization->specialization->specialization}} </span> specialization details
	</li>
@endsection
@section('content')
<!--
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
 
 <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
 --> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('branch_specializations.update',$branch_specialization->id) }}">
                        @csrf

                       
                        <div class="row mb-3">
                            <label for="specializationid" class="col-md-4 col-form-label text-md-end">{{ __('Branch Specialization') }}</label>

                            <div class="col-md-6">
                        		<select class="form-select" name="specialization_id">
								@foreach($specializations as $key=>$value)
									@if($branch_specialization->specialization_id==$key)
										<option value="{{$key}}" selected>{{$value}}</option>
									@else
										<option value="{{$key}}">{{$value}}</option>
									@endif
								 @endforeach 
								</select>

                                @error('specialization_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						 <div class="row mb-3">
                            <label for="specializationid" class="col-md-4 col-form-label text-md-end">{{ __('Branch Course') }}</label>

                            <div class="col-md-6">
                        		<select class="form-select"  id='selSpecialization' name="course_id" required >
									@foreach($courses as $key=>$value)
										@if($branch_specialization->course_id==$key)
											<option value="{{$key}}" selected>{{$value}}</option>
										@else
											<option value="{{$key}}">{{$value}}</option>
										@endif
									 @endforeach 
								</select>

                                @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="course_ranking1" class="col-md-4 col-form-label text-md-end">{{ __('Course Ranking') }}</label>

                            <div class="col-md-6">
                                <input id="course_ranking" type="number" min="0" max="10000" step="1" onkeyup="enforceMinMax(this)"  class="form-control @error('course_ranking') is-invalid @enderror" name="course_ranking" value="{{ old('course_ranking',$branch_specialization->course_ranking) }}" required autocomplete="course_ranking">

                                @error('course_ranking')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date',$branch_specialization->start_date) }}" required autocomplete="start_date">

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="apply_deadline" class="col-md-4 col-form-label text-md-end">{{ __('Application Deadline') }}</label>

                            <div class="col-md-6">
                                <input id="apply_deadline" type="date" class="form-control @error('apply_deadline') is-invalid @enderror" name="apply_deadline" value="{{ old('apply_deadline',$branch_specialization->apply_deadline) }}" required autocomplete="apply_deadline">

                                @error('apply_deadline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="acceptance_rate" class="col-md-4 col-form-label text-md-end">{{ __('Acceptance Rate(%)') }}</label>

                            <div class="col-md-6">
                                <input id="acceptance_rate" type="number"  min="0" max="100" onkeyup="enforceMinMax(this)" class="form-control @error('acceptance_rate') is-invalid @enderror" name="acceptance_rate" value="{{ old('acceptance_rate',$branch_specialization->acceptance_rate) }}" required autocomplete="acceptance_rate">

                                @error('acceptance_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="gpa_req_rate" class="col-md-4 col-form-label text-md-end">{{ __('GPA Required Rate') }}</label>

                            <div class="col-md-6">
                               <input id="gpa_req_rate" type="number" min="1.0" max="4" step="0.1" onkeyup="enforceMinMax(this)" class="form-control @error('gpa_req_rate') is-invalid @enderror" name="gpa_req_rate" value="{{ old('gpa_req_rate',$branch_specialization->gpa_req_rate) }}" required autocomplete="gpa_req_rate">

	
								@error('gpa_req_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						
						
							<div class="row mb-3">
								<label for="test_score1" class="col-md-4 col-form-label text-md-end">{{ __('Test Score') }}</label>
								<div class="col-md-6">
								
									<table class="table1">
										<tbody>				
											@foreach(DataHelper::getRequirementOptions() as $key=>$value)
												@if(in_array($key,$branch_specialization->spl_requirements))
													<tr>
														<td class="col-sm-1">
															<input class="form-check-input" type="checkbox" name="requirement_score[{{$key}}][]" id="requirement_score_ids{{$key}}" value="{{$key}}" autocomplete="requirement_score[{{$key}}][]" checked>
														</td>
														<td class="col-sm-3">{{$value}}</td>
														<td class="col-sm-1"></td>
														<td class="">
															@if(!strcmp($value,"IELTS"))
																<input id="requirement_score" type="number" min="0" max="9" step="0.1" value="{{ $branch_specialization->spl_reqs[$key]}}" onkeyup="enforceMinMax(this)"  class="form-control @error('requirement_score') is-invalid @enderror" name="requirement_score[{{$key}}][]" placeholder="score..." autocomplete="requirement_score[{{$key}}][]">
															@elseif(in_array($value,["SAT","GMAT"]))
																<input id="requirement_score" type="number" min="0" max="2000" step="1" value="{{ $branch_specialization->spl_reqs[$key]}}" onkeyup="enforceMinMax(this)"  class="form-control @error('requirement_score') is-invalid @enderror" name="requirement_score[{{$key}}][]" placeholder="score..." autocomplete="requirement_score[{{$key}}][]">
															@else
																<input id="requirement_score" type="number" min="0" max="400" step="1" value="{{ $branch_specialization->spl_reqs[$key]}}" onkeyup="enforceMinMax(this)"   class="form-control @error('requirement_score') is-invalid @enderror" name="requirement_score[{{$key}}][]" placeholder="score..." autocomplete="requirement_score[{{$key}}][]">
															@endif
														</td>
													</tr>
												@else
													<tr>
														<td class="col-sm-1">
															<input class="form-check-input" type="checkbox" name="requirement_score[{{$key}}][]" id="requirement_score_ids{{$key}}" value="{{$key}}" autocomplete="requirement_score[{{$key}}][]">
														</td>
														<td class="col-sm-3">{{$value}}</td>
														<td class="col-sm-1"></td>
														<td class="">
															@if(!strcmp($value,"IELTS"))
																<input id="requirement_score" type="number" min="0" max="9" step="0.1" value="0" onkeyup="enforceMinMax(this)"  class="form-control @error('requirement_score') is-invalid @enderror" name="requirement_score[{{$key}}][]" placeholder="score..." autocomplete="requirement_score[{{$key}}][]">
															@elseif(in_array($value,["SAT","GMAT"]))
																<input id="requirement_score" type="number" min="0" max="2000" step="0.1" value="0" onkeyup="enforceMinMax(this)"  class="form-control @error('requirement_score') is-invalid @enderror" name="requirement_score[{{$key}}][]" placeholder="score..." autocomplete="requirement_score[{{$key}}][]">
															@else
																<input id="requirement_score" type="number" min="0" max="400" step="1" value="0" onkeyup="enforceMinMax(this)"   class="form-control @error('requirement_score') is-invalid @enderror" name="requirement_score[{{$key}}][]" placeholder="score..." autocomplete="requirement_score[{{$key}}][]">
															@endif
														</td>
													</tr>
												@endif
											@endforeach										
										</tbody>
									</table>								
																							
									@error('requirement_score')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						
						
						<div class="row mb-3">
                            <label for="scholorship" class="col-md-4 col-form-label text-md-end">{{ __('Scholorship') }}</label>

                            <div class="col-md-6">
                               
								@foreach(AppHelper::options('Scholorship') as $key=>$value)
									<div class="form-check form-check-inline mt-2">
										@if($branch_specialization->scholorship==$key)
											<input class="form-check-input" type="radio" name="scholorship" id="scholorship{{$key}}" value="{{$key}}" checked onclick="scholorshipFun(this)">
										@else
											<input class="form-check-input" type="radio" name="scholorship" id="scholorship{{$key}}" value="{{$key}}" onclick="scholorshipFun(this)">
										@endif
									 
									  <label class="form-check-label" for="scholorship">{{$value}}</label>
									</div>	
								@endforeach	
								
								@error('scholorship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div id="score_required" style="display:@if(!empty($branch_specialization->scholorship_link)) block @else none @endif">	
							<div class="row mb-3">
								<label for="scholorship_link1" class="col-md-4 col-form-label text-md-end">{{ __('Scholorship Link') }}</label>

								<div class="col-md-6">
									<input id="scholorship_link" type="text" class="form-control @error('scholorship_link') is-invalid @enderror" name="scholorship_link" value="{{ old('scholorship_link',$branch_specialization->scholorship_link) }}" autocomplete="scholorship_link">

									@error('scholorship_link')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
                        </div>
						
						<div class="row mb-3">
                            <label for="duration" class="col-md-4 col-form-label text-md-end">{{ __('Duration') }}</label>
                            <div class="col-md-6">
								@foreach(DataHelper::getDurationOptions() as $key=>$value)
									<div class="form-check form-check-inline mt-2">
										@if($branch_specialization->duration_id==$key)
											<input class="form-check-input" type="radio" name="duration_id" id="duration_id{{$key}}" value="{{$key}}" checked>
										@else
											<input class="form-check-input" type="radio" name="duration_id" id="duration_id{{$key}}" value="{{$key}}">
										@endif	 
										<label class="form-check-label" for="duration_id">{{$value}}</label>
									</div>								
								@endforeach																
								@error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="attendance_id" class="col-md-4 col-form-label text-md-end">{{ __('Attendance') }}</label>
                            <div class="col-md-6">
								@foreach(DataHelper::getAttendanceOptions() as $key=>$value)
									<div class="form-check form-check-inline mt-2">
										@if($branch_specialization->attendance_id==$key)
											<input class="form-check-input" type="radio" name="attendance_id" id="attendance_id{{$key}}" value="{{$key}}" checked>
										@else
											<input class="form-check-input" type="radio" name="attendance_id" id="attendance_id{{$key}}" value="{{$key}}">
										@endif										  
									  <label class="form-check-label" for="attendance_id">{{$value}}</label>
									</div>											
								@endforeach																
								@error('attendance_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
					
						<div class="row mb-3">
                            <label for="format1" class="col-md-4 col-form-label text-md-end">{{ __('Format') }}</label>
                            <div class="col-md-6">
							
								<table class="table1">
									<tbody>								
								
										@foreach(DataHelper::getFormatOptions() as $key=>$value)
											@if(in_array($key,$branch_specialization->sp_format))
												<tr>
													<td class="col-sm-1">
														<input class="form-check-input" type="checkbox" name="annual_fees[{{$key}}][]" id="formatids{{$key}}" value="{{$key}}" autocomplete="annual_fees[{{$key}}][]" checked>
													</td>
													<td class="col-sm-3">{{$value}}</td>
													<td class="col-sm-1">
														<i style="font-size:14px" class="fa fa-{{$branch_specialization->university->country->currency_icon}}"></i>
													</td>
													<td >
														<input id="annual_fees" type="number" min="0" class="form-control @error('annual_fees') is-invalid @enderror" name="annual_fees[{{$key}}][]" value="{{$branch_specialization->sp_fees[$key]}}" placeholder="Annual tution fee..." autocomplete="annual_fees[{{$key}}][]">
													</td>
												</tr>
											@else
												<tr>
													<td class="col-sm-1">
														<input class="form-check-input" type="checkbox" name="annual_fees[{{$key}}][]" id="formatids{{$key}}" value="{{$key}}" autocomplete="annual_fees[{{$key}}][]">
													</td>
													<td class="col-sm-3">{{$value}}</td>
													<td class="col-sm-1">
														<i style="font-size:14px" class="fa fa-{{$branch_specialization->university->country->currency_icon}}"></i>
													</td>
													<td >
														<input id="annual_fees" type="number" min="0" class="form-control @error('annual_fees') is-invalid @enderror" name="annual_fees[{{$key}}][]" placeholder="Annual tution fee..." autocomplete="annual_fees[{{$key}}][]">
													</td>
												</tr>
											@endif
										
										@endforeach	
									
									</tbody>
								</table>
																						
								@error('format')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>						
						
						<div class="row mb-3">
                            <label for="curriculum_link1" class="col-md-4 col-form-label text-md-end">{{ __('Curriculum Link') }}</label>

                            <div class="col-md-6">
                                <input id="curriculum_link " type="text" class="form-control @error('curriculum_link') is-invalid @enderror" name="curriculum_link" value="{{ old('curriculum_link',$branch_specialization->curriculum_link) }}" required autocomplete="curriculum_link">
                                @error('curriculum_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="apply_link1" class="col-md-4 col-form-label text-md-end">{{ __('Apply Link') }}</label>
                            <div class="col-md-6">
                                <input id="apply_link " type="text" class="form-control @error('apply_link') is-invalid @enderror" name="apply_link" value="{{ old('apply_link',$branch_specialization->apply_link) }}" required autocomplete="apply_link">
                                @error('apply_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="entry_requirements_link1" class="col-md-4 col-form-label text-md-end">{{ __('Entry Requirements Link') }}</label>
                            <div class="col-md-6">
                                <input id="entry_requirements_link" type="text" class="form-control @error('entry_requirements_link') is-invalid @enderror" name="entry_requirements_link" value="{{ old('entry_requirements_link',$branch_specialization->entry_requirements_link) }}" required autocomplete="entry_requirements_link">
                                @error('entry_requirements_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="catalogue_link1" class="col-md-4 col-form-label text-md-end">{{ __('Catalogue Link') }}</label>
                            <div class="col-md-6">
                                <input id="catalogue_link" type="text" class="form-control @error('catalogue_link') is-invalid @enderror" name="catalogue_link" value="{{ old('catalogue_link',$branch_specialization->catalogue_link) }}" required autocomplete="catalogue_link">
                                @error('catalogue_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
													
						<div class="row mb-3">
                            <label for="apply_fee" class="col-md-4 col-form-label text-md-end">{{ __('Apply Fee') }}&nbsp;&nbsp;<i style="font-size:14px" class="fa fa-{{$branch_specialization->university->country->currency_icon}}"></i></label>

                            <div class="col-md-6">
                                <input id="apply_fee" type="number" class="form-control @error('apply_fee') is-invalid @enderror" name="apply_fee" value="{{ old('apply_fee',$branch_specialization->apply_fee) }}" required autocomplete="apply_fee">
                                @error('apply_fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row p-3">	
							Semister	<span id="message"></span>					
							<table>								
								@foreach(AppHelper::options('Semisters') as $key=>$value )
									@if(!empty($semisters[$key]))
										<tr class="">										
											<td class="col-2">
												<div class="form-check form-check-inline">
													<input class="form-control" id="semisterid{{$semisters[$key]['id']}}" name="sem[{{$key}}][id]"  type="hidden"  value="{{$semisters[$key]['id']}}">
													<input class="form-check-input" semId="{{$semisters[$key]['id']}}" add-attr="semister{{$key}}" id="semister{{$key}}" name="sem[{{$key}}][semister]"  onchange="clearRow({{$key}})" type="checkbox" @if(!empty($semisters[$key]['id']) && !empty($semisters[$key]['app_start_date']) && !empty($semisters[$key]['app_end_date'])) checked @endif value="{{$value}}" onclick="uncheckTextBox({{$key}})">
													<label class="form-check-label" for="inlineCheckbox1">{{$value}}</label>
												</div>
											</td>	
											
											<td class="col-1" style="text-align:right">Deadline</td>									
											<td class="col-1">
												<input id="app_end_date{{$key}}" type="date" class="form-control @error('app_end_date') is-invalid @enderror"  name="sem[{{$key}}][app_end_date]" value="{{ old('app_end_date',$semisters[$key]['app_end_date']) }}" placeholder="End date"  autocomplete="app_end_date">
												@error('app_end_date')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</td>													
											
											<td class="col-1" style="text-align:right">Startdate</td>									
											<td class="col-1">
												<input id="app_start_date{{$key}}" type="date" class="form-control @error('app_start_date') is-invalid @enderror"  name="sem[{{$key}}][app_start_date]" value="{{ old('app_start_date',$semisters[$key]['app_start_date']) }}" placeholder="Start date"  autocomplete="app_start_date">
												@error('app_start_date')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</td>									
																			
											<td class="col-1" style="text-align:right">	
											Early
											</td>
											<td class="col-2">	
												<input id="university_early_decision_date{{$key}}" type="date" class="form-control @error('university_early_decision_date') is-invalid @enderror" name="sem[{{$key}}][university_early_decision_date]" value="{{ old('university_early_decision_date',$semisters[$key]['university_early_decision_date']) }}"  autocomplete="university_early_decision_date">
											</td>
										
											<td class="col-1" style="text-align:right">	
												Regular
											</td>
											<td class="col-2">	
												<input id="university_regular_decision_date{{$key}}" type="date" class="form-control @error('university_regular_decision_date') is-invalid @enderror" name="sem[{{$key}}][university_regular_decision_date]" value="{{ old('university_regular_decision_date',$semisters[$key]['university_regular_decision_date']) }}"  autocomplete="university_regular_decision_date">
											</td>
																		
										</tr>
									@else
										<tr class="">										
											<td class="col-2">
												<div class="form-check form-check-inline">
													<input class="form-check-input" add-attr="semister{{$key}}" id="semister{{$key}}"  type="checkbox" onclick="uncheckTextBox({{$key}})">
													<input class="form-check-input" name="sem[{{$key}}][semister]"  type="hidden"  value="{{$value}}">
													<label class="form-check-label" for="inlineCheckbox1">{{$value}}</label>
													
												</div>
											</td>									
																			
											<td class="col-1" style="text-align:right">Deadline</td>									
											<td class="col-1">
												<input id="app_end_date{{$key}}" type="date" class="form-control @error('app_end_date') is-invalid @enderror"  name="sem[{{$key}}][app_end_date]" value="{{ old('app_end_date') }}" placeholder="End date" autocomplete="app_end_date">
												@error('app_end_date')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</td>	

											<td class="col-1" style="text-align:right">Startdate</td>									
											<td class="col-1">
												<input id="app_start_date{{$key}}" type="date" class="form-control @error('app_start_date') is-invalid @enderror"  name="sem[{{$key}}][app_start_date]" value="{{ old('app_start_date') }}" placeholder="Start date" autocomplete="app_start_date">
												@error('app_start_date')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</td>	
											
											<td class="col-1" style="text-align:right">	
												Early
											</td>
											<td class="col-2">	
												<input id="university_early_decision_date{{$key}}" type="date" class="form-control @error('university_early_decision_date') is-invalid @enderror" name="sem[{{$key}}][university_early_decision_date]" value="{{ old('university_early_decision_date') }}"  autocomplete="university_early_decision_date">
											</td>
											
											<td class="col-1" style="text-align:right">	
												Regular
											</td>
											<td class="col-2">	
												<input id="university_regular_decision_date{{$key}}" type="date" class="form-control @error('university_regular_decision_date') is-invalid @enderror" name="sem[{{$key}}][university_regular_decision_date]" value="{{ old('university_regular_decision_date') }}"  autocomplete="university_regular_decision_date">
											</td>
																			
										</tr>
									@endif
								@endforeach
							</table>						
						</div>	
						
                        <div class="row col-md-12 mb-0 pull-right">
                            <div class="col-md-2 offset-md-10 mr-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
		<link href="{{ asset('build/assets/css/select2.min.css') }}" rel="stylesheet" />  

		<script src="{{ asset('build/assets/js/jquery.min.js') }}"></script> 

		<script src="{{ asset('build/assets/js/select2.min.js') }}"></script>
		<script>
		$(document).ready(function(){
		 
			// Initialize select2
			$("#selSpecialization").select2();

			// Read selected option
			$('#but_read').click(function(){
				var spName = $('#selSpecialization option:selected').text();
				var spId = $('#selSpecialization').val();

				$('#specializationResult').html("id : " + spId + ", name : " + spName);

			});
		});
		
		
	function uncheckTextBox(optid){
		
		var sdt=document.getElementById("semister"+optid);

		if(!sdt.checked){
			document.getElementById("app_start_date"+optid).value=null;		
			document.getElementById("app_end_date"+optid).value=null;
			document.getElementById("university_early_decision_date"+optid).value=null;
			document.getElementById("university_regular_decision_date"+optid).value=null;
		}	
			
	}
		
		function dateDiffFun(enddt){
		
		var sdt=document.getElementById("app_start_date"+enddt);
		
		var edt=document.getElementById("app_end_date"+enddt);
		
		const 	a = new Date(sdt.value),
				b = new Date(edt.value),
				difference = dateDiffInDays(a, b);
		
			if(difference<0){
				alert("* start date must be lesser than the end date!");
				sdt.value=null;
				edt.value=null;			
			}
			
	}
		// a and b are javascript Date objects
	function dateDiffInDays(a, b) {
	  const _MS_PER_DAY = 1000 * 60 * 60 * 24;
	  // Discard the time and time-zone information.
	  const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
	  const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

	  return Math.floor((utc2 - utc1) / _MS_PER_DAY);
	}
	
		</script>
    <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="specialization_id"]').on('change',function(){
               var specializationID = jQuery(this).val();
			  //alert(specializationID);
               if(specializationID)
               {
                  jQuery.ajax({
					 url : "{{ url('get-courses') }}" + "/" +specializationID,									 
					 type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
					    jQuery('select[name="course_id"]').empty();
						       $('select[name="course_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="course_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     },
					 error:function(data)
                     {
						alert("err");
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[name="course"]').empty();
               }
            });			
	
    });
</script>
<script>
function scholorshipFun(lang_req){
	  var scr_req=document.getElementById('score_required');
  if(lang_req.value=='Available'){
	  scr_req.style.display='block';
  }else{
	  scr_req.style.display='none';
  }
  
}

$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);
     //alert(onStar);
	 $("#starValue").val(onStar);
	 
  });
 
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}



function enforceMinMax(el) {
  if (el.value != "") {
    if (parseInt(el.value) < parseInt(el.min)) {
      el.value = el.min;
    }
    if (parseInt(el.value) > parseInt(el.max)) {
      el.value = el.max;
    }
  }
}
</script>

@endsection
