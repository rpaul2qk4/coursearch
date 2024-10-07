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
			::-webkit-scrollbar {
				width: 5px;
				height: 5px;
			}
			::-webkit-scrollbar-button {
				background: #ccc
			}
			::-webkit-scrollbar-track-piece {
				background: #888
			}
			::-webkit-scrollbar-thumb {
				background: #eee
			}​
				
			li {
			  font-size: 12px;
			}
			/* Extra small devices (phones, 600px and down) */
			@media only screen and (max-width: 600px) {
			  li {font-size: 8px;}
			}

			/* Small devices (portrait tablets and large phones, 600px and up) */
			@media only screen and (min-width: 600px) {
			   li {font-size: 10px;}
			}

			/* Medium devices (landscape tablets, 768px and up) */
			@media only screen and (min-width: 768px) {
			   li {font-size: 12px;}
			} 

			/* Large devices (laptops/desktops, 992px and up) */
			@media only screen and (min-width: 992px) {
			   li {font-size: 12px;}
			} 

			/* Extra large devices (large laptops and desktops, 1200px and up) */
			@media only screen and (min-width: 1200px) {
			  li {font-size: 14px;}
			}


			 .blink {
			  animation: blink 1s infinite;
			}

			/* @keyframes blink {
			  0% {
				opacity: 1;
			  }
			  50% {
				opacity: 0;
			  }
			  100% {
				opacity: 1;
			  }
			}  */

			/* .blink {
			  animation: blink 3s infinite;
			}

			@keyframes blink {
			  0% {
				opacity: 1;
			  }
			  100% {
				opacity: 0;
				color: blue;
			  }
			} */

				.multicolortext {
					background-image: linear-gradient(to left, violet, indigo, green, blue, yellow, orange, red);
					-webkit-background-clip: text;
					-moz-background-clip: text;
					background-clip: text;
					color: transparent;
				}
				
				 .multicolor-text {
						text-align: center;
						font-size: 50px;
						background: linear-gradient(to left,
								black,
								green,  
								blue,  
								violet,
								indigo,
								brown,         
								orange,
								yellow, 
								black);
						-webkit-background-clip: text;
						color: transparent;
					}
				/* tooltip */

			.tooltip {
			  position: relative;
			  display: inline-block;
			  border-bottom: 1px dotted black;
			  cursor:pointer;
			}

			.tooltip .tooltiptext {
			  visibility: hidden;
			  width: 150px;
			  background-color: #eee;
			  color: #0a0a0;
			  text-align: center;
			  border-radius: 6px;
			  padding: 5px 0;
			  position: absolute;
			  z-index: 1;
			  top: -5px;
			  left: 110%;
			}

			.tooltip .tooltiptext::after {
			  content: "";
			  position: absolute;
			  top: 50%;
			  right: 100%;
			  margin-top: -5px;
			  border-width: 5px;
			  border-style: solid;
			  border-color: transparent Black transparent transparent;
			}
			.tooltip:hover .tooltiptext {
			  visibility: visible;
			}	
		</style>

		<script>
			document.addEventListener('contextmenu', function (e) {
				e.preventDefault();
			});
		</script>

		<script>
		$(document).ready(function () {
			function disableBack() {window.history.forward()}

			window.onload = disableBack();
			window.onpageshow = function (evt) {if (evt.persisted) disableBack()}
		});
		/* history.pushState(null, null, location.href);
		window.onpopstate = function () {
		  history.go(1);
		}; */
		</script>
		<style>
		body {
			user-select: none;
		}
		</style>
	</head>
	<body>
		<!--<section class="cd-intro">
			<h1>Comparison Table</h1>
		</section>  .cd-intro -->
<form action="{{route('specializations.comparison-report')}}" class="comp-specialization" method="POST" enctype="multipart/form-data">
@csrf

		<section class="cd-products-comparison-table" style="margin-top:2%;">
			<header style="padding:0 5% 20px !important">
				 <!-- Brand -->
				<div style="display:flex; justify-content:space-between;align-items:center">
					<div>
						<a  href="{{url('/')}}">
							<img src="{{asset('build/assets/img/logo1.png')}}" style="" alt="...">
						</a>
					</div>
					
					<div class="blink" style="width:60%;font-size:24px;padding:10px">
						<marquee><span class="multicolor-text">Please compare available specializations and courses with all details</span></marquee>
					</div>
					
					<div>
						<button type="button" onclick="location.href='{{url('/')}}'">Home</button>
					</div>
					
					<div>
						<button type="submit" class="btn btn-primary btn-sm" >Report</button>
					</div>
				</div>
			</header>

			<div class="cd-products-table">
				<div class="features">
					<div class="top-info" >University</div>
					<ul class="cd-features-list">
						<li>Campus</li>
						<li>Specialization</li>
						<li>Course</li>
						<li>Duration(years)</li>
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
						
						<li>Requirements Link</li>
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
										  <li><input type="checkbox" name="reports[]" value="{{$specialization->id}}" /></li>
										  <li><a href="#" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-close" style="color:red"></i></a></li>
										</ul> 
										<h4>{{$specialization->university->university}}</h4>
										
									</div> <!-- .top-info -->

									<ul class="cd-features-list">
										<li>
										
											<div class="tooltip">{{$specialization->campus->code}}
											  <span class="tooltiptext">{{$specialization->university->university}}</span>
											</div>
										</li>
										<li>
											<div class="tooltip">{{$specialization->specialization->code}}
											  <span class="tooltiptext">{{$specialization->specialization->specialization}}</span>
											</div>
										</li>
										<li>
											<div class="tooltip">{{$specialization->course->code}}
											  <span class="tooltiptext">{{$specialization->course->course}}</span>
											</div>
										</li>
										<li>{{$specialization->duration->duration}}</li>
										<li>
											<div class="tooltip">{{$specialization->university->country->code}}
											  <span class="tooltiptext">{{$specialization->university->country->country}}</span>
											</div>
										</li>	
										<li>
											
											{{$specialization->university->state->code}}
											
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
											<span style="font-size:8px">{{substr($sp_format->format->format, 0,4)}}&nbsp;/&nbsp;<i style="font-size:14px;color:red" class="fa fa-{{$specialization->university->country->currency_icon}}"></i>&nbsp;{{$sp_format->fees}}</span>
											@endforeach		
										</li>
										<li><i style="font-size:14px;color:red" class="fa fa-{{$specialization->university->country->currency_icon}}"></i>&nbsp;{{$specialization->apply_fee}}</li>
										<?php $dmonth=date('m',strtotime($specialization->apply_deadline));?>
										<?php $dmonth_year=date('d M Y',strtotime($specialization->apply_deadline));?>
										<li style="font-size:13.5px">{{$dmonth_year}}</li>
										<?php $smonth=date('m',strtotime($specialization->start_date));?>
										<?php $smonth_year=date('d M Y',strtotime($specialization->start_date));?>
										<li style="font-size:13.5px">{{$smonth_year}}</li>
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
											
					</ul> <!-- .cd-products-columns -->
				</div> <!-- .cd-products-wrapper -->
				
				<ul class="cd-table-navigation">
					<li><a href="#0" class="prev inactive">Prev</a></li>
					<li><a href="#0" class="next">Next</a></li>
				</ul>
			</div> <!-- .cd-products-table -->
		</section> <!-- .cd-products-comparison-table -->
		
		<section style="margin-top:-3% !important;"> 
		
			<div style="padding:0 2% 2px !important;background:#eee;">
				 <!-- Brand -->
				<div style="display:flex; justify-content:space-between;align-items:center">
					
					<div class="blink" style="width:100%;font-size:24px;padding:10px">
						<marquee><span class="multicolor-text">Please compare available specializations and courses with all details</span></marquee>
					</div>
					
				</div>
			</div>
		
		</section> 
</form>			
		<script src="{{ asset('build/assets/compare-assets/js/jquery-2.1.4.js') }}"></script>
		<script src="{{ asset('build/assets/compare-assets/js/main.js') }}"></script> <!-- Resource jQuery -->
	</body>
</html>