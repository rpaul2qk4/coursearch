@extends('layouts.info')
@section('info-content')	
<div style="padding:25px"> 				 	  
						  
	<div class="container-fluid"> <h4 class="p-3  text-center">VISA Processing Agent Details</h4>
		<div class="row g-2">
			<div class="col-4">
				<div class="card p-3">
					<div class="row">
						<form method="POST" action="{{ route('requirements.visa-processing-details') }}" >
							@csrf
							<div class="col-md-12">
								<select id="country_id" class="col-md-12 form-select1" name="country_id" required>
									@foreach(DataHelper::getCountriesOptions() as $key=>$value)
										@if($countryId==$key)
											<option value="{{$key}}" selected>{{$value}}</option>
										@else
											<option value="{{$key}}">{{$value}}</option>
										@endif
									@endforeach
								</select>
								@error('country_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</form>	
					</div>
				</div>
			</div>
			
			<div class="col-8">
				<div class="card p-3">
					<table class="table table-bordered table-stripped text-center p-4">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Name</th>
								<th>Country</th>
							</tr>	
						</thead>
						<tbody>
							@foreach($agents as $id=>$agent)
								<tr>
									<td>{{$id+1}}</td>
									<td>{{$agent->name}}</td>
									<td>{{!empty($agent->country)?$agent->country->country:'***'}}</td>
								</tr>
							@endforeach
						</tbody>							  
					</table>							  
				</div>
			</div>							
		</div>
	</div>
  <!-- Nav tabs 
  <ul class="nav nav-tabs" role="tablist">
	<li class="nav-item" role="presentation">
	  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
	</li>
	<li class="nav-item" role="presentation">
	  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
	</li>
	<li class="nav-item" role="presentation">
	  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
	</li>
  </ul>-->

  <!-- Tab panes 
  <div class="tab-content">
	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	  <h3>Home Content</h3>
	  <p>This is the content of the Home tab.</p>
	</div>
	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	  <h3>Profile Content</h3>
	  <p>This is the content of the Profile tab.</p>
	</div>
	<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
	  <h3>Contact Content</h3>
	  <p>This is the content of the Contact tab.</p>
	</div>
  </div>-->
</div>
@endsection