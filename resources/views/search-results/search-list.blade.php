@extends('layouts.search_app')
@section('course-content')
<!-- Card -->
@include('common.flash')
<div class="card1 border1 shadow1 p-2 lift1 sk-fade mb-3 flex-md-row align-items-center row gx-0" style="background-color1:#F5F5F5">
	
	<div class="d-flex justify-content-between align-items-center">
		<div>
			Selected specializations : <span id="count-checked-checkboxes" style="color:red" >0</span> out of <span style="color:green;font-weight:bold">8</span>
		</div>	
		<div class="col-lg-4">	
			<input id="filter" placeholder="Search..." type="text" style="background-color:#F5F5F5;width:100%;border-radius:15px">
		</div>	
	</div>	
	
</div>  
<div style="padding:30px;border-radius:30px; width:100%;background-size: cover;background-image: url({{asset('build/assets/img/backgroun1.jpg')}});background-repeat: no-repeat;" id="results" >


<form action="{{route('search-results.comparison')}}" class="comp-specialization" method="POST" enctype="multipart/form-data">
@csrf
<div style="height:1600px;overflow-y:scroll;">
		@forelse($universities as $course)
				<div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0 results"  style=";border-radius:30px" >
					<!-- Image -->
					 <!-- Footer -->
					<div class="col-md-12 card-footer px-2 px-md-5 py-4 py-md-0 position-relative">
						<!-- Heading -->
						<div class="position-relative">
						   
							
							<div class="row mx-n2 align-items-center">
								<div class="col px-2" style="cursor:pointer;">
									<a href="{{route('branch_specializations.course-view',$course->id)}}" target="_blank"><h4 class="line-clamp-2 me-md-6 me-lg-10 me-xl-4 mb-3 text-secondary1" style="color:red">{{$course->specialization->specialization}}&nbsp;(&nbsp;<span class="text-dark small">{{!empty($course->course)?$course->course->course:'***'}}</span>&nbsp;)</h4></a> 
								</div>							

								<div class="col-auto px-2">
								Fees : 
									@foreach($course->branch_specialization_fees as $id=>$sp_format) 
										
										 @if($id>0) / @endif <i style="font-size:12px;color:red" class="fa fa-{{$course->country_currency}} text-danger1"></i>&nbsp;{{$sp_format->fees}}
																
									@endforeach
								
								</div>
							</div>														
							
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
												<small><a class="font-size-sm" href="{{$course->university->formatted_website}}" target="_blank" style="cursor:pointer;color:blue">{{$course->campus->campus}}&nbsp;(&nbsp;<span style="color:green !important;font-weight:bold">{{$course->university->university}}</span>&nbsp;)</a></small><br>
												<small class="font-size-sm">{{$course->university->country->country}}/{{!empty($course->university->state)?$course->university->state->state:'***'}}</small>
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
											<li class="custom-control custom-checkbox m-3">
												<input type="checkbox" class="custom-control-input" id="comparison{{$course->id}}" name="comparisons[]" value="{{$course->id}}">
												<label class="custom-control-label font-size-base" for="comparison{{$course->id}}">
													<button class="btn-outline-white" id="compare_now{{$course->id}}" type="button">Add to Compare</button>
												</label>
											</li>

										</ul>																				
									</div>
								</div>
								
							</div>
							
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
				<script>	
					$(document).ready(function(){
						$('#comparison'+<?php echo $course->id?>).click(function() {
							var cid=<?php echo $course->id?>;
							
							  if ($(this).is(':checked')) {
								 document.getElementById("compare_now"+cid).type ="submit";
								 document.getElementById("compare_now"+cid).innerHTML  ="Compare Now";
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
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
<script>
	var userSelected = 0;
	var colorString = "color:red;font-weight:bold";
	$(".comp-specialization input[type=checkbox]").on('change',function(){
		userSelected = $(".comp-specialization input[type=checkbox]:checked").length;
		if( userSelected > 8) {
			$(this).prop("checked", false);
			alert("Selected specializations are exceeded");
		} else if ($(".comp-specialization input[type=checkbox]:checked").length === 0 ) {
			alert("please select specializations to compare");
		}else{
			colorString=(userSelected==8)?("color:green;font-weight:bold"):"color:red;font-weight:bold";
			$('#count-checked-checkboxes').html('<span style="'+colorString+'">'+ userSelected+'</span>');
		}
	});
</script>
	<script>
 $("#filter").keyup(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('#results div.results').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }

      });

    });
</script>
</div>			
          
@endsection	