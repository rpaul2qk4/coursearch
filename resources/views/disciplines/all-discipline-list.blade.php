@extends('layouts.app')
@section('content')

	<section class="py-md-6 bg-white body-bg-lg-color" style="width:100%;">
		<div class="container-fluid1 margintop ">

		   <!-- CONTROL BAR ================================================== -->
			<div class="container-fluid1 p-2 px-4 z-index-1 breadcrumbfontsize d-flex justify-content-between align-items-center ribbon-bg-lg-color" >
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-scroll justify-content-center">
								<li class="breadcrumb-item">
									<a href="{{url('/')}}" style="color:#fff !important">
										Home
									</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page" style="color:#fff !important">
									Courses List
								</li>
							</ol>
						</nav>
					</div>   
				
					<div  class="marqueesize">
						<marquee><span class="mb-lg-0 text-white1">We found <span class="text-dark1">{{$disciplines->count()}}</span> available disciplines</span></marquee>
					</div>
					
			</div>
			
			<style>

				.min-height-80 {
					min-height: 0px !important; 
				}										
				
			</style>

				@include('common.flash')
					
			<div>
				<div class="container py-5">
					<div class="col-lg-12" style="border-radius:30px">
						<div class="row mx-auto row-cols-1 row-cols-md-3 g-6 justify-content-center">
							@forelse($disciplines as $discipline) 
							<form name="discipline{{$discipline->id}}" action="{{ route('courses.course-list') }}" method="GET" onclick="document.discipline{{$discipline->id}}.submit();">
								  @csrf 
								<div class="shadow1 border card-bg-setup"> 
									@include('disciplines.grid-card')
								</div>						
							</form>
							@empty
							<div class="col mb-md-6 mb-4 px-2 px-md-4" data-aos="fade-up" data-aos-delay="50">
							  No data found!
							</div>
							@endforelse
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- <section class="pt-md-5 pb-1" style="padding-top:2rem!important;">
        <div class="container-fluid">	

			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
			  <div class="carousel-inner">
			  
				@forelse($advertisements as $id=>$advertisement)
								
				<div class="carousel-item @if($id==0) active @endif">
				  <img src="{{asset($advertisement->advertisement)}}" class="d-block w-100" alt="..."  style="width:100%;height:425px;">
				</div>
				@empty  
				<div class="carousel-item active">
				  <img src="{{asset('build/assets/img/add.png')}}" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				  <img src="{{asset('build/assets/img/add.png')}}" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				  <img src="{{asset('build/assets/img/add.png')}}" class="d-block w-100" alt="...">
				</div>
				@endforelse	
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			  </button>
			</div>

        </div>
    </section>	-->

@endsection	