<!doctype html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
			  top: 280px;
			 background-image: linear-gradient(to left top, #56d643, #00d791, #00d2ce, #00c8f3, #00bafb, #2fbbf1, #48bce7, #5bbcdd, #72c6c8, #98cbb7, #bccfb3, #d6d2bd);
			}

			#loansButtonRt {
			  top: 340px;
			  background-image: linear-gradient(to right top, #7faff6, #a0a1e4, #b495ce, #be8bb6, #bf849e);
			}

			#visaProcessingButtonRt {
			  top: 400px;
			  background-image: linear-gradient(to left, #a8c6e0, #9ec0e2, #95bbe4, #8db4e6, #87aee8, #75b3e7, #66b8e3, #5bbcdd, #72c6c8, #98cbb7, #bccfb3, #d6d2bd);
			}	
			.table{
				margin-bottom:0rem !important;
			}
		</style>

		
	</head>
	<body>
		<!--<section class="cd-intro">
			<h1>Comparison Table</h1>
		</section>  .cd-intro -->
	<div id="mySidenavButtonRt">
		<a href="{{route('requirements.visa-processing-details')}}" id="scholorshipsButtonRt">Grant</a>
		</div>
		
			<header style="padding:2% !important" style="margin-bottom:-10px !important">
				 <!-- Brand -->
				<div style="display:flex; justify-content:space-between;align-items:center">
					<div style="padding:2px;margin-left:35px">
						<a  href="{{url('/')}}">
							<img src="{{asset('build/assets/img/logo-coursearch-1.jpg')}}" style="height:103px;width:100%" alt="...">
						</a>
					</div>
					
					
					<div class="blink1">
						<span class="multicolor-text1 headerText"></span>
					</div>
					
					<div style="display:flex; justify-content:space-between;align-items:center">
						<div style="margin-left:10px;margin-right:10px">
							<button type="button" onclick="location.href='{{url('/')}}'">Home</button>
						</div>
						
						<div style="margin-left:10px;margin-right:10px">
							<button type="submit" class="btn btn-primary btn-sm" onclick="window.print()">Print</button>
						</div>
					</div>
					
				</div>
			</header>
			
			<div style="background-size: cover;background-image: linear-gradient(to right top, #dfe4ea, #d5e4e9, #cee4e2, #cee2d6, #d7dec8);background-repeat: no-repeat;;min-height:585px !important;">
				
				@yield('info-content')
								
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
		
		<script type="text/javascript">
			jQuery(function() {
				jQuery('#country_id').change(function() {
					this.form.submit();
				});
			});
		</script>

		<script type="text/javascript">
			jQuery(function() {
				jQuery('#discipline_id').change(function() {
					this.form.submit();
				});
			});
		</script>
		
	</body>
</html>