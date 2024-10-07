
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
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
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>		
		<!-- font-awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

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
			}
				
			.headerText {
			  font-size: 24px;
			}	
			li {
			  font-size: 12px;
			}
			/* Extra small devices (phones, 600px and down) */
			@media only screen and (max-width: 600px) {
			  li {font-size: 8px;}
			  .headerText {font-size: 14px;}
			}

			/* Small devices (portrait tablets and large phones, 600px and up) */
			@media only screen and (min-width: 600px) {
			   li {font-size: 10px;}
			  .headerText {font-size: 20px;}
			}

			/* Medium devices (landscape tablets, 768px and up) */
			@media only screen and (min-width: 768px) {
			   li {font-size: 12px;}
			   .headerText {font-size: 22px;}
			} 

			/* Large devices (laptops/desktops, 992px and up) */
			@media only screen and (min-width: 992px) {
			   li {font-size: 12px;}
			   .headerText {font-size: 22px;}
			} 

			/* Extra large devices (large laptops and desktops, 1200px and up) */
			@media only screen and (min-width: 1200px) {
			  li {font-size: 14px;}
			  .headerText {font-size: 24px;}
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
						font-size: 20px;
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



			#mySidenavButtonRt a {
			  position: absolute;
			  left: -80px;
			  transition: 0.3s;
			  padding: 15px;
			  width: 100px;
			  text-decoration: none;
			  font-size: 20px;
			  color: white;
			  border-radius: 0 5px 5px 0;
			}

			#mySidenavButtonRt a:hover {
			  left: 0;
			}

			#scholorshipsButtonRt {
			  top: 220px;
			 background-image: linear-gradient(to left top, #56d643, #00d791, #00d2ce, #00c8f3, #00bafb, #2fbbf1, #48bce7, #5bbcdd, #72c6c8, #98cbb7, #bccfb3, #d6d2bd);
			}

			#loansButtonRt {
			  top: 280px;
			  background-image: linear-gradient(to right top, #7faff6, #a0a1e4, #b495ce, #be8bb6, #bf849e);
			}

			#visaProcessingButtonRt {
			  top: 340px;
			  background-image: linear-gradient(to left, #a8c6e0, #9ec0e2, #95bbe4, #8db4e6, #87aee8, #75b3e7, #66b8e3, #5bbcdd, #72c6c8, #98cbb7, #bccfb3, #d6d2bd);
			}	
			.logo-h{
			    max-height: 103px;
			}
			.btn-top{
                border:1px solid #ccc;
                font-size:14px;
            }
		</style>

		
	</head>
	<body>
		<!--<section class="cd-intro">
			<h1>Comparison Table</h1>
		</section>  .cd-intro -->
	<div id="mySidenavButtonRt" style="z-index:1;">
		<a href="{{route('requirements.scholorship-details')}}" id="scholorshipsButtonRt">Grant</a>
		<a href="{{route('requirements.loan-details')}}" id="loansButtonRt">Loans</a>
		<a href="{{route('requirements.visa-processing-details')}}" id="visaProcessingButtonRt">Visa</a>
	</div>
		
			<header class=" shadow" style="padding:2% !important;margin-bottom:-10px !important">
				 <!-- Brand -->
				<div style="margin-left:2% !important; margin-right:2% !important; display:flex; justify-content:space-between;align-items:center">
					<div>
						<a  href="{{url('/')}}">
							<img src="{{asset('build/assets/img/logo-coursearch-1.jpg')}}" class="navbar-brand-img imsize logo-h" alt="coursearch logo">
						</a>
					</div>				
					
					<div class="blink1">
						<span class="multicolor-text1 headerText">Specialization with courses report</span>
					</div>
					
					<div style="display:flex; justify-content:space-between;align-items:center">
					    <div style="">
							<span class="btn btn-top1" onclick="location.href='{{url('/')}}'"><img style="height:20px;width:20px" src="{{asset('build/assets/img/icons/home-1.png')}}" /> </span>
						</div>
					    
						<div style="">
							<button id="sendScreenshot" type="button" class="btn btn-top1 border-success1" target="_blank" > <img style="height:20px;width:20px" src="{{asset('build/assets/img/icons/whatsapp-ic.png')}}" /></button>
						</div>
						<div style="">
							<span class="btn btn-top1 border-danger1" onclick=""> <img style="height:20px;width:20px" src="{{asset('build/assets/img/icons/mail-inbox-app.png')}}" /></span>
						</div>				
						
						<div style="">
							<span class="btn btn-top1 border-info1" onclick="window.print()"> <img style="height:20px;width:20px" src="{{asset('build/assets/img/icons/printer.png')}}" /> </span>
						</div>
					</div>
					
				</div>
			</header>
			
			<div style="width:100%;  background-size: cover;min-height:585px !important;">
				
				<div style="padding:20px 10px;margin-top:3%;"> 
					
				@foreach($specializations as $id=>$specialization)
				    <h3 class="w-100 ps-5 text-danger">OPTION {{$id+1}}</h3>
				@include('comparision-report-table')
				
				@endforeach
				
				</div> <!-- .features -->
								
			</div> <!-- .cd-products-table -->
		
		
		    
		
			<div style="">
				 <!-- Brand -->
				<div style="display:flex; justify-content:space-between;align-items:center">
					
					<div class="blink" style="width:100%;font-size:24px;padding:10px">
						<marquee><span class="multicolor-text">Please compare available specializations and courses with all details</span></marquee>
					</div>
					
				</div>
			</div>
		
		
			
		<script src="{{ asset('build/assets/compare-assets/js/jquery-2.1.4.js') }}"></script>
		<script src="{{ asset('build/assets/compare-assets/js/main.js') }}"></script> <!-- Resource jQuery -->
		

<script>
    document.getElementById("sendScreenshot").addEventListener("click", function() {
        // Capture the screenshot of the current page
		
        html2canvas(document.body, {			
            onrendered: function(canvas) {
				
                // Convert canvas to base64 image
                var screenshotDataUrl = canvas.toDataURL("image/png");

                // Prepare form data to send to the Laravel backend
                var formData = new FormData();
				
                formData.append('image', screenshotDataUrl);
				
				var currentUrl='<?php echo route("courses.report-screen-shot"); ?>';
				
			    // Send the screenshot to Laravel backend using fetch API
                
				fetch(currentUrl, {
                    method: 'POST',
                    headers: {
						 Accept: 'application/json',
						'Content-Type': 'multipart/form-data',
					    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
					
                    if (data.status === 'success') {
                        // Send the screenshot URL to WhatsApp using WhatsApp Web API
                        var whatsappUrl = "https://wa.me/918919820778/?text=" + encodeURIComponent(data.url);
                        window.open(whatsappUrl, "_blank");
                    } else {
                        alert("Error saving screenshot!");
                    }
                })
                .catch(error => console.error("Error:", error));
            }
        });
    });
</script>



		
	</body>
</html>