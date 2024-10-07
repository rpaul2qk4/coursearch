@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('bank_loans.index')}}" class="no-decoration">Bank Loan Details</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Show
	</li>
@endsection
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">{{ __('Details') }}</div>

					<div class="card-body">
						<div>
						   <label>Country&nbsp;&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$bank_loan->country->country}}</span>
						</div>
						<!-- <div>
						   <label>State&nbsp;&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{!empty($bank_loan->state)?$bank_loan->state->state:'***'}}</span>
						</div> -->
						<div>
						   <label>Bank&nbsp;&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$bank_loan->bank_name}}</span>
						</div>
						<div>
						   <label>Loan Amount&nbsp;&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$bank_loan->loan_amount}}</span>
						</div>
						<div>
						   <label>Interest Rate&nbsp;&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$bank_loan->interest_rate}}%</span>
						</div>
						<div>
						   <label>Process Time&nbsp;&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$bank_loan->process_time}}</span>
						</div>
						<div>
						   <label>Documents Type&nbsp;&nbsp;:&nbsp;&nbsp;</label>
						   <span>{{$bank_loan->docs_type}}</span>
						</div>
						<div>
						   <label>Documents&nbsp;&nbsp;:&nbsp;&nbsp;</label>
						   <span>
						   <ol>
						   @foreach($bank_loan->req_docs as $req_doc)
							<li>{{$req_doc->document}}</li>
						   @endforeach
						   </ol>
						   </span>
						</div>
						<div class="row g-3">				

						<div style="text-align:center">
						  <h2>{{$bank_loan->country->country}} Docs Gallery</h2>
						  <p>Click on the docs below:</p>
						</div>

						
						<div class="row mx-auto g-3" >
							<div class="col-sm-4" style="height:450px;overflow-y:scroll">
								@foreach($bank_loan->upload_docs as $upload_doc)
																		
									<div class="col">
										@if($bank_loan->doc_type=='pdf')
											<div class="card p-2">
												<iframe src="{{ asset('uploads/'.$upload_doc->document) }}" style="width:100%;height:150px" onclick="myFrameFunction(this);"></iframe>
											</div>
										@else
											<div class="card p-2">
												<img src="{{ asset('uploads/'.$upload_doc->document) }}"  style="width:100%;height:150px" onclick="myImageFunction(this);">
											</div>
										@endif							  
									</div>
									
								@endforeach 
							</div>
							<div class="col-sm-8" style="height:450px;">							
								  <img id="expandedImg" style="width:100%;height:100%">	
							</div>
						</div>
						
						<script>
						function myImageFunction(imgs) {
						  var expandImg = document.getElementById("expandedImg");
						  var imgText = document.getElementById("imgtext");
						  expandImg.src = imgs.src;
						 
						}

						function myFrameFunction(frms) {
						  var expandImg = document.getElementById("expandedImg");
						  var imgText = document.getElementById("imgtext");
						  expandImg.src = frms.src;
						}
						</script>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
