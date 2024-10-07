@if ($message = Session::get('success'))
<div class="alert alert-success alert-block"> 
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<strong>{!! $message !!}</strong>
		</div>
		<div>
			<button  class="btn close" aria-label="Close" data-bs-dismiss="alert">
			  <span class="h4 text-danger" aria-hidden="true">&times;</span> 
			</button>       
		</div>
	</div>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<strong>{!! $message !!}</strong>
		</div>
		<div>
			<button  class="btn close" aria-label="Close" data-bs-dismiss="alert">
			  <span class="h4 text-danger" aria-hidden="true">&times;</span> 
			</button>       
		</div>
	</div>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<strong>{!! $message !!}</strong>
		</div>
		<div>
			<button  class="btn close" aria-label="Close" data-bs-dismiss="alert">
			  <span class="h4 text-danger" aria-hidden="true">&times;</span> 
			</button>       
		</div>
	</div>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">	
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<strong>{!! $message !!}</strong>
		</div>
		<div>
			<button  class="btn close" aria-label="Close" data-bs-dismiss="alert">
			  <span class="h4 text-danger" aria-hidden="true">&times;</span> 
			</button>       
		</div>
	</div>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger alert-block">	
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<strong>Please check the form below for errors</strong>
		</div>
		<div>
			<button  class="btn close" aria-label="Close" data-bs-dismiss="alert">
			  <span class="h4 text-danger" aria-hidden="true">&times;</span> 
			</button>       
		</div>
	</div>
	
</div>

@endif