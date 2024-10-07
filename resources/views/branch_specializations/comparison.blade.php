<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{ asset('build/assets/compare-assets/css/reset.css') }}"> <!-- CSS reset -->
	<link rel="stylesheet" href="{{ asset('build/assets/compare-assets/css/style.css') }}"> <!-- Resource style -->
	<link rel="stylesheet" href="{{ asset('build/assets/fonts/fontawesome/fontawesome.css') }}">
	<script src="{{ asset('build/assets/compare-assets/js/modernizr.js') }}"></script> <!-- Modernizr -->
	
	  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;family=Lora:wght@400;700&amp;family=Montserrat:wght@400;500;600;700&amp;family=Nunito:wght@400;700&amp;display=swap" rel="stylesheet">

	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<title>{{ config('app.name') }} </title>
	
	   <!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
lis {
  font-size: 12px;
}
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
  lis {font-size: 8px;}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
   lis {font-size: 10px;}
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
   lis {font-size: 12px;}
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
   lis {font-size: 12px;}
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  lis {font-size: 14px;}
}
</style>
</head>
<body>
	<section class="cd-intro">
		<h1>Comparison Table</h1>
	</section> <!-- .cd-intro -->

	<section class="cd-products-comparison-table">
		<header>
			<h2><a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;Compare Universities & Courses</h2>

			<div class="actions">
				<a href="{{ url('/') }}" class="compare-btn lift d-none d-lg-inline-block aos-init aos-animate">Back</a>
			</div>
		</header>

		<div class="cd-products-table">
			<div class="features">
				<div class="top-info" >University</div>
				<ul class="cd-features-list">
					<li>Campus</li>
					<li>Specialization</li>
					<li>Course</li>
					<li>Duration</li>
					<li>Country</li>
					<li>State</li>
					
					<li>World Ranking</li>
					<li>Country Ranking</li>
					<li>Course Ranking</li>
					@foreach(DataHelper::getRequirementsArray() as $key=>$value)
					<li>{{$value}}</li>
					@endforeach
					<li>Tuition fee</li>
					
					<li>Application Fees</li>
					<li>Course deadline </li>
					<li>Course Start date </li>
					<li>GPA</li>
				
					
					<li>Acceptance Rate</li>
					
					<li>Entry Requirements Link</li>
					<li>Curriculum Link</li>
					<li>Scholorship Link</li>
					<li>Catelogue Link</li>
					<li>Apply Link</li>
				</ul>
			</div> <!-- .features -->
			
			<div class="cd-products-wrapper">
				<ul class="cd-products-columns">
					
					@foreach($specializations as $specialization)	
						<li class="product alert alert-warning1 alert-dismissible1 fade1 show1">
							<div class="" role="alert1">
								<div class="top-info">
									<ul id="menu" class="d-flex justify-content-between">
									  <li class="masters1">{{$specialization->program->code}}</li>
									  <li><a href="#"><i class="far fa-heart"></i></a></li>
									  <li><a href="#" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></a></li>
									</ul> 
									<h4>{{$specialization->university->university}}</h4>
									
								</div> <!-- .top-info -->

								<ul class="cd-features-list">
									<li>{{$specialization->campus->campus}}</li>
									<li>{{$specialization->specialization->specialization}}</li>
									<li>{{$specialization->course->course}}</li>
									<li>{{$specialization->duration->duration}}</li>
									<li>
										
										{{$specialization->university->country->country}}
										
									</li>	
									<li>
										
										{{$specialization->university->state->state}}
										
									</li>	
									<li>
										
										{{$specialization->university->world_ranking}}
										
									</li>	
									<li>	
										
										{{$specialization->university->country_ranking}}
										
									</li>
									<li>	
										
										{{$specialization->course_ranking}}
										
									</li>
									
									
									@foreach(DataHelper::getRequirementsArray() as $key=>$value) 
										<li>
											@if(in_array($key,array_keys($specialization->spl_reqms))) {{$specialization->spl_reqms[$key]}} @else *** @endif
										</li>
									@endforeach								
						
									<li>
										@foreach($specialization->branch_specialization_fees as $id=>$sp_format) 
										<span>{{substr($sp_format->format->format, 0, 4)}}&nbsp;/&nbsp;<i style="font-size:14px;color:red" class="fa fa-{{$specialization->country_currency}}"></i>&nbsp;{{$sp_format->fees}}</span>
										@endforeach		
									</li>
									<li><i style="font-size:12px;color:red" class="fa fa-{{$specialization->country_currency}}"></i>{{$specialization->apply_fee}}</li>
									<?php $dmonth=date('m',strtotime($specialization->apply_deadline));?>
									<?php $dmonth_year=date('M Y',strtotime($specialization->apply_deadline));?>
									<li>{{DataHelper::getSeason($dmonth)}}, {{$dmonth_year}}</li>
									<?php $smonth=date('m',strtotime($specialization->start_date));?>
									<?php $smonth_year=date('M Y',strtotime($specialization->start_date));?>
									<li>{{DataHelper::getSeason($smonth)}}, {{$smonth_year}}</li>
									<li>{{$specialization->gpa_req_rate}}</li>
									<li>
										<div class="progress-bg"><div class="skill html" style="width:{{$specialization->acceptance_rate}}%">{{$specialization->acceptance_rate}}%</div></div>							
									</li>
									
									<li>
										<div  onclick="window.open('{{$specialization->entry_requirements_link}}', '_blank', 'noopener, noreferrer');" style="cursor:pointer;align-items:center">
											<a href="#" class="compare-btn1" style="color:red">requirements</a>
										</div>
									</li>
									<li>
										<div onclick="window.open('{{$specialization->curriculum_link}}', '_blank', 'noopener, noreferrer');" style="cursor:pointer;">
											<a href="#" class="compare-btn1">curriculum</a>
										</div>
									</li>
									<li>
										<div onclick="window.open('{{$specialization->scholorship_link}}', '_blank', 'noopener, noreferrer');" style="cursor:pointer;">
											<a href="#" class="compare-btn1">scholorship</a>
										</div>
									</li>						
									<li>
										<div onclick="window.open('{{$specialization->catalogue_link}}', '_blank', 'noopener, noreferrer');" style="cursor:pointer;">
											<a href="#" class="compare-btn1">catalogue</a>
										</div>
									</li>
									<li>
										<div onclick="window.open('{{$specialization->apply_link}}', '_blank', 'noopener, noreferrer');" style="cursor:pointer;">
											<a href="#" class="compare-btn1">Apply</a>
										</div>
									</li>								
								</ul>
								<!-- .product -->
							</div>
						</li>
					@endforeach
										
				</ul>  <!-- .cd-products-columns -->
			</div> <!-- .cd-products-wrapper -->
			
			<ul class="cd-table-navigation">
				<li><a href="#0" class="prev inactive">Prev</a></li>
				<li><a href="#0" class="next">Next</a></li>
			</ul>
		</div> <!-- .cd-products-table -->
	</section> <!-- .cd-products-comparison-table -->
	

	</section> <!-- .cd-products-comparison-table -->
		
			<section style="margin-top:-5% !important;"> 
		
			<div style="padding:0 2% 5px !important;background:#eee;">
				 <!-- Brand -->
				<div style="display:flex; justify-content:space-between;align-items:center">
					
					<div class="blink" style="width:100%;font-size:24px;padding:10px">
						<marquee><span class="multicolor-text">Please compare available specializations and courses with all details</span></marquee>
					</div>
					
				</div>
			</div>
		
		</section> 
	
	
<script src="{{ asset('build/assets/compare-assets/js/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('build/assets/compare-assets/js/main.js') }}"></script> <!-- Resource jQuery -->
</body>
</html>