
<style>
.flex-container {
  display: flex;
  flex-wrap: wrap;
  font-size: 12px;
  text-align: center;
}

.flex-item-left {
  background-color: #f0efef;
  padding: 8px;
  flex: 35%;
}

.flex-item-right {
  background-color: #eaece5;
  padding: 8px;
  flex: 32%;
}


.flex-item-right2 {
  background-color: #f0efef;
  padding: 8px;
  flex: 33%;
}

.flex-item-leftu {
  background-color: #eaece5;
  padding: 8px;
  flex: 35%;
}

.flex-item-rightu {
  background-color: #f0efef;
  padding: 8px;
  flex: 32%;
}


.flex-item-right2u {
  background-color: #eaece5;
  padding: 8px;
  flex: 33%;
}

.flex-item-lefte {
  background-color: #e0e2e4;
  padding: 8px;
  flex: 35%;
}

.flex-item-righte {
  background-color: #eaece5;
  padding: 8px;
  flex: 32%;
}
.flex-item-right2e {
  background-color: #e0e2e4;
  padding: 8px;
  flex: 32%;
}


.flex-item-leftue {
  background-color: #f0efef;
  padding: 8px;
  flex: 35%;
}

.flex-item-rightue {
  background-color: #eaece5;
  padding: 8px;
  flex: 32%;
}


.flex-item-right2ue {
  background-color: #f0efef;
  padding: 8px;
  flex: 33%;
}

/* Responsive layout - makes a one column-layout instead of a two-column layout */
@media (max-width: 800px) {
  .flex-item-right2, .flex-item-right, .flex-item-left {
    flex: 100%;
  }
}
/* Responsive layout - makes a one column-layout instead of a two-column layout */
@media (max-width: 800px) {
  .flex-item-right2u, .flex-item-rightu, .flex-item-leftu {
    flex: 100%;
  }
}
/* Responsive layout - makes a one column-layout instead of a two-column layout */
@media (max-width: 800px) {
  .flex-item-right2e, .flex-item-righte, .flex-item-lefte {
    flex: 100%;
  }
}
/* Responsive layout - makes a one column-layout instead of a two-column layout */
@media (max-width: 800px) {
  .flex-item-right2e, .flex-item-righte, .flex-item-lefte {
    flex: 100%;
  }
}
/* Responsive layout - makes a one column-layout instead of a two-column layout */
@media (max-width: 800px) {
  .flex-item-right2ue, .flex-item-rightue, .flex-item-leftue {
    flex: 100%;
  }
}

</style>
<form action="{{route('specializations.comparison')}}" class="custom-control-input1" method="POST" enctype="multipart/form-data">
@csrf
	<div class="results" style="height:600px;overflow-y:scroll;">
		@forelse($courses as $course)
			
				<div class="column" style="cursor:pointer;">
					<div class="card card-bg-setup" >
					
						<div class="card-header d-flex justify-content-between align-items-center ">	
						
								<a href="{{route('branch_specializations.course-view',$course->id)}}" target="_blank"> 
									<h6 class="text-secondary" >
										<span style="color:red" data-bs-toggle="tooltip" data-bs-title="{{$course->specialization->specialization}}" data-bs-placement="top">
											{{$course->specialization->specialization}}
										</span>	
										<p>											
											<span class="text-dark small" data-bs-toggle="tooltip" data-bs-title="{{$course->course->course}}" data-bs-placement="top">
												{{$course->course->course}}
											</span>										
										</p>
									</h6>
								</a>
								<a href="#"> <i class="far fa-heart"></i> </a>
								
						</div>
						<div class="card-body">
							<div class="row1 align-items-center">
								<div class="col">
		
									<div class="align-items-center px-3">
									    @if(!empty(Auth::user()) && in_array(Auth::user()->role->role,['Admin']))
										    <small><a class="font-size-sm" href="{{$course->university->formatted_website}}" target="_blank" style="cursor:pointer;color:black"><span data-bs-toggle="tooltip" data-bs-title="{{$course->campus->campus}}" data-bs-placement="top">{{$course->campus->campus}}</span>&nbsp;(&nbsp;<span style="color:green !important;font-weight:bold" data-bs-toggle="tooltip" data-bs-title="{{$course->university->university}}" data-bs-placement="top" >{{$course->university->university}}</span>&nbsp;)</a></small><br>
										@else
										    <small><a class="font-size-sm" href="#" style="cursor:pointer;color:black"><span data-bs-toggle="tooltip" data-bs-title="{{$course->campus->campus}}" data-bs-placement="top">{{$course->campus->campus}}</span>&nbsp;(&nbsp;<span style="color:green !important;font-weight:bold" data-bs-toggle="tooltip" data-bs-title="{{$course->university->university}}" data-bs-placement="top" >{{$course->university->university}}</span>&nbsp;)</a></small><br>
									    @endif
										<small class="font-size-sm"><span data-bs-toggle="tooltip" data-bs-title="{{$course->university->country->country}}" data-bs-placement="top">{{$course->university->country->country}}</span>&nbsp;/&nbsp;<span data-bs-toggle="tooltip" data-bs-title="{{$course->university->state->state}}" data-bs-placement="top">{{$course->university->state->state}}</span></small>
									</div>

								</div>

								<div class="col-auto ">
									<div class=" align-items-center">									
									
										<div class="d-flex justify-content-between align-items-center ">
										
											<div class="nav-item px-3">
														
														<small>
															
																Fees : 
																@foreach($course->branch_specialization_fees as $id=>$sp_format) 										
																		 @if($id>0) / @endif <a href="#"> <i style="font-size:12px;color:red" class="fa fa-{{$course->country_currency}}"></i>&nbsp;{{$sp_format->fees}}</a>
																@endforeach
															
														</small>

													
											</div>
										
											<div class=" custom-checkbox1 m-1">
												<input type="checkbox" class="custom-control-input1" id="comparison{{$course->id}}" name="comparisons[]" value="{{$course->id}}" style="height:15px;width:15px;position:relative">
												<label class="custom-control-label1 font-size-base" for="comparison{{$course->id}}">
													<button class="btn-outline-white" id="compare_now{{$course->id}}" type="button">Add to Compare</button>
												</label>
											</div>

										</div>	

										
									</div>
								</div>
							</div>
						</div>
						
						<div class="card-body" style="background:#d5e1df">
							<div class="row1 align-items-center">
								<div class="col">
									<div class="small" role="alert">
										Requirements&nbsp;@if(!empty($course->branch_specialization_requirements)) @foreach($course->branch_specialization_requirements as $id=>$branch_specialization_requirement) @if($id>0) &nbsp;|&nbsp;@endif {{$branch_specialization_requirement->requirement->requirement}} : <a href="#" class="alert-link" style="color:red;">{{$branch_specialization_requirement->score}}</a> @endforeach @else *** @endif
									</div>
								</div>
							</div>
						</div>	
					
						<?php $flag=0; ?>
						<div class="card-footer1">
							<div class="">
										
											<div class="flex-container">
											 
													
											
											@if(!empty($course->spc_semisters->count()))
												
												@if(!empty($course_list_data['semisters'][0]))
													@foreach($course->spc_semisters as $spc_semister)											
														@if(!empty($course_list_data['semisters'][0]) &&  in_array($spc_semister->semister,$course_list_data['semisters']))
															@if(!strcmp($spc_semister->semister,'Summer'))
																<div class="flex-item-left"><span class="badge badge-primary" style="color:#">{{strtoupper($spc_semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($spc_semister->app_start_date)?$spc_semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($spc_semister->app_end_date)?$spc_semister->app_end_date:'****-**-**'}}</span></div>
															@elseif(!strcmp($spc_semister->semister,'Fall'))
																<div class="flex-item-right"><span class="badge badge-primary" style="color:#">{{strtoupper($spc_semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($spc_semister->app_start_date)?$spc_semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($spc_semister->app_end_date)?$spc_semister->app_end_date:'****-**-**'}}</span></div>
															@else
																<div class="flex-item-right2"><span class="badge badge-primary" style="color:#">{{strtoupper($spc_semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($spc_semister->app_start_date)?$spc_semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($spc_semister->app_end_date)?$spc_semister->app_end_date:'****-**-**'}}</span></div>
															@endif
															
														@endif
													@endforeach
												@else
													@foreach($course->spc_semisters as $spc_semister)
															@if(!strcmp($spc_semister->semister,'Summer'))
																<div class="flex-item-left"><span class="badge badge-primary" style="color:#">{{strtoupper($spc_semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($spc_semister->app_start_date)?$spc_semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($spc_semister->app_end_date)?$spc_semister->app_end_date:'****-**-**'}}</span></div>
															@elseif(!strcmp($spc_semister->semister,'Fall'))
																<div class="flex-item-right"><span class="badge badge-primary" style="color:#">{{strtoupper($spc_semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($spc_semister->app_start_date)?$spc_semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($spc_semister->app_end_date)?$spc_semister->app_end_date:'****-**-**'}}</span></div>
															@else
																<div class="flex-item-right2"><span class="badge badge-primary" style="color:#">{{strtoupper($spc_semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($spc_semister->app_start_date)?$spc_semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($spc_semister->app_end_date)?$spc_semister->app_end_date:'****-**-**'}}</span></div>
															@endif
													@endforeach
												@endif									
																			
											@elseif(!empty($course->university))
											
												@if(!empty($course->university->semisters->count()))
													@if(!empty($course_list_data['semisters'][0]))
														@foreach($course->university->semisters as $semister)
															@if(!empty($course_list_data['semisters'][0]) &&  in_array($semister->semister,$course_list_data['semisters']))
																@if(!strcmp($semister->semister,'Summer'))
																	<div class="flex-item-leftu"><span class="badge badge-primary" style="color:#">{{strtoupper($semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($semister->app_start_date)?$semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($semister->app_end_date)?$semister->app_end_date:'****-**-**'}}</span></div>
																@elseif(!strcmp($semister->semister,'Fall'))
																	<div class="flex-item-rightu"><span class="badge badge-primary" style="color:#">{{strtoupper($semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($semister->app_start_date)?$semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($semister->app_end_date)?$semister->app_end_date:'****-**-**'}}</span></div>
																@else
																	<div class="flex-item-right2u"><span class="badge badge-primary" style="color:#">{{strtoupper($semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($semister->app_start_date)?$semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($semister->app_end_date)?$semister->app_end_date:'****-**-**'}}</span></div>
																@endif
															@endif												
														@endforeach
													@else
														@foreach($course->university->semisters as $semister)
															@if(!strcmp($semister->semister,'Summer'))
																	<div class="flex-item-leftu"><span class="badge badge-primary" style="color:#">{{strtoupper($semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($semister->app_start_date)?$semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($semister->app_end_date)?$semister->app_end_date:'****-**-**'}}</span></div>
																@elseif(!strcmp($semister->semister,'Fall'))
																	<div class="flex-item-rightu"><span class="badge badge-primary" style="color:#">{{strtoupper($semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($semister->app_start_date)?$semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($semister->app_end_date)?$semister->app_end_date:'****-**-**'}}</span></div>
																@else
																	<div class="flex-item-right2u"><span class="badge badge-primary" style="color:#">{{strtoupper($semister->semister)}}</span><br>Startdate : <span style="color:green">{{!empty($semister->app_start_date)?$semister->app_start_date:'****-**-**'}}</span> Deadline : <span style="color:red">{{!empty($semister->app_end_date)?$semister->app_end_date:'****-**-**'}}</span></div>
																@endif
														@endforeach
													@endif	
												@else										
													<?php $flag=1;?>
													<div class="flex-item-leftue"><span class="badge badge-primary" style="color:#">SUMMER</span><br>Startdate : <span style="color:green">****-**-**</span> Deadline : <span style="color:red">****-**-**</span></div>
													<div class="flex-item-rightue"><span class="badge badge-primary" style="color:#">FALL</span><br>Startdate : <span style="color:green">****-**-**</span> Deadline : <span style="color:red">****-**-**</span></div>
													<div class="flex-item-right2ue"><span class="badge badge-primary" style="color:#">SPRING</span><br>Startdate : <span style="color:green">****-**-**</span> Deadline : <span style="color:red">****-**-**</span></div>
									
												@endif
											@else										
													<?php $flag=1;?>
												
													<div class="flex-item-lefte"><span class="badge badge-primary" style="color:#">SUMMER</span><br>Startdate : <span style="color:green">****-**-**</span> Deadline : <span style="color:red">****-**-**</span></div>
													<div class="flex-item-righte"><span class="badge badge-primary" style="color:#">FALL</span><br>Startdate : <span style="color:green">****-**-**</span> Deadline : <span style="color:red">****-**-**</span></div>
													<div class="flex-item-right2e"><span class="badge badge-primary" style="color:#">SPRING</span><br>Startdate : <span style="color:green">****-**-**</span> Deadline : <span style="color:red">****-**-**</span></div>
											
											@endif 
											
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
			<style>
			    .text-primary.small{
			        line-height:3;
			    }
			</style>
			
		@empty
			<div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0" style="border-radius:15px;padding:5px">
				No data found!
			</div>            
		@endforelse		
	</div>
</form>
