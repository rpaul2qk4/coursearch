@extends('layouts.app')

@section('content')
<div class="container-fluid1">
    <section class="py-5 py-md-11 bg-white" style="padding-bottom:3rem!important">
        <div class="container">
		@include('common.flash')
            <div class="row align-items-end mb-md-7 mb-4" data-aos="fade-up">
                <div class="col-md mb-4 mb-md-0">
                    <h1 class="mb-1">Browse by Discipline</h1>
                </div>
                <div class="col-md-auto">
                    <a href="{{route('disciplines.all-discipline-list')}}" class="d-flex align-items-center fw-medium">
                        Browse All
                        <div class="ms-2 d-flex">
                            <!-- Icon -->
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="currentColor"/>
                            </svg>

                        </div>
                    </a>
                </div>
            </div>

            <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4">
                
				@forelse($disciplines as $discipline)
				<div class="col mb-md-6 mb-4 px-2 px-md-4" data-aos="fade-up" data-aos-delay="50">
                    <!-- Card -->
                     <form name="discipline{{$discipline->id}}" action="{{ route('courses.course-list') }}" method="GET" onclick="document.discipline{{$discipline->id}}.submit();">
                      @csrf 
					  <a href="#" class="card icon-category border shadow-dark p-md-5 p-3 text-center lift">
                        <!-- Image -->
						<input type="text" name="course_list_data[disciplines][]" value="{{$discipline->id}}" hidden />
                        <div class="position-relative text-light">
                            <div class="position-absolute bottom-0 right-0 left-0 icon-h-p">
                                <i class="{{$discipline->icon}}"></i>
                            </div>
                            <!-- Icon BG -->
                            <svg width="116" height="82" viewBox="0 0 116 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9238 65.8391C11.9238 65.8391 20.4749 72.4177 35.0465 70.036C49.6182 67.6542 75.9897 78.4406 75.9897 78.4406C75.9897 78.4406 90.002 85.8843 104.047 79.2427C118.093 72.6012 115.872 58.8253 115.872 58.8253C115.743 56.8104 115.606 46.9466 97.5579 22.0066C91.0438 13.0024 84.1597 6.97958 75.9458 3.74641C58.8245 -2.99096 37.7881 -0.447684 22.9067 9.81852C15.5647 14.8832 7.65514 22.0695 3.0465 31.5007C-7.27017 52.6135 11.9238 65.8391 11.9238 65.8391Z" fill="currentColor"/>
                            </svg>

                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-0 pb-0 pt-6">
                            <h5 class="mb-0 line-clamp-1">{{$discipline->discipline}}</h5>
                            <p class="mb-0 line-clamp-1">Over {{$discipline->specializations->count()}} Courses</p>
                        </div>
                    </a>
                    </form>
                </div>
				@empty
				<div class="col mb-md-6 mb-4 px-2 px-md-4" data-aos="fade-up" data-aos-delay="50">
                  No data found!
                </div>
				@endforelse
				


            </div>
        </div>
    </section>
	<section class="pt-1 pt-md-11 pb-9" style="padding-bottom:3rem!important;padding-top:3rem!important">
        <div class="container">	

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
    </section>
</div>
@endsection
