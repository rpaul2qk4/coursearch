<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap 5 cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
	<!-- Custom Styles -->
	<link rel="stylesheet" href="{{ asset('build/assets/css/cust-styles.css') }}">
	<!-- Fontawesome Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Scripts -->
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
	
	
<script>
/*     document.addEventListener('contextmenu', function (e) {
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
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
					<a class="navbar-brand me-0" href="{{url('/')}}">
						<img src="{{asset('build/assets/img/logo1.png')}}" class="navbar-brand-img imsize" alt="...">
					</a>
				<!--@can('isAdmin')
					 <a class="navbar-brand me-0" href="{{url('/home')}}">
						<img src="{{asset('build/assets/img/logo1.png')}}" class="navbar-brand-img imsize" alt="...">
					</a>
				@endcan
				@can('isUser')
					<a class="navbar-brand me-0" href="{{url('/user-home')}}">
						<img src="{{asset('build/assets/img/logo1.png')}}" class="navbar-brand-img imsize" alt="...">
					</a>
				@endcan
				@can('isAgent')
					<a class="navbar-brand me-0" href="{{url('/agent-home')}}">
						<img src="{{asset('build/assets/img/logo1.png')}}" class="navbar-brand-img imsize" alt="...">
					</a>
				@endcan -->
			
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
							
                            <li class="nav-item" style="margin-right:10px">
							
								@can('isAdmin')
									<a href="{{route('home')}}" class="nav-link"> <i class="fa fa-home"></i>Home</a>
								@endcan
								@can('isUser')
									<a href="{{url('/')}}" class="nav-link"> <i class="fa fa-home"></i>Home</a>
								@endcan
								@can('isAgent')
									<a href="{{route('agent-home')}}" class="nav-link"> <i class="fa fa-home"></i>Home</a>
								@endcan					
                              
							</li>
							@can('isAdmin')
                            <li class="nav-item" style="margin-right:10px">
                                <a  class="nav-link" href="{{route('users.index')}}">
                                   <i class="fa fa-users"></i>Users
                                </a>
							</li>
													
							<li class="nav-item" style="margin-right:10px">
                                <a  class="nav-link" href="{{route('roles.index')}}">
                                     <i class="fa fa-tasks"></i>Roles
                                </a>
							</li>
							<li class="nav-item" style="margin-right:10px">
                                <a  class="nav-link" href="{{route('countries.index')}}">
                                     <i class="fa fa-flag"></i>Countries
                                </a>
							</li>
							
							<li class="nav-item" style="margin-right:10px">
                                <a  class="nav-link" href="{{route('disciplines.index')}}">
                                     <i class="fa fa-list"></i>Disciplines
                                </a>
							</li>
							<li class="nav-item" style="margin-right:10px">
                                <a  class="nav-link" href="{{route('universities.index')}}">
                                    <i class="fa fa-university"></i>Universities
                                </a>
							</li>	
							
							<li class="nav-item" style="margin-right:10px">
                                <a  class="nav-link" href="{{route('add_clients.index')}}">
                                     <i class="fa fa-film"></i>Adds
                                </a>
							</li>
							
							<li class="nav-item dropdown" style="margin-right:10px">
                                
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     <i class="fa fa-cogs"></i>Docs 
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
									 <a class="dropdown-item" href="{{route('bank_loans.index')}}">{{ __('Bank Loans') }}</a>
									 <a class="dropdown-item" href="{{route('visa-processes.index')}}">{{ __('Visa Process') }}</a>
									 <a class="dropdown-item" href="{{route('scholorships.index')}}">{{ __('Scholorships') }}</a>
									 <a class="dropdown-item" href="{{route('standard-operating-procedures.index')}}">{{ __('SOP') }}</a>
												
                                </div>
                            </li>
							<li class="nav-item dropdown" style="margin-right:10px">
                                
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     <i class="fa fa-cogs"></i>Settings
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
									 <a class="dropdown-item" href="{{route('requirements.index')}}">{{ __('Requirements') }}</a>
									 <a class="dropdown-item" href="{{route('durations.index')}}">{{ __('Durations') }}</a>
									 <a class="dropdown-item" href="{{route('formats.index')}}">{{ __('Formats') }}</a>
									 <a class="dropdown-item" href="{{route('attendances.index')}}">{{ __('Attendances') }}</a>
									 <a class="dropdown-item" href="{{route('programs.index')}}">{{ __('Programs') }}</a>
										
                                </div>
                            </li>
							
							@endcan
							
							 <li class="nav-item dropdown" style="margin-right:10px">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle-o" style="font-size:18px;margin-right:2px"></i>{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                   
									 <a class="dropdown-item" href="{{route('users.profile',Auth::user()->id)}}">{{ __('Profile') }}&nbsp;(&nbsp;{{auth()->user()->role->role}}&nbsp;)</a>
									 <a class="dropdown-item" href="{{route('users.change-password',auth::user()->id)}}">{{ __('Change Password') }}</a>
									
									<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <hr>{{ __('Logout') }}
                                    </a>
									

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
							
                        @endguest
						
                    </ul>
					
                </div>
            </div>
        </nav>
		<div class="py-4">
			<div class="container">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					@yield('breadcrumb')
				  </ol>
				</nav>
			</div>
			
			<main class="">
				@yield('content')
			</main>
		</div>
    </div>
</body>
</html>
