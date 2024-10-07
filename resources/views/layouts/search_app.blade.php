<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from transvelo.github.io/skola-html/5.1/docs/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 12:32:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
   	<meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Universities') }}</title>

    <!-- Fonts 
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
-->
    

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('build/assets/../favicon.png')}}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;family=Lora:wght@400;700&amp;family=Montserrat:wght@400;500;600;700&amp;family=Nunito:wght@400;700&amp;display=swap" rel="stylesheet">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/fonts/fontawesome/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/flickity-fade/flickity-fade.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/flickity/dist/flickity.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/highlightjs/styles/vs2015.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/jarallax/dist/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/quill/dist/quill.core.css') }}" />

    <!-- Map -->
    <link href="{{ asset('build/../../../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css') }}" rel='stylesheet' />

    <!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/cust-styles.css') }}">
	<!-- Jquery -->
	 
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <title>Universities</title>
<!-- Scripts 
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
-->
<!-- copy protect -->
<script>
   /* document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });*/
</script>

<script>
/*
$(document).ready(function () {
    function disableBack() {window.history.forward()}

    window.onload = disableBack();
    window.onpageshow = function (evt) {if (evt.persisted) disableBack()}
});
*/


/* history.pushState(null, null, location.href);
window.onpopstate = function () {
  history.go(1);
}; */
</script>
<style>
body {
    user-select: none;
}
.line-height-one{
	border-radius:5px;
}
.line-height-one:hover{
	background-image: linear-gradient(to left top, #e4fbe0, #c8f5e2, #aeeee9, #9be5f4, #96d9fc, #a1d6fe, #add4fe, #b8d1fd, #c4dafe, #d1e3fe, #dfecff, #edf5ff);
}
input[type='checkbox']{
	color:#0a0a0a;
}
</style>
</head>
<body class="bg-light" style="padding-top: 90px;">

    <!-- MODALS
    ================================================== -->
    <!-- Modal Sidebar account -->
    <div class="modal fade" id="modalExample" tabindex="-1" role="dialog" aria-labelledby="modalExampleTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">

            <!-- Close -->
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>

            <!-- Heading -->
            <h2 class="fw-bold text-center mb-1" id="modalExampleTitle">
              Schedule a demo with us
            </h2>

            <!-- Text -->
            <p class="font-size-lg text-center text-muted mb-6 mb-md-8">
              We can help you solve company communication.
            </p>

            <!-- Form -->
            <form>
              <div class="row">
                <div class="col-12 col-md-6">

                  <!-- First name -->
                  <div class="form-label-group">
                    <input type="text" class="form-control form-control-flush" id="registrationFirstNameModal" placeholder="First name">
                    <label for="registrationFirstNameModal">First name</label>
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Last name -->
                  <div class="form-label-group">
                    <input type="text" class="form-control form-control-flush" id="registrationLastNameModal" placeholder="Last name">
                    <label for="registrationLastNameModal">Last name</label>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-6">

                  <!-- Email -->
                  <div class="form-label-group">
                    <input type="email" class="form-control form-control-flush" id="registrationEmailModal" placeholder="Email">
                    <label for="registrationEmailModal">Email</label>
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Password -->
                  <div class="form-label-group">
                    <input type="password" class="form-control form-control-flush" id="registrationPasswordModal" placeholder="Password">
                    <label for="registrationPasswordModal">Password</label>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-12">

                  <!-- Submit -->
                  <button class="btn btn-block btn-primary mt-3 lift">
                    Request a demo
                  </button>

                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <div class="modal modal-sidebar left fade-left fade" id="accountModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Signin -->
                <div class="collapse show" id="collapseSignin" data-bs-parent="#accountModal">
                    <div class="modal-header">
                        <h5 class="modal-title">Log In to Your Account!</h5>
                        <button type="button" class="close text-primary" data-bs-dismiss="modal" aria-label="Close">
                            <!-- Icon -->
                            <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.142135 2.00015L1.55635 0.585938L15.6985 14.7281L14.2843 16.1423L0.142135 2.00015Z" fill="currentColor"></path>
                                <path d="M14.1421 1.0001L15.5563 2.41431L1.41421 16.5564L0 15.1422L14.1421 1.0001Z" fill="currentColor"></path>
                            </svg>

                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Signin -->
                        <form class="mb-5" method="POST" action="{{route('users.login')}}" >
						@csrf
                            <!-- Email -->
                            <div class="form-group mb-5">
                                <label for="modalSigninEmail">
                                    Username or Email
                                </label>
                                <input type="email" class="form-control" name="email" id="modalSigninEmail" placeholder="email">
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-5">
                                <label for="modalSigninPassword">
                                    Password
                                </label>
                                <input type="password" class="form-control" name="password" id="modalSigninPassword" placeholder="******">
                            </div>

                            <div class="d-flex align-items-center mb-5 font-size-sm">
                                <div class="form-check">
                                    <input class="form-check-input text-gray-800" type="checkbox" id="autoSizingCheck">
                                    <label class="form-check-label text-gray-800" for="autoSizingCheck">
                                        Remember me
                                    </label>
                                </div>

                                <div class="ms-auto">
                                    <a class="text-gray-800" data-bs-toggle="collapse" href="#collapseForgotPassword" role="button" aria-expanded="false" aria-controls="collapseForgotPassword">Forgot Password</a>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-block btn-primary" type="submit">
                                LOGIN
                            </button>
                        </form>

                        <!-- Text -->
                        <p class="mb-0 font-size-sm text-center">
                            Don't have an account? <a class="text-underline" data-bs-toggle="collapse" href="#collapseSignup" role="button" aria-expanded="false" aria-controls="collapseSignup">Sign up</a>
                        </p>
                    </div>
                </div>

                <!-- Signup -->
                <div class="collapse" id="collapseSignup" data-bs-parent="#accountModal">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign Up and Start Learning!</h5>
                        <button type="button" class="close text-primary" data-bs-dismiss="modal" aria-label="Close">
                            <!-- Icon -->
                            <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.142135 2.00015L1.55635 0.585938L15.6985 14.7281L14.2843 16.1423L0.142135 2.00015Z" fill="currentColor"></path>
                                <path d="M14.1421 1.0001L15.5563 2.41431L1.41421 16.5564L0 15.1422L14.1421 1.0001Z" fill="currentColor"></path>
                            </svg>

                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Signup -->
                        <form class="mb-5" method="POST" action="{{route('users.register')}}" enctype="multipart/form-data">
						@csrf

                            <!-- Username -->
                            <div class="form-group  mb-5">                               
                                <input type="text" class="form-control" id="modalSignupUsername" placeholder="Enter Name" name="name">
                            </div>

                            <!-- Email -->
                            <div class="form-group  mb-5">                             
                                <input type="email" class="form-control" id="modalSignupEmail" placeholder="Enter email" name="email">
                            </div>
                            <!-- Mobile -->
                            <div class="form-group  mb-5">
                                <input type="number" class="form-control" id="modalSignupMobileNumber" placeholder="Enter mobile number" name="mobile">
                            </div>

                            <!-- Password -->
                            <div class="form-group  mb-5">
                                 <input type="password" class="form-control" id="modalSignupPassword" placeholder="**********" name="password">
                            </div>
							
                            <!-- Password -->
                            <div class="form-group mb-5">
                                <input type="password" class="form-control" id="modalSignupPasswordConfirmation" placeholder="**********" name="password_confirmation">
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-block btn-primary" type="submit">
                                SIGN UP
                            </button>

                        </form>

                        <!-- Text -->
                        <p class="mb-0 font-size-sm text-center">
                            Already have an account? <a class="text-underline" data-bs-toggle="collapse" href="#collapseSignin" role="button" aria-expanded="true" aria-controls="collapseSignin">Log In</a>
                        </p>
                    </div>
                </div>

                <!-- Forgot Password -->
                <div class="collapse" id="collapseForgotPassword" data-bs-parent="#accountModal">
                    <div class="modal-header">
                        <h5 class="modal-title">Recover password!</h5>
                        <button type="button" class="close text-primary" data-bs-dismiss="modal" aria-label="Close">
                            <!-- Icon -->
                            <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.142135 2.00015L1.55635 0.585938L15.6985 14.7281L14.2843 16.1423L0.142135 2.00015Z" fill="currentColor"></path>
                                <path d="M14.1421 1.0001L15.5563 2.41431L1.41421 16.5564L0 15.1422L14.1421 1.0001Z" fill="currentColor"></path>
                            </svg>

                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Recover Password -->
                        <form class="mb-5">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="modalForgotpasswordEmail">
                                    Email
                                </label>
                                <input type="email" class="form-control" id="modalForgotpasswordEmail" placeholder="johndoe@creativelayers.com">
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-block btn-primary" type="submit">
                                RECOVER PASSWORD
                            </button>
                        </form>

                        <!-- Text -->
                        <p class="mb-0 font-size-sm text-center">
                            Remember your password? <a class="text-underline" data-bs-toggle="collapse" href="#collapseSignin" role="button" aria-expanded="false" aria-controls="collapseSignin">Log In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sidebar cart -->
    <div class="modal modal-sidebar left fade-left fade" id="cartModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header mb-4">
                    <h5 class="modal-title">Your Shopping Cart</h5>
                    <button type="button" class="close text-primary" data-bs-dismiss="modal" aria-label="Close">
                        <!-- Icon -->
                        <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.142135 2.00015L1.55635 0.585938L15.6985 14.7281L14.2843 16.1423L0.142135 2.00015Z" fill="currentColor"></path>
                            <path d="M14.1421 1.0001L15.5563 2.41431L1.41421 16.5564L0 15.1422L14.1421 1.0001Z" fill="currentColor"></path>
                        </svg>

                    </button>
                </div>

                <div class="modal-body">
                    <ul class="list-group list-group-flush mb-5">
                        <li class="list-group-item border-bottom py-0">
                            <div class="d-flex py-5">
                                <div class="bg-gray-200 w-60p h-60p rounded-circle overflow-hidden"></div>

                                <div class="flex-grow-1 mt-1 ms-4">
                                    <h6 class="fw-normal mb-0">Basic of Nature</h6>
                                    <div class="font-size-sm">1 × $18.00</div>
                                </div>

                                <a href="#" class="d-inline-flex text-secondary">
                                    <!-- Icon -->
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.0469 0H5.95294C5.37707 0 4.90857 0.4685 4.90857 1.04437V3.02872H6.16182V1.25325H9.83806V3.02872H11.0913V1.04437C11.0913 0.4685 10.6228 0 10.0469 0Z" fill="currentColor"/>
                                        <path d="M11.0492 5.51652L9.7968 5.47058L9.52527 12.8857L10.7777 12.9315L11.0492 5.51652Z" fill="currentColor"/>
                                        <path d="M8.62666 5.49353H7.37341V12.9087H8.62666V5.49353Z" fill="currentColor"/>
                                        <path d="M6.47453 12.8855L6.203 5.47034L4.95056 5.51631L5.22212 12.9314L6.47453 12.8855Z" fill="currentColor"/>
                                        <path d="M0.543091 2.4021V3.65535H1.849L2.885 15.4283C2.9134 15.7519 3.18434 16 3.50912 16H12.4697C12.7946 16 13.0657 15.7517 13.0939 15.4281L14.1299 3.65535H15.4569V2.4021H0.543091ZM11.8958 14.7468H4.08293L3.10706 3.65535H12.8719L11.8958 14.7468Z" fill="currentColor"/>
                                    </svg>

                                </a>
                            </div>
                        </li>

                        <li class="list-group-item border-bottom py-0">
                            <div class="d-flex py-5">
                                <div class="bg-gray-200 w-60p h-60p rounded-circle overflow-hidden"></div>

                                <div class="flex-grow-1 mt-1 ms-4">
                                    <h6 class="fw-normal mb-0">Color Harriet Tubman</h6>
                                    <div class="font-size-sm">1 × $18.00</div>
                                </div>

                                <a href="#" class="d-inline-flex text-secondary">
                                    <!-- Icon -->
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.0469 0H5.95294C5.37707 0 4.90857 0.4685 4.90857 1.04437V3.02872H6.16182V1.25325H9.83806V3.02872H11.0913V1.04437C11.0913 0.4685 10.6228 0 10.0469 0Z" fill="currentColor"/>
                                        <path d="M11.0492 5.51652L9.7968 5.47058L9.52527 12.8857L10.7777 12.9315L11.0492 5.51652Z" fill="currentColor"/>
                                        <path d="M8.62666 5.49353H7.37341V12.9087H8.62666V5.49353Z" fill="currentColor"/>
                                        <path d="M6.47453 12.8855L6.203 5.47034L4.95056 5.51631L5.22212 12.9314L6.47453 12.8855Z" fill="currentColor"/>
                                        <path d="M0.543091 2.4021V3.65535H1.849L2.885 15.4283C2.9134 15.7519 3.18434 16 3.50912 16H12.4697C12.7946 16 13.0657 15.7517 13.0939 15.4281L14.1299 3.65535H15.4569V2.4021H0.543091ZM11.8958 14.7468H4.08293L3.10706 3.65535H12.8719L11.8958 14.7468Z" fill="currentColor"/>
                                    </svg>

                                </a>
                            </div>
                        </li>

                        <li class="list-group-item border-bottom py-0">
                            <div class="d-flex py-5">
                                <div class="bg-gray-200 w-60p h-60p rounded-circle overflow-hidden"></div>

                                <div class="flex-grow-1 mt-1 ms-4">
                                    <h6 class="fw-normal mb-0">Digital Photography</h6>
                                    <div class="font-size-sm">1 × $18.00</div>
                                </div>

                                <a href="#" class="d-inline-flex text-secondary">
                                    <!-- Icon -->
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.0469 0H5.95294C5.37707 0 4.90857 0.4685 4.90857 1.04437V3.02872H6.16182V1.25325H9.83806V3.02872H11.0913V1.04437C11.0913 0.4685 10.6228 0 10.0469 0Z" fill="currentColor"/>
                                        <path d="M11.0492 5.51652L9.7968 5.47058L9.52527 12.8857L10.7777 12.9315L11.0492 5.51652Z" fill="currentColor"/>
                                        <path d="M8.62666 5.49353H7.37341V12.9087H8.62666V5.49353Z" fill="currentColor"/>
                                        <path d="M6.47453 12.8855L6.203 5.47034L4.95056 5.51631L5.22212 12.9314L6.47453 12.8855Z" fill="currentColor"/>
                                        <path d="M0.543091 2.4021V3.65535H1.849L2.885 15.4283C2.9134 15.7519 3.18434 16 3.50912 16H12.4697C12.7946 16 13.0657 15.7517 13.0939 15.4281L14.1299 3.65535H15.4569V2.4021H0.543091ZM11.8958 14.7468H4.08293L3.10706 3.65535H12.8719L11.8958 14.7468Z" fill="currentColor"/>
                                    </svg>

                                </a>
                            </div>
                        </li>
                    </ul>

                    <div class="d-flex mb-5">
                        <h5 class="mb-0 me-auto">Order Subtotal</h5>
                        <h5 class="mb-0">$121.87</h5>
                    </div>

                    <div class="d-md-flex justify-content-between">
                        <a href="#" class="d-block d-md-inline-block mb-4 mb-md-0 btn btn-primary btn-sm-wide">VIEW CART</a>
                        <a href="#" class="d-block d-md-inline-block btn btn-teal btn-sm-wide text-white">CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- NAVBAR
    ================================================== -->
    <section>
		<header class="navbar navbar-expand-xl navbar-light fixed-top bg-white shadow-dark">
			@include('layouts.header2')
		</header>
	</section>

    <!-- CONTENT
    ================================================== -->
    <section  class=" py-md-6 bg-white">
	
    <!-- CONTROL BAR ================================================== -->
    <div class="container-fluid1 margintop pl-2 pr-2 mb-xl-4 breadcrumbfontsize1 d-flex justify-content-between align-items-center ribbon-bg-lg-color">
        	
			<div class="p-2">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-scroll justify-content-center">
						<li class="breadcrumb-item">
							<a href="{{url('/')}}" style="color:#fff !important">
								Home
							</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">
							Courses List
						</li>
					</ol>
				</nav>
			</div>   
		
			<div  class="marqueesize">
				<marquee><span class="mb-lg-0">We found <span class="text-dark1">{{$total_specializations}}</span> available specializations</span></marquee>
			</div>
			 <!-- Button trigger modal -->							
				<!-- Button trigger modal 
			<div>
				<a type="button" class="btn btn-primary1 text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
				  <i class="fa fa-filter"></i> Filter
				</a>
			</div>-->
    </div>
    <div class="container-fluid margintop">
	
	
	<style>
		.min-height-80 {
			min-height: 0px !important; 
		}
		.pt-md-11 {
			padding-top: 3rem !important; 
		}
	</style>
        <div class="row">
            <div class="col-xl-3 ">
			
			<!-- @include('test.sidemenu2')-->
                <!-- SIDEBAR FILTER ================================================== -->
                <div class=" vertical-scroll p-3" id="courseSidebar1" style="border-radius:0px;background-image: linear-gradient(to right top, #dfe4ea, #d5e4e9, #cee4e2, #cee2d6, #d7dec8);">
                 <form action="{{route('courses.course-list')}}" method="GET" id="configform" name="search_form" enctype="multipart/form-data">
					@csrf   
					<!-- Discipline start -->
					<div class="border1 rounded1 shadow1 mb-1 overflow-hidden" >
						<div class="d-flex align-items-center" id="curriculumheadingTwo">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#disciplineFilter" aria-expanded="false" aria-controls="disciplineFilter">
								   
										<div>
										Discipline
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="closeForm()">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="openForm()">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>
						
						
						
						<div id="disciplineFilter" class="collapse show1" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum"  style="height:200px;overflow-y:scroll;background-color:#F5F5F5">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
							
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox" >
									@forelse($disciplines as $discipline)
									
									<style>
							
										#innerlist{{$discipline->id}}{
											display: none;
											padding: 5px;
										}

										input[value="innerlist{{$discipline->id}}"]:checked ~ #innerlist{{$discipline->id}} {
											display: block;
										}
										
									</style>
									
									
										<li class="custom-control custom-checkbox">
											<input type="radio" name="course_list_data[disciplines][]" value="innerlist{{$discipline->id}}" class="custom-control-input" id="discipline{{$discipline->id}}" @if(!empty($course_list_data['disciplines']) && (in_array($discipline->id, $course_list_data['disciplines'])))checked @endif  onchange="this.form.submit()" />
											<label class="custom-control-label font-size-base" for="discipline{{$discipline->id}}"><small>{{ucfirst($discipline->discipline)}}({{$discipline->branch_specializations->count()}})</small></label>
											 @if($discipline->specializations->count())
												<ul id="innerlist{{$discipline->id}}" class="list-unstyled list-group list-checkbox show-hide" style="height:200px;overflow-y:scroll;background-color:#FFFAF0">
													@foreach($discipline->specializations as $specialization)
														@if(!empty($specialization->courses))
															<li class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input sub_disp{{$discipline->id}}" attr="submenu" value="{{$specialization->id}}" id="sub_displine{{$discipline->id}}_{{$specialization->id}}"  name="course_list_data[disciplines][specializations][]" @if(!empty($course_list_data['disciplines']['specializations']) && (in_array($specialization->id, $course_list_data['disciplines']['specializations'])))checked @endif  onchange="this.form.submit()" />
																<label class="custom-control-label font-size-base" for="sub_displine{{$discipline->id}}_{{$specialization->id}}" ><small>{{$specialization->specialization}}({{$specialization->branch_specializations->count()}})</small></label>
															</li>
														@endif
													@endforeach
												</ul>
											@endif 
										</li>
										
										
										<script>
										var btn=true;
											$(document).ready(function(){
												
												/* if (!$("#discipline{{$discipline->id}}").prop("checked")) {
													$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", false);
												} */
												
												$("#discipline{{$discipline->id}}").on('click',function() {
													 window.btn=!window.btn;
													$("#discipline{{$discipline->id}}").prop("checked", btn);
													//alert($(this).prop("checked"));
													if ($(this).prop("checked")) {
														$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", false);
													}else if (!$(this).prop("checked")) {
														$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", false);
													}else{
														$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", false);
													}
													//$("#innerlist{{$discipline->id}} input[type=checkbox]").prop("checked", $(this).prop("checked"));
												});

												$(".sub_disp{{$discipline->id}} input[value={{$specialization->id}}]").on('click',function() {
													if (!$(this).prop("checked")) {
														$("#discipline{{$discipline->id}}").prop("checked", true);
													}
													if ($(this).prop("checked")) {
														$("#discipline{{$discipline->id}}").prop("checked", false);
													}
												});
												
											});
											
										</script>
										
									@empty	
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										</li>
									@endforelse	
										
									</ul>
									
								</div> 
								
							</div>
						</div>
											
					</div>
							<!-- Country Type start -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="degreeType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#countryTypeFilter" aria-expanded="false" aria-controls="countryTypeFilter">
								   
										<div>
										Country/State
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="countryTypeFilter" class="collapse show1" aria-labelledby="degreeType" data-parent="#accordionCurriculum">
							<div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="country_id" name="course_list_data[country][]" style="background-color:#F5F5F5"  onchange="this.form.submit()">
										@forelse(DataHelper::getCountriesOptions() as $key=>$value)
											@if(!empty($course_list_data['country']) && ($key==$course_list_data['country'][0]))
												<option value="{{$key}}" selected>{{$value}} </option>
											@else
												  <option value="{{$key}}">{{$value}}</option>
											@endif
										@endforeach
									</select>
								</div> 
								
							</div><div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="state_id" name="course_list_data[state][]" style="background-color:#F5F5F5"  onchange="this.form.submit()">
										@foreach($states as $key=>$value)
											@if(!empty($course_list_data['state']) && ($key==$course_list_data['state'][0]))
												<option value="{{$key}}" selected>{{$value}}</option>
											@else
												<option value="{{$key}}" >{{$value}}</option>
											@endif
										@endforeach
									</select>
								</div> 
								
							</div>
						</div>
					</div>
					
			<!-- Universities/Campuses -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="universityType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#UniversityTypeFilter" aria-expanded="false" aria-controls="UniversityTypeFilter">
								   
										<div>
										Universities/Campuses
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="UniversityTypeFilter" class="collapse show1" aria-labelledby="universityType" data-parent="#accordionCurriculum">
							<div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="university_id" name="course_list_data[university][]" style="background-color:#F5F5F5"  onchange="this.form.submit()" >
										@if(!empty($state_universities))
											@foreach($state_universities as $key=>$value)
												@if(!empty($course_list_data['university']) && ($course_list_data['university'][0] == $key))
													<option value="{{$key}}" selected>{{$value}}</option>
												@else
													<option value="{{$key}}">{{$value}}</option>
												@endif
											@endforeach
										@endif
									</select>
								</div> 
								
							</div><div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="campus_id" name="course_list_data[campus][]" style="background-color:#F5F5F5"   onchange="this.form.submit()">
											@if(!empty($campuses))
												@foreach($campuses as $key=>$value)
													@if(!empty($course_list_data['campus']) && ($course_list_data['campus'][0] == $key))
														<option value="{{$key}}" selected>{{$value}}</option>
													@else
														<option value="{{$key}}">{{$value}}</option>
													@endif
												@endforeach
											@endif
									</select>
								</div> 
								
							</div>
						</div>
					</div>							
					<!-- GRE Score -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="greScore">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#greScoreFilter" aria-expanded="false" aria-controls="greScoreFilter">
								   
										<div>
										GRE Score
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="greScoreFilter" class="collapse show1" aria-labelledby="greScore" data-parent="#accordionCurriculum">
							<div class="">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<select class="form-select" id="gre_score" name="course_list_data[gre_score][]" style="background-color:#F5F5F5"  onchange="this.form.submit()">
										@forelse(DataHelper::greScoreOptions() as $key=>$value)
											@if(!empty($course_list_data['gre_score']) && ($key==$course_list_data['gre_score'][0]))
												<option value="{{$key}}" selected>{{$value}}</option>
											@else
												  <option value="{{$key}}">{{$value}}</option>
											@endif
										@endforeach
									</select>
								</div> 
								
							</div>
						</div>
					</div>
					
					<!-- Tution fee start -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="tutionHeading">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#tutionFeeFilter" aria-expanded="false" aria-controls="tutionFeeFilter">
								   
										<div>
										 Tution Fee
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>			
								   
								</button>
							</h5>
						</div>

						<div id="tutionFeeFilter" class="collapse show1" aria-labelledby="tutionHeading" data-parent="#accordionCurriculum" style="background-color:#F5F5F5">

                            <div class="border-top px-5 py-4 min-height-70 d-md-flex1 align-items-center">
								
								
                                
									<div class="input-group mb-3">
										<span class="input-group-text">Fees&nbsp;<i class="fa fa-rupee fa-1x"></i>&nbsp;|&nbsp;<i class="fa fa-usd fa-1x"></i></span>
										<input id="amount" type="text" class="form-control" placeholder="0" value="{{$course_list_data['fees']??0}}" name="course_list_data[fees]"  onchange="this.form.submit()" >
									</div>  
									<small>Fee Details =>  Min : 0 - Max : 5999999</small>                                  
                             
								

								<input type="range" class="form-range" min="0" max="9999999" step="1" value="{{$course_list_data['fees']??0}}" id="slider-range" >
							<!--<div>
								<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getDataAccessFormat() as $key=>$value)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="formatFilter{{$key}}" name="course_list_data[dataformat][]" value="{{$key}}" @if(!empty($course_list_data['dataformat']) && (in_array($key, $course_list_data['dataformat'])))checked @endif>
											<label class="custom-control-label font-size-base" for="formatFilter{{$key}}"><i class="fa fa-sort-amount-{{$key}}"></i>&nbsp;{{ucfirst($value)}} </label>
										</li>
									@empty	
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										</li>
									@endforelse	
									
								</ul>
							</div> -->
							</div>
							
						
							
							
							
							<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

							<script>
							$(document).ready(function(){
								
								$('#slider-range').change(function(){
									$('#amount').val($(this).val());
								});
								$('#amount').change(function(){
									$('#slider-range').val($(this).val());
								});
								
							});
							</script>
						</div>
					</div>
					<!-- Tution fee end -->
					
					
					<!-- Format Type start -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="degreeType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#durationFilter" aria-expanded="false" aria-controls="durationFilter">
								   
										<div>
										Duration
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="durationFilter" class="collapse show1" aria-labelledby="formatFilter" data-parent="#accordionCurriculum" style="background-color:#F5F5F5" >
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center" style="height:100px;overflow-y:scroll;">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0" style="margin-top:35px;" >
									<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getDurations() as $duration)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="formatFilter{{$duration->id}}" name="course_list_data[duration][]" value="{{$duration->id}}" @if(!empty($course_list_data['duration']) && (in_array($duration->id, $course_list_data['duration'])))checked @endif  onchange="this.form.submit()">
											<label class="custom-control-label font-size-base" for="formatFilter{{$duration->id}}">{{ucfirst($duration->duration)}} </label>
										</li>
									@empty	
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										</li>
									@endforelse	
										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Format end -->
					
					<!-- Format Type start -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="formatType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#formatFilter" aria-expanded="false" aria-controls="formatFilter">
								   
										<div>
										Format
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="formatFilter" class="collapse show1" aria-labelledby="formatFilter" data-parent="#accordionCurriculum" style="background-color:#F5F5F5">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getFormats() as $format)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="format{{$format->id}}" name="course_list_data[formats][]" value="{{$format->id}}" @if(!empty($course_list_data['formats']) && (in_array($format->id, $course_list_data['formats'])))checked @endif  onchange="this.form.submit()">
											<label class="custom-control-label font-size-base" for="format{{$format->id}}">{{ucfirst($format->format)}} </label>
										</li>
									@empty										
										<label class="custom-control-label font-size-base" >No data found!</label>
									@endforelse	
										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Format end -->
					
					
					<!-- Format Type start -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="attendanceType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#attendanceFilter" aria-expanded="false" aria-controls="attendanceFilter">
								   
										<div>
										Attendance
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="attendanceFilter" class="collapse show1" aria-labelledby="attendanceFilter" data-parent="#accordionCurriculum" style="background-color:#F5F5F5">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getAttendance() as $attendance)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="attendanceFilter{{$attendance->id}}" name="course_list_data[attendances][]" value="{{$attendance->id}}" @if(!empty($course_list_data['attendances']) && (in_array($attendance->id, $course_list_data['attendances'])))checked @endif  onchange="this.form.submit()">
											<label class="custom-control-label font-size-base" for="attendanceFilter{{$attendance->id}}">{{ucfirst($attendance->attendance)}} </label>
										</li>
									@empty	
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										<li class="custom-control custom-checkbox">
									@endforelse	
										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Format end -->
					<!-- Degree Type start -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="degreeType">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#degreeTypeFilter" aria-expanded="false" aria-controls="degreeTypeFilter">
								   
										<div>
										Degree Type
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="degreeTypeFilter" class="collapse show1" aria-labelledby="degreeType" data-parent="#accordionCurriculum" style="background-color:#F5F5F5">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									<ul class="list-unstyled list-group list-checkbox">
									@forelse(DataHelper::getPrograms() as $program)
										<li class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="degreeType{{$program->id}}" name="course_list_data[programs][]" value="{{$program->id}}" @if(!empty($course_list_data['programs']) && (in_array($program->id, $course_list_data['programs']))) checked @endif  onchange="this.form.submit()">
											<label class="custom-control-label font-size-base" for="degreeType{{$program->id}}">{{ucfirst($program->program)}} </label>
										</li>
									@empty										
										<li class="custom-control custom-checkbox">
											<label class="custom-control-label font-size-base" >No data found!</label>
										<li class="custom-control custom-checkbox">
									@endforelse	
										
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					
						<!-- GRE Score -->
					<div class="border1 rounded shadow1 mb-1 overflow-hidden">
						<div class="d-flex align-items-center" id="deadlineMY">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-3 min-height-60 text-dark fw-small collapse-accordion-toggle line-height-one ribbon-bg-lg-color" type="button" data-bs-toggle="collapse" data-bs-target="#deadlineMYFilter" aria-expanded="true" aria-controls="deadlineMYFilter">
								   
										<div>
										Semisters
										</div>
										<div>
											<span class="me-4 text-dark1 d-flex">
												<!-- Icon -->
												<svg width="15" height="2" viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="15" height="2" fill="currentColor"/>
												</svg>

												<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0 7H15V9H0V7Z" fill="currentColor"/>
													<path d="M6 16L6 8.74228e-08L8 0L8 16H6Z" fill="currentColor"/>
												</svg>

											</span>
										</div>								   
								</button>
							</h5>
						</div>

						<div id="deadlineMYFilter" class="collapse show" aria-labelledby="deadlineMY" data-parent="#accordionCurriculum1">
								<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
					
									<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
										<ul class="list-unstyled list-group list-checkbox">
										@forelse(AppHelper::options('Semisters') as $key=>$value)
											<li class="custom-control custom-checkbox">
												<input type="radio" class="custom-control-input" id="semisters{{$key}}" name="course_list_data[semisters][]" value="{{$value}}" @if((!empty($course_list_data['semisters'])) && in_array($value, $course_list_data['semisters'])) checked @endif  onchange="this.form.submit()">
												<label class="custom-control-label font-size-base" style="color: #242020 !important;" for="semisters{{$key}}">{{ucfirst($value)}} </label>
											</li>
										@empty										
											<li class="custom-control custom-checkbox">
												<label class="custom-control-label font-size-base" >No data found!</label>
											<li class="custom-control custom-checkbox">
										@endforelse	
											
										</ul>
									</div> 
					
								</div> 
						</div>
					</div>
					<!-- Degree Type end -->
				
					<style>
					.btnhover:hover{
						background-color:blue;
					}
					</style>

                   <button type="button" class="btn p-2 min-height-40 text-white fw-small  btn-primary btn-block btnhover" style="border-radius:5px">FILTER RESULTS</button>
                   	
				</form> 
				</div>
            </div>

            <div class="col-xl-9">
                @yield('course-content')				
            </div>			
        </div>
    </div>
	@include('layouts.course-model')
	
    </section>
	<footer class="pt-4 pt-md-6 bg-white">
        @include('layouts.footer')
    </footer>
    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{ asset('build/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('build/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/countup.js/dist/countUp.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/flickity/dist/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/flickity-fade/flickity-fade.js') }}"></script>
    <script src="{{ asset('build/assets/libs/highlightjs/highlight.pack.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/isotope-layout/dist/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/jarallax/dist/jarallax.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/jarallax/dist/jarallax-video.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/jarallax/dist/jarallax-element.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/parallax-js/dist/parallax.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/smooth-scroll/dist/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/typed.js/lib/typed.min.js') }}"></script>

    <!-- Map -->
    <script src="{{ asset('build/../../../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('build/assets/js/theme.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
	
	$('#configreset').click(function(){
		$('#configform')[0].reset();
	});
	
    jQuery(document).ready(function ()
    {
			
               var countryID = jQuery('#country_id').val();
               var stateID = jQuery('#state_id').val();
			 // alert(countryID);
								 
               if(countryID)
               {
                  jQuery.ajax({
					 url : "{{ url('get-states') }}" + "/" +countryID,									 
					 type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
					    jQuery('select[id="state_id"]').empty();
						    $('select[id="state_id"]').append('<option value="">Select state</option>');
                        jQuery.each(data, function(key,value){
							if(stateID==key)
								$('select[id="state_id"]').append('<option value="'+ key +'" selected>'+ value +'</option>');
							else
								$('select[id="state_id"]').append('<option value="'+ key +'">'+ value +'</option>');
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
                  $('select[id="state"]').empty();
               }
           
			
					
	//universities		
			
		 	//jQuery('select[id="state_id"]').on('change',function(){
               var c_stateID = jQuery("#state_id").val();
               var universityID = jQuery("#university_id").val();
            // alert(stateID);
               if(c_stateID)
               {
                  jQuery.ajax({
					url : "{{ url('get-universities') }}" + "/" + c_stateID,                    
					type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
						  //alert('success');
                        console.log(data);
                        jQuery('select[id="university_id"]').empty();
						$('select[id="university_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
							if(universityID==key)
								$('select[id="university_id"]').append('<option value="'+ key +'" selected>'+ value  +'</option>');
                           else
							   $('select[id="university_id"]').append('<option value="'+ key +'">'+ value  +'</option>');
						   
                        });
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[id="university"]').empty();
               }
           // });		
			
		//universities		
			
		 	//jQuery('select[id="university_id"]').on('change',function(){
               var cs_universityID = jQuery("#university_id").val();
               var campusID = jQuery("#campus_id").val();
           // alert(cs_universityID);
               if(cs_universityID)
               {
                  jQuery.ajax({
					url : "{{ url('get-campuses') }}" + "/" + cs_universityID,                    
					type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
						  //alert('success');
                        console.log(data);
                        jQuery('select[id="campus_id"]').empty();
						$('select[id="campus_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
							if(campusID==key)
								$('select[id="campus_id"]').append('<option value="'+ key +'" selected>'+ value  +'</option>');
							else
							   $('select[id="campus_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[id="campus"]').empty();
               }
            //});
    });
</script>
</body>

<!-- Mirrored from transvelo.github.io/skola-html/5.1/docs/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 12:32:28 GMT -->
</html>
