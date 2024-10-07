@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('branch_specializations.index',$discipline_branch->id)}}" class="no-decoration"><span class="text-danger">{{$discipline_branch->branch->branch}} </span>  branch specializations</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Create <span class="text-danger">{{$discipline_branch->branch->branch}} </span> branch specialization
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
   
     
		@include('common.flash')
            <div class="card">
                <div class="card-header">Create </div>

                <div class="card-body"> 
				
                    <form method="POST" action="{{ route('branch_specializations.store',$discipline_branch->id) }}"  autocomplete="on">
                        @csrf
						<div class="row col-lg-12">
							<div class="col-6 row mb-3">
								<label for="specializationid" class="col-sm-4 col-form-label text-sm-end">{{ __('Branch Specialization') }}</label>

								<div class="col-sm-8">
									<select class="form-select" name="specialization_id" required>
									@foreach($discipline_branch->branch_specializations_array as $key=>$value)
									  <option value="{{$key}}">{{$value}}</option>
									 @endforeach 
									</select>

									@error('specialization_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class=" col-6 row mb-3">
								<label for="specializationid" class="col-sm-4 col-form-label text-sm-end">{{ __('Branch Course') }}</label>
								<div class="col-sm-8"> 
									<!-- Dropdown --> 
									<select id='selCourse' class="form-select" name="course_id">
										 
									</select>
									
									<div id='courseResult'></div>

									@error('course_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class="col-6 row mb-3">
								<label for="course_ranking1" class="col-sm-4 col-form-label text-sm-end">{{ __('Other Course') }}</label>

								<div class="col-sm-8">
									<input id="other_course" type="text" onkeyup="otherCourse()"  class="form-control @error('course_ranking') is-invalid @enderror" name="other_course" value="{{ old('other_course') }}" autocomplete="other_course">
									@error('other_course')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class="col-6 row mb-3">
								<label for="course_ranking1" class="col-sm-4 col-form-label text-sm-end">{{ __('Course Ranking') }}</label>

								<div class="col-sm-8">
									<input id="course_ranking" type="number" min="0" max="10000" step="1" value="0" onkeyup="enforceMinMax(this)"  class="form-control @error('course_ranking') is-invalid @enderror" name="course_ranking" value="{{ old('course_ranking') }}" required autocomplete="course_ranking">

									@error('course_ranking')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class="col-6 row mb-3">
								<label for="start_date1" class="col-sm-4 col-form-label text-sm-end">{{ __('Start Date') }}</label>

								<div class="col-sm-8">
									<input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date">

									@error('start_date')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class="col-6 row mb-3">
								<label for="apply_deadline1" class="col-sm-4 col-form-label text-sm-end">{{ __('Application Deadline') }}</label>

								<div class="col-sm-8">
									<input id="apply_deadline" type="date" class="form-control @error('apply_deadline') is-invalid @enderror" name="apply_deadline" value="{{ old('apply_deadline') }}" required autocomplete="apply_deadline">

									@error('apply_deadline')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class="col-6 row mb-3">
								<label for="acceptance_rate1" class="col-sm-4 col-form-label text-sm-end">{{ __('Acceptance Rate(%)') }}</label>

								<div class="col-sm-8">
									<input id="acceptance_rate" type="number" min="0" max="100" value="0" onkeyup="enforceMinMax(this)" class="form-control @error('acceptance_rate') is-invalid @enderror" name="acceptance_rate" value="{{ old('acceptance_rate') }}" required autocomplete="acceptance_rate">

									@error('acceptance_rate')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class="col-6 row mb-3">
								<label for="gpa_req_rate1" class="col-sm-4 col-form-label text-sm-end">{{ __('GPA Required Rate') }}</label>

								<div class="col-sm-8">
									<input id="gpa_req_rate" type="number" min="1.0" max="4" step="0.1" value="0" onkeyup="enforceMinMax(this)" class="form-control @error('gpa_req_rate') is-invalid @enderror" name="gpa_req_rate" value="{{ old('gpa_req_rate') }}" required autocomplete="gpa_req_rate">

		
									@error('gpa_req_rate')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								
							</div>
						
							<div class="col-6 row mb-3">
								<label for="test_score1" class="col-sm-4 col-form-label text-sm-end">{{ __('Test Score') }}</label>
								<div class="col-sm-6">
									<table class="table1">
										<tbody>				
											@foreach(DataHelper::getRequirementOptions() as $key=>$value)
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
															<input id="requirement_score" type="number" min="0" max="2000" step="1" value="0" onkeyup="enforceMinMax(this)"  class="form-control @error('requirement_score') is-invalid @enderror" name="requirement_score[{{$key}}][]" placeholder="score..." autocomplete="requirement_score[{{$key}}][]">
														@else
															<input id="requirement_score" type="number" min="0" max="400" step="1" value="0" onkeyup="enforceMinMax(this)"   class="form-control @error('requirement_score') is-invalid @enderror" name="requirement_score[{{$key}}][]" placeholder="score..." autocomplete="requirement_score[{{$key}}][]">
														@endif
													</td>
												</tr>
					
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
								
							<div class="col-6 row mb-3">
								<label for="scholorship1" class="col-sm-4 col-form-label text-sm-end">{{ __('Scholorship') }}</label>

								<div class="col-sm-8">
								   
									@foreach(AppHelper::options('Scholorship') as $key=>$value)
										<div class="form-check form-check-inline mt-2">
										  <input class="form-check-input" type="radio" name="scholorship" id="scholorship{{$key}}" value="{{$key}}" autocomplete="scholorship" required onclick="scholorshipFun(this)">
										  <label class="form-check-label" for="scholorship">{{$value}}</label>
										</div>	
									@endforeach	
									
									@error('scholorship')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							
								<div id="score_required" style="display:none">	
									<div class="row ">
										<label for="scholorship_link1" class="col-sm-4 col-form-label text-sm-end">{{ __('Scholorship Link') }}</label>

										<div class="col-sm-8">
											<input id="scholorship_link" type="text" class="form-control @error('scholorship_link') is-invalid @enderror" name="scholorship_link" value="{{ old('scholorship_link') }}" autocomplete="scholorship_link">

											@error('scholorship_link')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									
								</div>
							
								<div class="row mb-3">
									<label for="duration1" class="col-sm-4 col-form-label text-sm-end">{{ __('Duration') }}</label>
									<div class="col-sm-8">
										@foreach(DataHelper::getDurationOptions() as $key=>$value)
											<div class="form-check form-check-inline mt-2">
											  <input class="form-check-input" type="radio" name="duration_id" id="duration_id{{$key}}" value="{{$key}}" required autocomplete="duration_id">
											  <label class="form-check-label" for="duration_id1">{{$value}}</label>
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
									<label for="attendanceid1" class="col-sm-4 col-form-label text-sm-end">{{ __('Attendance') }}</label>
									<div class="col-sm-8">
										@foreach(DataHelper::getAttendanceOptions() as $key=>$value)
											<div class="form-check form-check-inline mt-2">
											  <input class="form-check-input" type="radio" name="attendance_id" id="attendance_id{{$key}}" value="{{$key}}" required autocomplete="attendance_id">
											  <label class="form-check-label" for="attendance_id1">{{$value}}</label>
											</div>											
										@endforeach																
										@error('attendance_id')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							</div>
							<div class=" col-6 row mb-3">
								<label for="format1" class="col-sm-4 col-form-label text-sm-end">{{ __('Format') }}</label>
								<div class="col-sm-8">				
								
									<table class="table1">
										<tbody>										
									
										@foreach(DataHelper::getFormatOptions() as $key=>$value)
										
											<tr>
												<td class="col-sm-1">
													<input class="form-check-input" type="checkbox" name="annual_fees[{{$key}}][]" id="formatids{{$key}}" value="{{$key}}" autocomplete="annual_fees[{{$key}}][]">
												</td>
												<td class="col-sm-3">{{$value}}</td>
												<td class="col-sm-1">
													<i style="font-size:14px" class="fa fa-{{$discipline_branch->university->country->currency_icon}}"></i>
												</td>
												<td >
													<input id="annual_fees" type="number" class="form-control @error('annual_fees') is-invalid @enderror" name="annual_fees[{{$key}}][]" placeholder="Annual tution fee..." autocomplete="annual_fees[{{$key}}][]">
												</td>
											</tr>
										
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
			
							<div class="col-6 row mb-1">
							
								<div class="d-flex justify-content-between mb-1">
									<label for="curriculum_link1" class="col-sm-4 col-form-label text-sm-center">{{ __('Curriculum Link') }}</label>
									<div class="col-sm-8">
										<input id="curriculum_link " type="text" class="form-control @error('curriculum_link') is-invalid @enderror" name="curriculum_link" placeholder="Enter curriculum link"  value="{{ old('curriculum_link') }}" required autocomplete="curriculum_link">
										@error('curriculum_link')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>							
							
								<div class="d-flex justify-content-between mb-1">
									<label for="apply_link1" class="col-sm-4 col-form-label text-sm-center">{{ __('Appl. Link') }}</label>
									<div class="col-sm-8">
										<input id="apply_link " type="text" class="form-control @error('apply_link') is-invalid @enderror" name="apply_link" value="{{ old('apply_link') }}" placeholder="Enter appli. link"  required autocomplete="apply_link">
										@error('apply_link')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								
							</div>
							
						
							
							<div class="col-6 row mb-3">
								<label for="catalogue_link1" class="col-sm-4 col-form-label text-sm-end">{{ __('Catalogue Link') }}</label>
								<div class="col-sm-8">
									<input id="catalogue_link" type="text" class="form-control @error('catalogue_link') is-invalid @enderror" name="catalogue_link" placeholder="Enter catelogue link"  value="{{ old('catalogue_link') }}" required autocomplete="catalogue_link">
									@error('catalogue_link')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
								
							<div class="col-6 row mb-3">
								<label for="apply_fee" class="col-sm-4 col-form-label text-sm-end">{{ __('Appl. Fee') }}&nbsp;&nbsp;<i style="font-size:14px" class="fa fa-{{$discipline_branch->university->country->currency_icon}}"></i></label>

								<div class="col-sm-8">
									<input id="apply_fee" type="number" class="form-control @error('apply_fee') is-invalid @enderror" name="apply_fee" placeholder="Enter appli. fees"  value="{{ old('apply_fee') }}" required autocomplete="apply_fee">
									@error('apply_fee')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-12 row mb-3">
								<label for="entry_requirements_link1" class="col-sm-2 col-form-label text-sm-end">{{ __('Entry Requirements') }}</label>
								<div class="col-sm-10">
									<input id="entry_requirements_link" type="text" class="form-control @error('entry_requirements_link') is-invalid @enderror" name="entry_requirements_link" placeholder="Enter entry requirements link" value="{{ old('entry_requirements_link') }}" required autocomplete="entry_requirements_link">
									@error('entry_requirements_link')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							
							
							
						<div class="row p-3">
							<div class="col-4">
								<label class="" >Semisters : </label>
							</div>
							<table >								 
								@foreach(AppHelper::options('Semisters') as $key=>$value )
									<tr class="">									
										<td class="col-1">									
											<div class="form-check form-check-inline">
											  <input class="form-check-input" id="semister{{$key}}" name="sem[{{$key}}][semister]" type="checkbox" id="inlineCheckbox1" value="{{$value}}" onclick="uncheckTextBox({{$key}})">
											  <label class="form-check-label" for="inlineCheckbox1">{{$value}}</label>
											</div>	
										</td>
									
									
									
										<td class="col-1" style="text-align:right">Dead Line</td>
									
										<td class="col-1">
											<input id="app_end_date{{$key}}" type="date" class="form-control @error('app_end_date') is-invalid @enderror"  name="sem[{{$key}}][app_end_date]" value="{{ old('app_end_date') }}" placeholder="End date"  autocomplete="app_end_date">
											@error('app_end_date')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</td>
										
										<td class="col-1" style="text-align:right">Start Date</td>
									
										<td class="col-1">
											<input id="app_start_date{{$key}}" type="date" class="form-control @error('app_start_date') is-invalid @enderror"  name="sem[{{$key}}][app_start_date]" value="{{ old('app_start_date') }}"  placeholder="Start date" autocomplete="app_start_date">
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
								@endforeach
							</table>
						
						</div>
							
							<div class="col-6 row mb-0 text-sm-end">
								<div class="col-sm-6 offset-sm-6">
									<button type="submit" class="btn btn-primary">
										{{ __('Create') }}
									</button>
								</div>
							</div>
						</div>
                    </form>
                </div>
            </div>
       
</div>



<!-- Select2 CSS
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
 --> 
<!-- jQuery 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
--> 
<!-- Select2 JS
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 --> 



		<link href="{{ asset('build/assets/css/select2.min.css') }}" rel="stylesheet" />  

		<script src="{{ asset('build/assets/js/jquery.min.js') }}"></script> 

		<script src="{{ asset('build/assets/js/select2.min.js') }}"></script>
		<script>
		$(document).ready(function(){
		 
			// Initialize select2
			$("#selCourse").select2();

			// Read selected option
			$('#but_read').click(function(){
				var spName = $('#selCourse option:selected').text();
				var spId = $('#selCourse').val();

				$('#courseResult').html("id : " + spId + ", name : " + spName);

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
			
			jQuery('select[name="course_id"]').on('change',function(){

				var x = jQuery(this).val();			
				if ( x != '' ) {
					$('#other_course').attr("readonly", true); 	
					$('#other_course').val(''); 					
				}else{
					$('#other_course').attr("readonly", false); 
				}
		   });
		   
			//$('select[name="course_id"]').attr("disabled", "disabled");	
			
			//$('select[name="course_id"]').removeAttr("disabled");				
			
			jQuery('#other_course').keyup(function(){				
				var x = jQuery(this).val();			
				if ( x != '' ) {
					$('select[name="course_id"]').attr("disabled", "disabled");	
									
				}else{
					$('select[name="course_id"]').removeAttr("disabled");	
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
