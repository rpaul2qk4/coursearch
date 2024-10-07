@extends('layouts.app')
@section('content')
    <section class="py-3 py-md-10 bg-white">
<div class="container-fluid">

        <div class="container text-center py-xl-2">
            <h1 class="display-4 fw-semi-bold mb-0">Discipline List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-scroll justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="text-gray-800" href="#">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item text-gray-800 active" aria-current="page">
                        Disciplines List
                    </li>
                </ol>
            </nav>
        </div>
    

    <!-- CONTROL BAR
    ================================================== -->
    <div class="container mb-3 mb-xl-8 z-index-2">
        <div class="d-lg-flex align-items-center mb-6 mb-xl-0">
            <p class="mb-lg-0">We found <span class="text-dark">834 courses</span> available for you</p>
            <div class="ms-lg-auto d-lg-flex flex-wrap">
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
            </div>
        </div>
    </div>
<style>
.min-height-80 {
    min-height: 0px !important; 
}
</style>
        <div class="row">
            <div class="col-xl-3 mb-5 mb-xl-0">
                <!-- SIDEBAR FILTER
                ================================================== -->
                <div class=" vertical-scroll" id="courseSidebar">
                    
					<!-- Discipline start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="curriculumheadingTwo">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#disciplineFilter" aria-expanded="true" aria-controls="disciplineFilter">
								   
										<div>
										Discipline
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
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

						<div id="disciplineFilter" class="collapse show" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum">
							<div class="border-top px-5 py-4 min-height-70 d-md-flex align-items-center">
								
								<div class="d-flex align-items-center me-auto mb-4 mb-md-0">
									 <ul class="list-unstyled list-group list-checkbox">
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="categorycustomcheckone">
											<label class="custom-control-label font-size-base" for="categorycustomcheckone">Art (8)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="categorycustomcheck2">
											<label class="custom-control-label font-size-base" for="categorycustomcheck2">Exercise (8)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="categorycustomcheck3">
											<label class="custom-control-label font-size-base" for="categorycustomcheck3">Material Design (7)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="categorycustomcheck4">
											<label class="custom-control-label font-size-base" for="categorycustomcheck4">Software Development (6)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="categorycustomcheck5">
											<label class="custom-control-label font-size-base" for="categorycustomcheck5">Music (6)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="categorycustomcheck6">
											<label class="custom-control-label font-size-base" for="categorycustomcheck6">Photography (6)</label>
										</li>
									</ul>
								</div> 
								
							</div>
						</div>
					</div>
					<!-- Discipline end -->
					<!-- Loaction start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="curriculumheadingTwo">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#locationFilter" aria-expanded="true" aria-controls="locationFilter">
								   
										<div>
										 Location
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
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

						<div id="locationFilter" class="collapse show" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum">
							
							

                            <div class="border-top px-5 py-4 min-height-70 d-md-flex1 align-items-center">
								
									<form class="py-3">
										<div class="input-group">
											<input class="form-control form-control-sm border-end-0 shadow-none" type="search" placeholder="Search" aria-label="Search">
											<div class="input-group-append">
												<button class="btn btn-sm btn-outline-white border-start-0 text-dark bg-transparent" type="submit">
													<!-- Icon -->
													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.8477 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.8477 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.8477 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor"/>
														<path d="M19.762 18.6121L15.1007 13.9509C14.7831 13.6332 14.2687 13.6332 13.9511 13.9509C13.6335 14.2682 13.6335 14.7831 13.9511 15.1005L18.6124 19.7617C18.7712 19.9205 18.9791 19.9999 19.1872 19.9999C19.395 19.9999 19.6032 19.9205 19.762 19.7617C20.0796 19.4444 20.0796 18.9295 19.762 18.6121Z" fill="currentColor"/>
													</svg>

												</button>
											</div>
										</div>
									</form>									
							
									<ul class="list-unstyled list-group list-checkbox list-checkbox-limit">
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck1">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck1">Chris Convrse (03)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck2">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck2">Morten Rand (15)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck3">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck3">Rayi Villalobos (125)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck4">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck4">James William (1.584)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck5">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck5">Villalobos (584)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck6">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck6">Rand joe (44)</label>
										</li>
										<li class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instructorscustomcheck7">
											<label class="custom-control-label font-size-base" for="instructorscustomcheck7">Rand joe (44)</label>
										</li>
									</ul>
								
								
							</div>
							
						</div>
					</div>
					<!-- Location end -->
					
					<!-- Tution fee start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="curriculumheadingTwo">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#tutionFeeFilter" aria-expanded="true" aria-controls="tutionFeeFilter">
								   
										<div>
										 Tution Fee
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
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

						<div id="tutionFeeFilter" class="collapse show" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum">

                            <div class="border-top px-5 py-4 min-height-70 d-md-flex1 align-items-center">
								
								<form class="mb-4">
                                
									 <div class="input-group mb-3">
									 <span class="input-group-text">Min</span>
									  <input id="amount" type="text" class="form-control" placeholder="0" value="0">
									  <span class="input-group-text">Max</span>
									  <input id="value1" type="text" class="form-control" placeholder="100" aria-label="Server">
									</div>                                   
                              
								</form>

								<input type="range" class="form-range" min="0" max="5" step="0.5" id="slider-range">
			
							</div>
							
						</div>
					</div>
					<!-- Tution fee end -->
					
					<!-- Rating start -->
					<div class="border rounded shadow1 mb-3 overflow-hidden">
						<div class="d-flex align-items-center" id="curriculumheadingTwo">
							<h5 class="mb-0 w-100">
								<button class="d-flex justify-content-between align-items-center p-5 min-height-80 text-dark fw-medium collapse-accordion-toggle line-height-one" type="button" data-bs-toggle="collapse" data-bs-target="#ratingFilter" aria-expanded="true" aria-controls="ratingFilter">
								   
										<div>
										 Rating
										</div>
										<div>
											<span class="me-4 text-dark d-flex">
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

						<div id="ratingFilter" class="collapse show" aria-labelledby="curriculumheadingTwo" data-parent="#accordionCurriculum">
							
							

                            <div class="border-top px-5 py-4 min-height-70 d-md-flex1 align-items-center">
								
								<ul class="list-unstyled list-group list-checkbox">
                                <li class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ratingcustomcheck1">
                                    <label class="custom-control-label font-size-base" for="ratingcustomcheck1">
                                        <span class="d-flex align-items-end">
                                            <span class="star-rating">
                                                <span class="rating" style="width:90%;"></span>
                                            </span>

                                            <span class="ms-3">
                                                <span>& up</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
                                <li class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ratingcustomcheck2">
                                    <label class="custom-control-label font-size-base" for="ratingcustomcheck2">
                                        <span class="d-flex align-items-end">
                                            <span class="star-rating">
                                                <span class="rating" style="width:70%;"></span>
                                            </span>

                                            <span class="ms-3">
                                                <span>& up</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
                                <li class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ratingcustomcheck3">
                                    <label class="custom-control-label font-size-base" for="ratingcustomcheck3">
                                        <span class="d-flex align-items-end">
                                            <span class="star-rating">
                                                <span class="rating" style="width:50%;"></span>
                                            </span>

                                            <span class="ms-3">
                                                <span>& up</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
                                <li class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ratingcustomcheck4">
                                    <label class="custom-control-label font-size-base" for="ratingcustomcheck4">
                                        <span class="d-flex align-items-end">
                                            <span class="star-rating">
                                                <span class="rating" style="width:35%;"></span>
                                            </span>

                                            <span class="ms-3">
                                                <span>& up</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
                                <li class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ratingcustomcheck5">
                                    <label class="custom-control-label font-size-base" for="ratingcustomcheck5">
                                        <span class="d-flex align-items-end">
                                            <span class="star-rating">
                                                <span class="rating" style="width:10%;"></span>
                                            </span>

                                            <span class="ms-3">
                                                <span>& up</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
                            </ul>								
								
							</div>
							
						</div>
					</div>
					<!-- Rating end -->

                    <a href="#" class="btn btn-primary btn-block mb-10">FILTER RESULTS</a>
                </div>

            </div>

            <div class="col-xl-9">
                <!-- Card -->
                  <!-- Card -->
                <div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0">
                    <!-- Image -->
                     <!-- Footer -->
                    <div class="col-md-12 card-footer px-2 px-md-5 py-4 py-md-0 position-relative">
                        <!-- Heading -->
                        <div class="position-relative">
                           
							
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <h4 class="line-clamp-2 me-md-6 me-lg-10 me-xl-4 mb-3">Forensic Dentistry</h4></a>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
										<a href="#" > <i class="far fa-heart"></i> </a>
                                    </div>
                                </div>
                            </div>							
						
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <small>The Master of Science in Luxury Management &amp;Innovation at&nbsp;Burgundy School of Business is a unique postgraduate programmethat </small>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
                                    <del class="font-size-sm">$959</del>
                                    <ins class="h4 mb-0 mb-lg-n1 ms-1">$415.99</ins>
                                    </div>
                                </div>
                            </div>							
							
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">M.SC</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">Full-Time</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">On Campus</div>
                                    </div>
                                </li>								
                            </ul>
							
							

                            <div class="row align-items-center">
                                <div class="col px-2">

									<ul class="nav mx-n3 mb-3">
										<li class="nav-item px-3">
											<div class="d-flex align-items-center">
												<div class="me-2 d-flex text-secondary icon-uxs">
													<!-- Icon -->
													<span><img src="{{ asset('build/assets/img/post/post-11.png')}}" width="30px" class="img-fluid" /></span>

												</div>

											</div>
										</li>
										<li class="nav-item px-3">
											<div class="align-items-center">
												<small class="font-size-sm">Organization Name</small><br>
												<small class="font-size-sm">Organization Location</small>
											</div>
										</li>
									
									</ul>

                                </div>

                                <div class="col-auto px-2">
                                    <div class=" align-items-center">
										<ul class="nav mx-n3 mb-3 text-right list-checkbox">
											<li class="custom-control custom-checkbox m-3">
												<input type="checkbox" class="custom-control-input" id="categorycustomcheckone1">
												<label class="custom-control-label font-size-base" for="categorycustomcheckone1"><a href="comparison.html">Add to Compare</a></label>
											</li>

										</ul>																				
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			<!-- card -->
			<div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0">
                    <!-- Image -->
                     <!-- Footer -->
                    <div class="col-md-12 card-footer px-2 px-md-5 py-4 py-md-0 position-relative">
                        <!-- Heading -->
                        <div class="position-relative">
                           
							
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <h4 class="line-clamp-2 me-md-6 me-lg-10 me-xl-4 mb-3">Forensic Dentistry</h4></a>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
										<a href="#" > <i class="far fa-heart"></i> </a>
                                    </div>
                                </div>
                            </div>							
						
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <small>The Master of Science in Luxury Management &amp;Innovation at&nbsp;Burgundy School of Business is a unique postgraduate programmethat </small>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
                                    <del class="font-size-sm">$959</del>
                                    <ins class="h4 mb-0 mb-lg-n1 ms-1">$415.99</ins>
                                    </div>
                                </div>
                            </div>							
							
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">M.SC</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">Full-Time</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">On Campus</div>
                                    </div>
                                </li>								
                            </ul>
							
							

                            <div class="row align-items-center">
                                <div class="col px-2">

									<ul class="nav mx-n3 mb-3">
										<li class="nav-item px-3">
											<div class="d-flex align-items-center">
												<div class="me-2 d-flex text-secondary icon-uxs">
													<!-- Icon -->
													<span><img src="{{ asset('build/assets/img/post/post-11.png')}}" width="30px" class="img-fluid" /></span>

												</div>

											</div>
										</li>
										<li class="nav-item px-3">
											<div class="align-items-center">
												<small class="font-size-sm">Organization Name</small><br>
												<small class="font-size-sm">Organization Location</small>
											</div>
										</li>
									
									</ul>

                                </div>

                                <div class="col-auto px-2">
                                    <div class=" align-items-center">
										<ul class="nav mx-n3 mb-3 text-right list-checkbox">
											<li class="custom-control custom-checkbox m-3">
												<input type="checkbox" class="custom-control-input" id="categorycustomcheckone2">
												<label class="custom-control-label font-size-base" for="categorycustomcheckone2"><a href="comparison.html">Add to Compare</a></label>
											</li>

										</ul>																				
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			<!-- card -->
			<div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0">
                    <!-- Image -->
                     <!-- Footer -->
                    <div class="col-md-12 card-footer px-2 px-md-5 py-4 py-md-0 position-relative">
                        <!-- Heading -->
                        <div class="position-relative">
                           
							
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <h4 class="line-clamp-2 me-md-6 me-lg-10 me-xl-4 mb-3">Forensic Dentistry</h4></a>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
										<a href="#" > <i class="far fa-heart"></i> </a>
                                    </div>
                                </div>
                            </div>							
						
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <small>The Master of Science in Luxury Management &amp;Innovation at&nbsp;Burgundy School of Business is a unique postgraduate programmethat </small>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
                                    <del class="font-size-sm">$959</del>
                                    <ins class="h4 mb-0 mb-lg-n1 ms-1">$415.99</ins>
                                    </div>
                                </div>
                            </div>							
							
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">M.SC</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">Full-Time</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">On Campus</div>
                                    </div>
                                </li>								
                            </ul>
							
							

                            <div class="row align-items-center">
                                <div class="col px-2">

									<ul class="nav mx-n3 mb-3">
										<li class="nav-item px-3">
											<div class="d-flex align-items-center">
												<div class="me-2 d-flex text-secondary icon-uxs">
													<!-- Icon -->
													<span><img src="{{ asset('build/assets/img/post/post-11.png')}}" width="30px" class="img-fluid" /></span>

												</div>

											</div>
										</li>
										<li class="nav-item px-3">
											<div class="align-items-center">
												<small class="font-size-sm">Organization Name</small><br>
												<small class="font-size-sm">Organization Location</small>
											</div>
										</li>
									
									</ul>

                                </div>

                                <div class="col-auto px-2">
                                    <div class=" align-items-center">
										<ul class="nav mx-n3 mb-3 text-right list-checkbox">
											<li class="custom-control custom-checkbox m-3">
												<input type="checkbox" class="custom-control-input" id="categorycustomcheckone5">
												<label class="custom-control-label font-size-base" for="categorycustomcheckone5"><a href="comparison.html">Add to Compare</a></label>
											</li>

										</ul>																				
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			<!-- card -->
			<div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0">
                    <!-- Image -->
                     <!-- Footer -->
                    <div class="col-md-12 card-footer px-2 px-md-5 py-4 py-md-0 position-relative">
                        <!-- Heading -->
                        <div class="position-relative">
                           
							
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <h4 class="line-clamp-2 me-md-6 me-lg-10 me-xl-4 mb-3">Forensic Dentistry</h4></a>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
										<a href="#" > <i class="far fa-heart"></i> </a>
                                    </div>
                                </div>
                            </div>							
						
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <small>The Master of Science in Luxury Management &amp;Innovation at&nbsp;Burgundy School of Business is a unique postgraduate programmethat </small>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
                                    <del class="font-size-sm">$959</del>
                                    <ins class="h4 mb-0 mb-lg-n1 ms-1">$415.99</ins>
                                    </div>
                                </div>
                            </div>							
							
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">M.SC</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">Full-Time</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">On Campus</div>
                                    </div>
                                </li>								
                            </ul>
							
							

                            <div class="row align-items-center">
                                <div class="col px-2">

									<ul class="nav mx-n3 mb-3">
										<li class="nav-item px-3">
											<div class="d-flex align-items-center">
												<div class="me-2 d-flex text-secondary icon-uxs">
													<!-- Icon -->
													<span><img src="{{ asset('build/assets/img/post/post-11.png')}}" width="30px" class="img-fluid" /></span>

												</div>

											</div>
										</li>
										<li class="nav-item px-3">
											<div class="align-items-center">
												<small class="font-size-sm">Organization Name</small><br>
												<small class="font-size-sm">Organization Location</small>
											</div>
										</li>
									
									</ul>

                                </div>

                                <div class="col-auto px-2">
                                    <div class=" align-items-center">
										<ul class="nav mx-n3 mb-3 text-right list-checkbox">
											<li class="custom-control custom-checkbox m-3">
												<input type="checkbox" class="custom-control-input" id="categorycustomcheckone5">
												<label class="custom-control-label font-size-base" for="categorycustomcheckone5"><a href="comparison.html">Add to Compare</a></label>
											</li>

										</ul>																				
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			<!-- card -->
			<div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0">
                    <!-- Image -->
                     <!-- Footer -->
                    <div class="col-md-12 card-footer px-2 px-md-5 py-4 py-md-0 position-relative">
                        <!-- Heading -->
                        <div class="position-relative">
                           
							
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <h4 class="line-clamp-2 me-md-6 me-lg-10 me-xl-4 mb-3">Forensic Dentistry</h4></a>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
										<a href="#" > <i class="far fa-heart"></i> </a>
                                    </div>
                                </div>
                            </div>							
						
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <small>The Master of Science in Luxury Management &amp;Innovation at&nbsp;Burgundy School of Business is a unique postgraduate programmethat </small>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
                                    <del class="font-size-sm">$959</del>
                                    <ins class="h4 mb-0 mb-lg-n1 ms-1">$415.99</ins>
                                    </div>
                                </div>
                            </div>							
							
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">M.SC</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">Full-Time</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">On Campus</div>
                                    </div>
                                </li>								
                            </ul>
							
							

                            <div class="row align-items-center">
                                <div class="col px-2">

									<ul class="nav mx-n3 mb-3">
										<li class="nav-item px-3">
											<div class="d-flex align-items-center">
												<div class="me-2 d-flex text-secondary icon-uxs">
													<!-- Icon -->
													<span><img src="{{ asset('build/assets/img/post/post-11.png')}}" width="30px" class="img-fluid" /></span>

												</div>

											</div>
										</li>
										<li class="nav-item px-3">
											<div class="align-items-center">
												<small class="font-size-sm">Organization Name</small><br>
												<small class="font-size-sm">Organization Location</small>
											</div>
										</li>
									
									</ul>

                                </div>

                                <div class="col-auto px-2">
                                    <div class=" align-items-center">
										<ul class="nav mx-n3 mb-3 text-right list-checkbox">
											<li class="custom-control custom-checkbox m-3">
												<input type="checkbox" class="custom-control-input" id="categorycustomcheckone5">
												<label class="custom-control-label font-size-base" for="categorycustomcheckone5"><a href="comparison.html">Add to Compare</a></label>
											</li>

										</ul>																				
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			<!-- card -->
                <div class="card border shadow p-2 lift sk-fade mb-3 flex-md-row align-items-center row gx-0">
                    <!-- Image -->
                     <!-- Footer -->
                    <div class="col-md-12 card-footer px-2 px-md-5 py-4 py-md-0 position-relative">
                        <!-- Heading -->
                        <div class="position-relative">
                           
							
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <h4 class="line-clamp-2 me-md-6 me-lg-10 me-xl-4 mb-3">Forensic Dentistry</h4></a>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
										<a href="#" > <i class="far fa-heart"></i> </a>
                                    </div>
                                </div>
                            </div>							
						
                            <div class="row mx-n2 align-items-center">
                                <div class="col px-2">
                                    <small>The Master of Science in Luxury Management &amp;Innovation at&nbsp;Burgundy School of Business is a unique postgraduate programmethat </small>
                                </div>

                                <div class="col-auto px-2">
                                    <div class="d-lg-flex align-items-end">
                                    <del class="font-size-sm">$959</del>
                                    <ins class="h4 mb-0 mb-lg-n1 ms-1">$415.99</ins>
                                    </div>
                                </div>
                            </div>							
							
                            <ul class="nav mx-n3 mb-3">
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">M.SC</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">Full-Time</div>
                                    </div>
                                </li>
                                <li class="nav-item px-3">
                                    <div class="d-flex align-items-center">
                                        <div class="font-size-sm">On Campus</div>
                                    </div>
                                </li>								
                            </ul>
							
							

                            <div class="row align-items-center">
                                <div class="col px-2">

									<ul class="nav mx-n3 mb-3">
										<li class="nav-item px-3">
											<div class="d-flex align-items-center">
												<div class="me-2 d-flex text-secondary icon-uxs">
													<!-- Icon -->
													<span><img src="{{ asset('build/assets/img/post/post-11.png')}}" width="30px" class="img-fluid" /></span>

												</div>

											</div>
										</li>
										<li class="nav-item px-3">
											<div class="align-items-center">
												<small class="font-size-sm">Organization Name</small><br>
												<small class="font-size-sm">Organization Location</small>
											</div>
										</li>
									
									</ul>

                                </div>

                                <div class="col-auto px-2">
                                    <div class=" align-items-center">
										<ul class="nav mx-n3 mb-3 text-right list-checkbox">
											<li class="custom-control custom-checkbox m-3">
												<input type="checkbox" class="custom-control-input" id="categorycustomcheckone5">
												<label class="custom-control-label font-size-base" for="categorycustomcheckone5"><a href="comparison.html">Add to Compare</a></label>
											</li>

										</ul>																				
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                
                
                <!-- PAGINATION
                ================================================== -->
                <nav class="mt-8" aria-label="Page navigationa">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
    </section>
@endsection	