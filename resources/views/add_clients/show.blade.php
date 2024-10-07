@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('add_clients.index')}}" class="no-decoration">Client Adds</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		<span class="text-danger">{{$add_client->add_client}}</span> details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Client Details') }}</div>

				<div class="card-body">
					<p>
					Client Name &nbsp;&nbsp;:&nbsp;&nbsp; <span class="text-danger">{{$add_client->add_client}}</span>
					</p>
					<p>
					Maximum Number of Adds &nbsp;&nbsp;:&nbsp;&nbsp; <span class="text-danger">{{$add_client->max_adds}}</span>
					</p>
					<p>
					Description &nbsp;&nbsp;:&nbsp;&nbsp; <span class="text-danger">{{$add_client->description}}</span>
					</p>
				
						<div class="row">
						<h4 class="text-center">Advertisement photos</h4>
						@forelse($add_client->advertisements as $advertisement)
						<div class="col-sm-3">
							<div class="card">
							  <img src="{{asset($advertisement->advertisement)}}" class="card-img-top" alt="..." style="width:100%;height:150px">
							
							  <div class="card-body d-flex justify-content-between">
								<a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#advertisementModal{{$advertisement->id}}"><i class="fa fa-edit"></i></a>
								<a href="{{route('advertisements.delete',$advertisement->id)}}" class="card-link"><i class="fa fa-trash text-danger"></i></a>
							  </div>
							</div>
						</div>
						
@if(!empty($advertisement))
<!-- Modal -->
<div class="modal fade" id="advertisementModal{{$advertisement->id}}" tabindex="-1" aria-labelledby="advertisementModalLabel{{$advertisement->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="advertisementModalLabel{{$advertisement->id}}">Advertisement image update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
		<form method="POST" action="{{ route('advertisements.update',$advertisement->id) }}" file="true" enctype="multipart/form-data">
		   @csrf
		   
			<div class="modal-body">
		  
				<div class="row mb-3">
					<label for="advertisements" class="col-md-4 col-form-label text-md-end">{{ __('Advertisement') }}</label>

					<div class="col-md-6">
						<input id="image_upload" type="file" class="form-control" name="advertisement" />

						@error('advertisements')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
	  
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">update</button>
			</div>
			
		</form> 	  
    </div>
  </div>
</div>
@endif

						@empty
						<div class="">
						No data found!
						</div>
						@endforelse
						
						</div>
					</div> 
		</div>
		</div>
		
    </div>
</div>




@endsection
