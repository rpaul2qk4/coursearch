@extends('layouts.app')
@section('content')
    <section class="py-3 py-md-10 bg-white">
<div class="container-fluid">

        <div class="container text-center py-xl-2">
            <h1 class="display-4 fw-semi-bold mb-0">All Disciplines List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-scroll justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="text-gray-800" href="{{url('/')}}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item text-gray-800 active" aria-current="page">
                        All Disciplines List
                    </li>
                </ol>
            </nav>
        </div>
    

    <!-- CONTROL BAR
    ================================================== -->
    <div class="container mb-3 mb-xl-8 z-index-2">
        <div class="d-lg-flex align-items-center mb-6 mb-xl-0">
            <p class="mb-lg-0">We found <span class="text-dark">{{$disciplines->count()}} disciplines</span> available for you</p>
            <!-- <div class="ms-lg-auto d-lg-flex flex-wrap">
                <div class="mb-4 mb-lg-0 ms-lg-6">
                    <div class="border rounded d-flex align-items-center choices-label h-50p">
                        <span class="ps-5">Sort by:</span>
                        <select class="form-select form-select-sm text-dark border-0 ps-1 bg-transparent flex-grow-1 shadow-none dropdown-menu-end" data-choices>
                            <option>Default</option>
                            <option>New Courses</option>
                            <option>Price Low to High</option>
                            <option>Price High to low</option>
                        </select>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
<style>
.min-height-80 {
    min-height: 0px !important; 
}
</style>
        <div class="row">
            
			
			<div class="container">
		@include('common.flash')
           
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
			

            
        </div>
    </div>
    </section>
@endsection	