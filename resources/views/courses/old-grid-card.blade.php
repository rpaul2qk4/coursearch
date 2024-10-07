
<form action="{{route('specializations.comparison')}}" class="comp-specialization" method="POST" enctype="multipart/form-data">
@csrf
	<div class="col-lg-12" style="height:600px;overflow-y:scroll;">
		@forelse($courses as $course)
			<div style="">
				<div class="card column col-lg-12 col-sm-6 border1 shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0 results cards-hover-color"  style=";border-radius:30px;" >
					<!-- Image -->
					 <!-- Footer -->
					<div class="col-md-12 card-footer px-2 px-md-5 py-4 py-md-0 position-relative">
						<!-- Heading -->
						<div class="position-relative">						   
							
							<div class="row mx-n2 align-items-center">
								<div class="col px-2"  style="cursor:pointer;">
									<a href="{{route('branch_specializations.course-view',$course->id)}}" target="_blank"> <h4 class="line-clamp-2 me-md-6 me-lg-10 me-xl-4 mb-3 text-secondary1" ><span style="color:red" data-bs-toggle="tooltip" data-bs-title="{{$course->specialization->specialization}}" data-bs-placement="top">{{substr($course->specialization->specialization,0,12)}}@if(strlen($course->specialization->specialization)>12)...@endif</span>&nbsp;(&nbsp;<span class="text-dark small" data-bs-toggle="tooltip" data-bs-title="{{$course->course->course}}" data-bs-placement="top">{{!empty($course->course)?substr($course->course->course,0,12):'***'}}@if(strlen($course->course->course)>12)...@endif</span>&nbsp;)</h4></a>
								</div>

								<div class="col-auto px-2">	
									Fees : 
									@foreach($course->branch_specialization_fees as $id=>$sp_format) 										
											 @if($id>0) / @endif <i style="font-size:16px;color:red" class="fa fa-{{$course->country_currency}}"></i>&nbsp;{{$sp_format->fees}}
									@endforeach
								</div>
							</div>							
						
							<!--<hr><div class="row mx-n2 align-items-center">
								<div class="col px-2">							
									{{$course->course->course}}	
								</div>
								
								<div class="col-auto px-2">
										<div class="d-lg-flex align-items-end">
										
											<ins class="h6 mb-0 mb-lg-n1 ms-1">
											@foreach($course->branch_specialization_fees as $id=>$sp_format) 
											
												 @if($id>0) / @endif <i style="font-size:24px" class="fa fa-{{$course->university->country->currency_icon}}"></i>{{$sp_format->fees}}
																		
											@endforeach
											</ins>
										</div> 										
								</div>
							</div>		-->					
							
							<ul class="nav mx-n3 mb-3">
								<li class="nav-item px-3">
									<div class="d-flex align-items-center">
										<div class="font-size-sm">{{$course->program->program}}(&nbsp;{{$course->program->code}}&nbsp;) </div>
									</div>
								</li>
								
								<li class="nav-item px-3">
									<div class="d-flex align-items-center">
										<div class="font-size-sm">@foreach($course->branch_specialization_fees as $id=>$sp_format) @if($id>0) / @endif {{$sp_format->format->format}}@endforeach</div>
									</div>
								</li>
								<li class="nav-item px-3">
									<div class="d-flex align-items-center">
										<div class="font-size-sm">{{$course->attendance->attendance}}</div>
									</div>
								</li>	
								<li class="nav-item px-3">
									<div class="d-flex align-items-center">
										<div class="font-size-sm">{{$course->duration->duration}}</div>
									</div>
								</li>	
								<li class="nav-item px-3">
									<div class="d-flex align-items-center">
										<div class="font-size-sm"> GPA : {{$course->gpa_req_rate}}</div>
									</div>
								</li>	
								<li class="nav-item px-3">
									<div class="d-flex align-items-center">
										<div class="font-size-sm"> Application fee :<i style="font-size:12px;color:red" class="fa fa-{{$course->country_currency}}"></i>&nbsp;{{$course->apply_fee}}</div>
									</div>
								</li>								
							</ul>
							
							

							<div class="row align-items-center">
								<div class="col px-2">

									<ul class="nav mx-n3 mb-3">
										<li class="nav-item px-3">
											<div class="d-flex align-items-center">
												<div class="me-2 d-flex text-secondary icon-uxs">
													<!-- Icon -->
													<span><i class='fas fa-school' style='font-size:38px;color:red'></i></span>

												</div>

											</div>
										</li>
										<li class="nav-item px-3">
											<div class="align-items-center">
												<small><a class="font-size-sm" href="{{$course->university->formatted_website}}" target="_blank" style="cursor:pointer;color:black"><span data-bs-toggle="tooltip" data-bs-title="{{$course->campus->campus}}" data-bs-placement="top">{{substr($course->campus->campus,0,8)}}@if(strlen($course->campus->campus)>8)...@endif</span>&nbsp;(&nbsp;<span style="color:green !important;font-weight:bold" data-bs-toggle="tooltip" data-bs-title="{{$course->university->university}}" data-bs-placement="top" >{{substr($course->university->university,0,8)}}@if(strlen($course->university->university)>8)...@endif</span>&nbsp;)</a></small><br>
												<small class="font-size-sm"><span data-bs-toggle="tooltip" data-bs-title="{{$course->university->country->country}}" data-bs-placement="top">{{substr($course->university->country->country,0,6)}}@if(strlen($course->university->country->country)>6)...@endif</span>/<span data-bs-toggle="tooltip" data-bs-title="{{$course->university->state->state}}" data-bs-placement="top">{{!empty($course->university->state)?substr($course->university->state->state,0,6):'***'}}@if(strlen($course->university->state->state)>6)...@endif</span></small>
											</div>
										</li>
										<!-- <span class="d-flex align-items-end">
											<span class="star-rating">
												<span class="rating" style="width:{{$course->course_rating}}%;"></span>
											</span>
										</span> -->
									</ul>

								</div>

								<div class="col-auto px-2">
									<div class=" align-items-center">
									
									
										<ul class="nav mx-n3 mb-3 text-right list-checkbox">
											<li class="custom-control1 custom-checkbox1 m-3">
												<input type="checkbox" class="custom-control-input1" id="comparison{{$course->id}}" name="comparisons[]" value="{{$course->id}}" style="height:15px;width:15px;position:relative">
												<label class="custom-control-label1 font-size-base" for="comparison{{$course->id}}">
													<button class="btn-outline-white" id="compare_now{{$course->id}}" type="button">Add to Compare</button>
												</label>
											</li>

										</ul>	

										
									</div>
								</div>
							</div>
							<hr>
							<div class="row align-items-center justify-content-start">
								<div class="col px-2" style="cursor:pointer;">
									<h6 class=" text-primary small" >Start Date : <span style="color:green">{{$course->start_date}}</span> &nbsp;|&nbsp; Appln. Deadline : <span style="color:red">{{$course->apply_deadline}}</span></h6>
								</div>	
								<div class="col " style="cursor:pointer;">
									<h6 class=" text-primary small" >Requirements :@if(!empty($course->branch_specialization_requirements)) @foreach($course->branch_specialization_requirements as $id=>$branch_specialization_requirement) @if($id>0) &nbsp;|&nbsp;@endif {{$branch_specialization_requirement->requirement->requirement}} : <span style="color:red">{{$branch_specialization_requirement->score}}</span> @endforeach @else *** @endif</h6>
								</div>	

								<div class="col-auto px-2">								
									<a href="#" > <i class="far fa-heart"></i> </a>								
								</div>							
							</div>
							
						</div>
					</div>
				</div>
			</div>
				
		
				<script>	
					$(document).ready(function(){
						$('#comparison'+<?php echo $course->id?>).click(function() {
							var cid=<?php echo $course->id?>;
							var authUser=<?php echo is_null(Auth::user())?0:1; ?>;
							
							  if ($(this).is(':checked')) {
								 document.getElementById("compare_now"+cid).type ="submit";
								 document.getElementById("compare_now"+cid).innerHTML  ="Compare Now";
								 if(authUser==0)
								 document.getElementById("compare_now"+cid).onclick = function() {alertFun()};
							  }else{
								 document.getElementById("compare_now"+cid).type = "button"; 
								 document.getElementById("compare_now"+cid).innerHTML = "Add to Compare"; 
							  }
								  
						});
						
					});
				</script>
			
		@empty
			<div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0" style="border-radius:15px;padding:5px">
				No data found!
			</div>            
		@endforelse
	</div>			
</form>	