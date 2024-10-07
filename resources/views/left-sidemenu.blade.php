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
						<style>
							<?php foreach(DataHelper::getDisciplines() as $discipline){ ?>
							#innerlist{{$discipline->id}}{
								display: none;
								padding: 5px;
							}

							input[value="innerlist{{$discipline->id}}"]:checked ~ #innerlist{{$discipline->id}} {
								display: block;
							}
							<?php } ?>
						</style>
						<div id="disciplineFilter" class="collapse show" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum"  style="height:200px;overflow-y:scroll">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
							
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
									@forelse($disciplines as $discipline)
										<li class="custom-control custom-checkbox">
											<input type="radio" name="course_list_data[disciplines][]" value="innerlist{{$discipline->id}}" class="custom-control-input" id="discipline{{$discipline->id}}" @if(!empty($course_list_data['disciplines']) && (in_array($discipline->id, $course_list_data['disciplines'])))checked @endif />
											<label class="custom-control-label font-size-base" for="discipline{{$discipline->id}}">{{ucfirst($discipline->discipline)}} ({{$discipline->branch_specializations->count()}})</label>
											 @if($discipline->specializations->count())
												<ul id="innerlist{{$discipline->id}}" class="list-unstyled list-group list-checkbox show-hide" style="height:200px;overflow-y:scroll;background-color:#F5F5F5">
													@foreach($discipline->specializations as $specialization)
														@if(!empty($specialization->courses))
															<li class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input sub_disp{{$discipline->id}}" attr="submenu" value="{{$specialization->id}}" id="sub_displine{{$discipline->id}}_{{$specialization->id}}"  name="course_list_data[disciplines][specializations][]" @if(!empty($course_list_data['disciplines']['specializations']) && (in_array($specialization->id, $course_list_data['disciplines']['specializations'])))checked @endif />
																<label class="custom-control-label font-size-base" for="sub_displine{{$discipline->id}}_{{$specialization->id}}">{{$specialization->specialization}} ({{$specialization->branch_specializations->count()}})</label>
															</li>
														@endif
													@endforeach
												</ul>
											@endif 
										</li>
										
										
										<script>
										var btn=false;
											$(document).ready(function(){
												
												/* if (!$("#discipline{{$discipline->id}}").prop("checked")) {
													$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", false);
												} */
												
												$("#discipline{{$discipline->id}}").on('click',function() {
													 window.btn=!window.btn;
													$("#discipline{{$discipline->id}}").prop("checked", btn);
													//alert($(this).prop("checked"));
													if ($(this).prop("checked")) {
														$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", false);
													}else if (!$(this).prop("checked")) {
														$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", false);
													}else{
														$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", false);
													}
													//$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", $(this).prop("checked"));
												});

												$(".sub_disp{{$discipline->id}} input[value={{$specialization->id}}]").on('click',function() {
													if (!$(this).prop("checked")) {
														$("#discipline{{$discipline->id}}").prop("checked", true);
													}
													if ($(this).prop("checked")) {
														$("#discipline{{$discipline->id}}").prop("checked", false);
													}
												});
												
											});
											
										</script>
										
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
							<!-- Country Type start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="degreeType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#countryTypeFilter" aria-expanded="true" aria-controls="countryTypeFilter">
								   
										<div>
										Country/State
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

						<div id="countryTypeFilter" class="collapse show" aria-labelledby="degreeType" data-parent="#accordionCurriculum">
							<div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="country_id" name="course_list_data[country][]" style="background-color:#F5F5F5" >
										@forelse(DataHelper::getCountriesOptions() as $key=>$value)
											@if(!empty($course_list_data['country']) && ($key==$course_list_data['country'][0]))
												<option value="{{$key}}" selected>{{$value}}</option>
											@else
												  <option value="{{$key}}">{{$value}}</option>
											@endif
										@endforeach
									</select>
								</div> 
								
							</div><div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="state_id" name="course_list_data[state][]" style="background-color:#F5F5F5">
										@foreach($states as $key=>$value)
											@if(!empty($course_list_data['state']) && ($key==$course_list_data['state'][0]))
												<option value="{{$key}}" selected>{{$value}}</option>
											@else
												<option value="{{$key}}" >{{$value}}</option>
											@endif
										@endforeach
									</select>
								</div> 
								
							</div>
						</div>
					</div>
					
			<!-- Universities/Campuses -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="universityType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#UniversityTypeFilter" aria-expanded="true" aria-controls="UniversityTypeFilter">
								   
										<div>
										Universities/Campuses
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

						<div id="UniversityTypeFilter" class="collapse show" aria-labelledby="universityType" data-parent="#accordionCurriculum">
							<div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="university_id" name="course_list_data[university][]" style="background-color:#F5F5F5" >
										@if(!empty($state_universities))
											@foreach($state_universities as $key=>$value)
												@if(!empty($course_list_data['university']) && ($course_list_data['university'][0] == $key))
													<option value="{{$key}}" selected>{{$value}}</option>
												@else
													<option value="{{$key}}">{{$value}}</option>
												@endif
											@endforeach
										@endif
									</select>
								</div> 
								
							</div><div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="campus_id" name="course_list_data[campus][]" style="background-color:#F5F5F5">
											@if(!empty($campuses))
												@foreach($campuses as $key=>$value)
													@if(!empty($course_list_data['campus']) && ($course_list_data['campus'][0] == $key))
														<option value="{{$key}}" selected>{{$value}}</option>
													@else
														<option value="{{$key}}">{{$value}}</option>
													@endif
												@endforeach
											@endif
									</select>
								</div> 
								
							</div>
						</div>
					</div>							

					
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
									<small>Fee Details =>  Min : 0 - Max : 5999999</small>                                  
                             
								

								<input type="range" class="form-range" min="0" max="9999999" step="1" value="{{$course_list_data['fees']??0}}" id="slider-range" >
							<!--<div>
								<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getDataAccessFormat() as $key=>$value)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="formatFilter{{$key}}" name="course_list_data[dataformat][]" value="{{$key}}" @if(!empty($course_list_data['dataformat']) && (in_array($key, $course_list_data['dataformat'])))checked @endif>
											<label class="custom-control-label font-size-base" for="formatFilter{{$key}}"><i class="fa fa-sort-amount-{{$key}}"></i>&nbsp;{{ucfirst($value)}} </label>
										</li>
									@empty	
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										</li>
									@endforelse	
									
								</ul>
							</div> -->
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
				
				

                   <button type="submit" class="btn btn-primary btn-block">FILTER RESULTS</button>
                   	