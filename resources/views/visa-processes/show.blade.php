@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('visa-processes.index')}}" class="no-decoration">Visa Process Info Documents</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	<span class="text-danger">Visa Process Info Document </span> Details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header">{{ __('Document Details') }}</div>
				<div class="card-body">	
					<div class="row g-3">				

						<div style="text-align:center">
						  <h2>{{$visa_process->country->country}} Docs Gallery</h2>
						  <p>Click on the docs below:</p>
						</div>

						
						<div class="row mx-auto g-3" >
							<div class="col-sm-4" style="height:450px;overflow-y:scroll">
								@foreach($visa_process->upload_docs as $upload_doc)
																		
									<div class="col">
										@if($visa_process->doc_type=='pdf')
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
