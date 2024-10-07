@extends('layouts.app')

@section('content')

<div >
    <section class="py-md-6 bg-white">		
		
        @include('common.flash')
        <div class="margintop body-bg-lg-color" style="width:100%; ">
		
			<div class="container-fluid1 z-index-1 breadcrumbfontsize ">
				<div class="bg-primary1 d-flex justify-content-between align-items-center ribbon-bg-lg-color" data-aos="fade-up"  style="font-size:16px;padding:18px;">
					<div class="text-dark1">
						Browse by Discipline
					</div>
					<div onclick="location.href='{{route('disciplines.all-discipline-list')}}'" style="cursor:pointer;color:#fff">
							Browse All >>  
					</div>
				</div>
            </div>
			<style>
			
				/*.col a:hover {
					background-color:#0000FF;
					//background-image: url('build/assets/img/backgroun3.jpg');
					color:#fff;
				}
				
				.col a:hover h5{
					color:#fff;
				}*/
				
			</style>
			
			<div class="container py-5">
				<div class="col-lg-12" style="border-radius:30px">
					<div class="row mx-auto row-cols-1 row-cols-md-4 g-6 justify-content-center">
					@forelse($disciplines as $discipline) 
					<form name="discipline{{$discipline->id}}" action="{{ route('courses.course-list') }}" method="GET" onclick="document.discipline{{$discipline->id}}.submit();">
						  @csrf 
						<div class="shadow1 border card-bg-setup"> 
						<a href="#">
							@include('disciplines.grid-card')
							</a>
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
       
    </section>
    
    <section class="pb-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Success Stories</h2>
                    <div id="testimonialSec" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-6 position-relative">
                                        <img src="{{asset('build/assets/img/success-story-bg-1.jpg')}}" class="d-block w-100" alt="...">
                                        <div class="testimonial-text">
                                            <p class="">"Pursuing an MBA has been transformative for me. The curriculum is well-rounded, covering everything from finance to leadership skills. The case studies are particularly enriching, providing real-world insights. "</p>
                                            <h6 class="text-white">Sanjeev Agarwal</h6>
                                        </div>
                                        <img class="img-fluid default-user" alt="img" src="{{asset('build/assets/img/default-user.jpg')}}">
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <img src="{{asset('build/assets/img/success-story-bg-1.jpg')}}" class="d-block w-100" alt="...">
                                        <div class="testimonial-text">
                                            <p class="">"Choosing B.Tech was one of the best decisions I've made. The hands-on approach to learning has equipped me with practical skills that are in high demand in the tech industry. The faculty is knowledgeable and supportive, guiding us through complex concepts with clarity. "</p>
                                            <h6 class="text-white">Rapali Sinha</h6>
                                        </div>
                                        <img class="img-fluid default-user" alt="img" src="{{asset('build/assets/img/default-user.jpg')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-6 position-relative">
                                        <img src="{{asset('build/assets/img/success-story-bg-1.jpg')}}" class="d-block w-100" alt="...">
                                        <div class="testimonial-text">
                                            <p class="">"Studying BBA has provided me with a strong foundation in business principles. The diverse range of subjects, from marketing to organizational behavior, has given me a holistic understanding of how businesses operate."</p>
                                            <h6 class="text-white">Sushmita Das</h6>
                                        </div>
                                        <img class="img-fluid default-user" alt="img" src="{{asset('build/assets/img/default-user.jpg')}}">
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <img src="{{asset('build/assets/img/success-story-bg-1.jpg')}}" class="d-block w-100" alt="...">
                                        <div class="testimonial-text">
                                            <p class="">"Embarking on an M.Sc journey has deepened my understanding of my field of study. The research-oriented curriculum has allowed me to delve into specialized areas and contribute to cutting-edge discoveries. "</p>
                                            <h6 class="text-white">Vipul Chatarjee</h6>
                                        </div>
                                        <img class="img-fluid default-user" alt="img" src="{{asset('build/assets/img/default-user.jpg')}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-6 position-relative">
                                        <img src="{{asset('build/assets/img/success-story-bg-1.jpg')}}" class="d-block w-100" alt="...">
                                        <div class="testimonial-text">
                                            <p class="">"Studying engineering has been both challenging and rewarding. The rigorous coursework has honed my problem-solving abilities and analytical skills. The practical projects and internships have provided real-world exposure, preparing me for the demands of the industry."</p>
                                            <h6 class="text-white">Swathi Kommu</h6>
                                        </div>
                                        <img class="img-fluid default-user" alt="img" src="{{asset('build/assets/img/default-user.jpg')}}">
                                        
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <img src="{{asset('build/assets/img/success-story-bg-1.jpg')}}" class="d-block w-100" alt="...">
                                        <div class="testimonial-text">
                                            <p class="">"Enrolling in a Bachelor of Technology program has been an exhilarating experience. The dynamic nature of the tech industry means that the curriculum is constantly evolving to keep pace with the latest trends and innovations. "</p>
                                            <h6 class="text-white">Ramya Daripalli</h6>
                                        </div>
                                        <img class="img-fluid default-user" alt="img" src="{{asset('build/assets/img/default-user.jpg')}}">
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialSec" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialSec" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
	<section class="d-none" style="padding-bottom:2rem!important;">
        <div class="container-fluid margintop">	

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
	<div id="mySidenavButton">
		<a href="{{route('requirements.visa-processing-details')}}" id="scholorshipsButton" target="_blank">Grant</a>
	</div>
</div>
@endsection
