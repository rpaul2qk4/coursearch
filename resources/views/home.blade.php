@extends('layouts.auth_app')

@section('content')

<div class="container">

	@include('common.flash')
	
    <div class="col-lg-12 d-flex justify-content-center">
	
		@if (session('status'))
			
			<div class="alert alert-success" role="alert">
			
				{{ session('status') }}
				
			</div>
			
		@endif
			
		<div class="row">  
			
			@can('isAdmin') 
			
				<div class="col-sm-3">
					<div class="card text-white bg-primary mb-3">
					  <div class="card-header">Total Registered Users</div>
					  <div class="card-body">
						<p class="card-text">
							@include('graphs.users-graph')
						</p>
					  </div>
					</div>
				</div>
				
				<div class="col-sm-3">	
					<div class="card text-white bg-secondary mb-3">
					  <div class="card-header">Total Disciplines Specializations</div>
					  <div class="card-body">
						<p class="card-text">
							@include('graphs.discipline-specializations-graph')
						</p>
					  </div>
					</div>
				</div>
				
				<div class="col-sm-3">	
					<div class="card text-white bg-success mb-3">
						<div class="card-header">Total Countries Universities</div>
						<div class="card-body">
							<p class="card-text">
								@include('graphs.country-universities-graph')
							</p>
						</div>
					</div>
				</div>
				
				<div class="col-sm-3">	
					<div class="card text-white bg-danger mb-3">
					  <div class="card-header">Adds</div>
					  <div class="card-body">
						<h5 class="card-title">Danger card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
			
			@endcan

			@can('isStudent')
			
				<div class="col-sm-3">	
					<div class="card text-dark bg-info mb-3">
					  <div class="card-header">Header</div>
					  <div class="card-body">
						<h5 class="card-title">Info card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				
				<div class="col-sm-3">	
					<div class="card text-dark bg-light mb-3">
					  <div class="card-header">Header</div>
					  <div class="card-body">
						<h5 class="card-title">Light card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				
			@endcan

			@can('isAgent')
			
				<div class="col-sm-3">	
					<div class="card text-dark bg-warning mb-3">
					  <div class="card-header">Header</div>
					  <div class="card-body">
						<h5 class="card-title">Warning card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				
				<div class="col-sm-3">	
					<div class="card text-white bg-dark mb-3">
					  <div class="card-header">Header</div>
					  <div class="card-body">
						<h5 class="card-title">Dark card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div> 
				</div> 
				
			@endcan
			
		</div>
		
	</div>
	
</div>
@endsection
