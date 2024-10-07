
<style>

.imsize {
  height: 100%;
  width: 100%;
}
.breadcrumbfontsize{
	font-size:12px;
}
.marqueesize{
	width:80%;
}
.margintop{
	margin-top: 0px;
}
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
	.imsize {
	  height: 60%;
	  width: 60%;
	}
	.breadcrumbfontsize{
		font-size:5px;
	}
	.marqueesize{
		width:20%;
	}
	.margintop{
		margin-top: 30px;
	}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  	.imsize {
	  height: 70%;
	  width: 70%;
	}
	.breadcrumbfontsize{
		font-size:8px;
	}
	.marqueesize{
		width:40%;
	}
	.margintop{
		margin-top: 20px;
	}
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  	.imsize {
	  height: 80%;
	  width: 80%;
	}
	.breadcrumbfontsize{
		font-size:10px;
	}
	.marqueesize{
		width:60%;
	}
	.margintop{
		margin-top: 10px;
	}
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  	.imsize {
	  height: 90%;
	  width: 90%;
	}
	.breadcrumbfontsize{
		font-size:12px;
	}
	.marqueesize{
		width:80%;
	}
	.margintop{
		margin-top: 0px;
	}
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  	.imsize {
	  height: 100%;
	  width: 100%;
	}
	.breadcrumbfontsize{
		font-size:14px;
	}
	.marqueesize{
		width:80%;
	}
	.margintop{
		margin-top: 0px;
	}
}
</style>
<div class="container-fluid d-flex justify-content-between align-items-center">

            <!-- Brand -->
			
			<a class="navbar-brand me-0" href="{{url('/')}}">
                <img src="{{asset('build/assets/img/logo-coursearch-1.jpg')}}" class="navbar-brand-img imsize logo-h" alt="logo coursearch">
            </a>			
			
            <!-- Collapse -->
            <div class="collapse navbar-collapse z-index-lg" id="navbarCollapse">
                <img class="img-fluid m-none top-strip" src="https://coursearch.in/build/assets/img/Fun.jpg">
                <!-- Toggler -->
                <button class="navbar-toggler outline-0 text-primary py-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- Icon -->
                    <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.142135 2.00015L1.55635 0.585938L15.6985 14.7281L14.2843 16.1423L0.142135 2.00015Z" fill="currentColor"></path>
                        <path d="M14.1421 1.0001L15.5563 2.41431L1.41421 16.5564L0 15.1422L14.1421 1.0001Z" fill="currentColor"></path>
                    </svg>

                </button>
                
               

                <!-- Navigation
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown dropdown-full-width">
                      	<div class="mx-xl-4">
							<form action="{{route('search-results.search')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                            @csrf
								<div class="input-group">
									<div class="autocomplete" style="width:300px;">
										<input type="text" id="myInput1" class="form-control rounded-left-lg placeholder-1" value="{{!empty($filters['specialization'])?$filters['specialization']:null}}" placeholder="What to study" name="specialization" style="height:30px; background-color:#fff !important">
									</div>
									<div class="autocomplete" style="width:300px;">
										<input type="text" id="myInput" class="form-control rounded-left-lg1 placeholder-1" value="{{!empty($filters['location'])?$filters['location']:null}}" placeholder="Where to study" name="location" style="height:30px;border-left-radius:none !important; background-color:#fff !important">
									</div>
									<div class="input-group-append">
										<button type="submit" class="btn btn-dark px-5 rounded-right-lg" type="button" id="button-addon2" style="display:flex;align-items:center;height:30px;font-size:10px;margin-bottom:3px"><i class="fa fa-search" ></i></button>
									</div>
								</div>
							   
							</form>
						</div>
                    </li>
                    
                </ul> -->
            </div>
			@include('suggessions.specializations-courses')
			@include('suggessions.countries-states')
            @if(!empty(Auth::user()))
		<style>
			ul li>a:hover{
				color:red !important;				
			}
			
			.blink_me {
			  animation: blinker 1s step-start infinite;			 
			}

			@keyframes blinker {
			  50% {
				 	color:#fff;
			  }
			}
			.btnbgcolor{
				background-color:green;
				text-decoration:none;
			}
			
			.btnbgcolor {
			  animation: shake 0.5s;
			  animation-iteration-count: infinite;
			}

			@keyframes shake {
			  0% { transform: translate(1px, 1px) rotate(0deg); background-color: white; }
			  10% { transform: translate(-1px, -2px) rotate(-1deg); background-color: yellow; }
			  20% { transform: translate(-3px, 0px) rotate(1deg); background-color: red; }
			  30% { transform: translate(3px, 2px) rotate(0deg); background-color: green;}
			  40% { transform: translate(1px, -1px) rotate(1deg);background-color: blue; }
			  50% { transform: translate(-1px, 2px) rotate(-1deg); background-color: green;}
			  60% { transform: translate(-3px, 1px) rotate(0deg); background-color: pink;}
			  70% { transform: translate(3px, 1px) rotate(-1deg); background-color: green;}
			  80% { transform: translate(-1px, -1px) rotate(1deg); background-color: yellow;}
			  90% { transform: translate(1px, 2px) rotate(0deg); background-color: green;}
			  100% { transform: translate(1px, -2px) rotate(-1deg); background-color: orange;}
			}
			
		</style>
		
		@if(!strcmp(Auth::user()->role->role,"User"))	
			<ul class="navbar-nav flex-row ms-auto1 ms-xl-0 me-n1 me-md-n4">
				<li style="cursor:pointer;" onclick="location.href='{{route('user-home')}}'">
					<a class="btn btnbgcolor1 btn-outline-success btn-sm" href="#"><span class="blink_me1">Dashboard</span></a>		
				</li>		
			</ul>
		@elseif(!strcmp(Auth::user()->role->role,"Admin"))
			<ul class="navbar-nav flex-row ms-auto1 ms-xl-0 me-n1 me-md-n4">
				<li style="cursor:pointer;" onclick="location.href='{{route('home')}}'">
					<a class="btn btnbgcolor1 btn-outline-success btn-sm" href="#"><span class="blink_me1">Dashboard</span></a>		
				</li>		
			</ul>
		@else
			<ul class="navbar-nav flex-row ms-auto1 ms-xl-0 me-n1 me-md-n4">
				<li style="cursor:pointer;" onclick="location.href='{{route('agent-home')}}'">
					<a class="btn btnbgcolor1 btn-outline-success btn-sm" href="#"><span class="blink_me1">Dashboard</span></a>		
				</li>		
			</ul>
		@endif
	@else
	<ul class="navbar-nav flex-row ms-auto1 ms-xl-0 me-n1 me-md-n4">
		<li class="nav-item border-0 px-0 d-none d-370-block d-xl-none">
			<a class="nav-link d-flex px-3 px-md-4 search-mobile text-secondary icon-xs" data-bs-toggle="collapse" href="#collapseSearchMobile" role="button" aria-expanded="false" aria-controls="collapseSearchMobile">
			</a>		
		</li>
		<li class="nav-item border-0 px-0">
			<!-- Button trigger account modal -->
			<a href="#" class="nav-link d-flex px-3 px-md-4 text-secondary icon-sm" data-bs-toggle="modal" data-bs-target="#accountModal">
				<!-- Icon -->
				<svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M17.2252 3.0777C15.3376 1.10738 12.7258 -0.0045765 9.99712 0.000444175C4.48284 -0.00650109 0.00695317 4.45809 7.91636e-06 9.97242C-0.00342287 12.6991 1.1084 15.3085 3.07726 17.1948C3.08299 17.2005 3.08512 17.209 3.09082 17.2141C3.14864 17.2698 3.21148 17.3169 3.27005 17.3705C3.43071 17.5133 3.59138 17.6611 3.76061 17.7989C3.85128 17.8703 3.94554 17.9417 4.03838 18.0074C4.19833 18.1266 4.35828 18.2459 4.52535 18.3558C4.6389 18.4273 4.756 18.4986 4.87236 18.5701C5.02658 18.6629 5.18012 18.7564 5.33936 18.8414C5.47434 18.9128 5.61211 18.9742 5.74922 19.0392C5.89917 19.1106 6.04698 19.182 6.20049 19.2462C6.354 19.3105 6.50826 19.3605 6.6639 19.4162C6.81954 19.4719 6.9538 19.5233 7.10304 19.569C7.27157 19.6197 7.44436 19.6589 7.61573 19.7011C7.75853 19.736 7.89706 19.776 8.04416 19.8046C8.24123 19.8439 8.44117 19.8689 8.64112 19.896C8.76467 19.9132 8.88534 19.9374 9.01027 19.9496C9.33732 19.9817 9.66718 19.9996 9.99992 19.9996C10.3327 19.9996 10.6626 19.9817 10.9896 19.9496C11.1146 19.9374 11.2352 19.9132 11.3587 19.896C11.5587 19.8689 11.7586 19.8439 11.9557 19.8046C12.0985 19.776 12.2413 19.7332 12.3841 19.7011C12.5555 19.6589 12.7283 19.6196 12.8968 19.569C13.046 19.5233 13.1903 19.4676 13.3359 19.4162C13.4816 19.3648 13.6473 19.3091 13.7994 19.2462C13.9514 19.1834 14.1007 19.1098 14.2506 19.0392C14.3877 18.9742 14.5256 18.9128 14.6605 18.8414C14.8197 18.7564 14.9732 18.6629 15.1275 18.5701C15.2439 18.4986 15.361 18.4337 15.4745 18.3558C15.6416 18.2459 15.8016 18.1267 15.9615 18.0074C16.0543 17.936 16.1485 17.8717 16.2392 17.7989C16.4085 17.6632 16.5691 17.519 16.7298 17.3705C16.7883 17.3169 16.8512 17.2698 16.909 17.2141C16.9147 17.2091 16.9169 17.2005 16.9226 17.1948C20.9046 13.38 21.04 7.05955 17.2252 3.0777ZM15.6203 16.4472C15.4904 16.5614 15.3561 16.6699 15.2205 16.7749C15.1405 16.8363 15.0605 16.897 14.9784 16.9556C14.8491 17.0491 14.7178 17.1377 14.5842 17.2226C14.4871 17.2848 14.3879 17.3447 14.2879 17.4033C14.1622 17.4747 14.0344 17.5461 13.9051 17.6175C13.7909 17.676 13.6745 17.7311 13.5574 17.7853C13.4403 17.8396 13.3111 17.8974 13.1847 17.9481C13.0583 17.9988 12.924 18.0467 12.7919 18.0909C12.6713 18.1323 12.5506 18.1752 12.4285 18.2116C12.2857 18.2544 12.1364 18.2894 11.9886 18.3251C11.8729 18.3522 11.7587 18.383 11.6416 18.4058C11.4724 18.4387 11.2996 18.4615 11.1261 18.4851C11.0275 18.4979 10.9297 18.5158 10.8304 18.5258C10.5562 18.5522 10.2784 18.5679 9.99783 18.5679C9.71722 18.5679 9.43945 18.5522 9.16524 18.5258C9.066 18.5158 8.96818 18.4979 8.8696 18.4851C8.6961 18.4615 8.5233 18.4387 8.35406 18.4058C8.23696 18.383 8.1227 18.3523 8.00705 18.3251C7.85924 18.2894 7.71213 18.2537 7.5672 18.2116C7.44512 18.1752 7.32441 18.1323 7.20375 18.0909C7.07166 18.0452 6.93953 17.9988 6.811 17.9481C6.68248 17.8974 6.5611 17.8417 6.43826 17.7853C6.31542 17.7289 6.20476 17.6761 6.09054 17.6175C5.9613 17.5504 5.83348 17.4797 5.7078 17.4033C5.60784 17.3448 5.50856 17.2848 5.41145 17.2226C5.27794 17.1377 5.14653 17.0491 5.01729 16.9556C4.93516 16.897 4.8552 16.8363 4.77521 16.7749C4.63952 16.6699 4.5053 16.5607 4.37535 16.4472C4.34393 16.4236 4.31536 16.3936 4.28469 16.3664C4.31661 13.9374 5.87708 11.7926 8.17843 11.0146C9.32912 11.562 10.6651 11.562 11.8158 11.0146C14.1171 11.7926 15.6776 13.9374 15.7096 16.3664C15.6796 16.3936 15.651 16.4208 15.6203 16.4472ZM7.50716 5.7256C8.2803 4.3506 10.0217 3.86272 11.3967 4.63586C12.7717 5.409 13.2596 7.15038 12.4864 8.52538C12.2299 8.98159 11.8529 9.35856 11.3967 9.61511C11.3931 9.61511 11.3888 9.61511 11.3845 9.61938C11.1952 9.72477 10.9951 9.80954 10.7876 9.87217C10.7505 9.88288 10.7162 9.89715 10.6769 9.90644C10.6055 9.92501 10.5305 9.93786 10.457 9.9507C10.3185 9.97493 10.1784 9.98898 10.0378 9.99283H9.95641C9.81588 9.98898 9.67576 9.97493 9.53727 9.9507C9.46585 9.93786 9.39016 9.92501 9.31736 9.90644C9.2795 9.89715 9.24594 9.88288 9.2067 9.87217C8.99922 9.80954 8.79911 9.72481 8.60974 9.61938L8.5969 9.61511C7.2219 8.84197 6.73402 7.10059 7.50716 5.7256ZM16.9763 14.9505C16.518 12.8133 15.1107 11.0014 13.1532 10.0286C14.7534 8.28555 14.6375 5.57535 12.8944 3.97522C11.1514 2.3751 8.44117 2.49099 6.84104 4.23404C5.33677 5.8727 5.33677 8.38998 6.84104 10.0286C4.88361 11.0014 3.47624 12.8133 3.01802 14.9505C0.27991 11.0937 1.18681 5.74744 5.04365 3.00933C8.90048 0.271226 14.2467 1.17813 16.9848 5.03496C18.0141 6.48481 18.5666 8.21907 18.5658 9.99714C18.5658 11.7737 18.01 13.5057 16.9763 14.9505Z" fill="currentColor"/>
				</svg>
			</a>
		</li>
	</ul>
	@endif

            <!-- Toggler -->
            <button class="navbar-toggler ms-4 ms-md-5 shadow-none bg-teal text-white icon-xs p-0 outline-0 h-40p w-40p d-flex d-xl-none place-flex-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <!-- Icon -->
                <svg width="25" height="17" viewBox="0 0 25 17" xmlns="http://www.w3.org/2000/svg">
                    <rect width="25" height="1" fill="currentColor"/>
                    <rect y="8" width="15" height="1" fill="currentColor"/>
                    <rect y="16" width="20" height="1" fill="currentColor"/>
                </svg>

            </button>
        </div>
        
        
        <div class="social-icons-container">
            <div class="main-icon">
                <!-- Main icon (e.g., your single icon image) -->
                <img src="https://coursearch.in/build/assets/img/icons/share.png" alt="Main Icon">
            </div>
            <div class="social-icons">
                <!-- Social media icons (hidden by default) -->
                <a href="https://www.facebook.com/" class="social-icon"><img src="https://coursearch.in/build/assets/img/icons/facebook.png" alt="Facebook"></a><br>
                <a href="https://twitter.com/" class="social-icon"><img src="https://coursearch.in/build/assets/img/icons/twitter.png" alt="Twitter"></a><br>
                <a href="https://www.instagram.com/" class="social-icon"><img src="https://coursearch.in/build/assets/img/icons/instagram.png" alt="Instagram"></a><br>
                <a href="https://www.linkedin.com/" class="social-icon"><img src="https://coursearch.in/build/assets/img/icons/linkedin.png" alt="LinkedIn"></a>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const container = document.querySelector('.social-icons-container');
                const socialIcons = document.querySelector('.social-icons');
            
                container.addEventListener('mouseenter', function() {
                    socialIcons.classList.add('show');
                });
            
                container.addEventListener('mouseleave', function() {
                    socialIcons.classList.remove('show');
                });
            });
        
        </script>