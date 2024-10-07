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

<script>
 /*    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    }); */
</script>

<script>
/* $(document).ready(function () {
    function disableBack() {window.history.forward()}

    window.onload = disableBack();
    window.onpageshow = function (evt) {if (evt.persisted) disableBack()}
}); */
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
                                <input type="password" class="form-control" name="password" id="modalSigninPassword" placeholder="password">
                            </div>

                            <div class="d-flex align-items-center mb-5 font-size-sm">
                                <div class="form-check">
                                    <input class="form-check-input text-gray-800" type="checkbox" id="autoSizingCheck">
                                    <label class="form-check-label text-gray-800" for="autoSizingCheck">
                                        Remember me
                                    </label>
                                </div>

                                <div class="ms-auto">
                                    <a class="text-gray-800" data-bs-toggle="collapse" href="#collapseForgotPassword-tempskip" role="button" aria-expanded="false" aria-controls="collapseForgotPassword">Forgot Password</a>
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
                <div class="collapse" id="collapseSignup" data-bs-parent="#accountModal" style="overflow-y:scroll">
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
                                 <input type="password" class="form-control" id="modalSignupPassword" placeholder="Enter password" name="password">
                            </div>
							
                            <!-- Password -->
                            <div class="form-group mb-5">
                                <input type="password" class="form-control" id="modalSignupPasswordConfirmation" placeholder="Enter confirm password" name="password_confirmation">
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
    <header class="navbar navbar-expand-xl navbar-light fixed-top bg-white shadow-dark">
        @include('layouts.header')
    </header>


    <!-- CONTENT
    ================================================== -->
    <section>
        <main class="container-fluid1">
            @yield('content')
			
        </main>
    </section>
	
	<footer class="bg-white">
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


</body>

<!-- Mirrored from transvelo.github.io/skola-html/5.1/docs/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 12:32:28 GMT -->
</html>
