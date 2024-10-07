@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('universities.index')}}" class="no-decoration">Universities</a>
	</li>	
	<li class="breadcrumb-item active" aria-current="page">
	<span class="no-decoration text-danger">{{$university->university}}</span> Details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('University Details') }}</div>

                <div class="card-body">
					<div>
					   <label>University:</label>
					   <p>{{$university->university}}</p>
					</div>
					<div>
					   <label>Code:</label>
					   <p>{{$university->code}}</p>
					</div>
					
					<div>
					   <label>World Code:</label>
					   <p>{{$university->world_code}}</p>
					</div>	
					<div>
					   <label>Country Code:</label>
					   <p>{{$university->country_code}}</p>
					</div>
					<div>
					   <label>Country:</label>
					   <p>{{$university->country->country}}</p>
					</div>
					
					<div>
					   <label>State:</label>
					   <p>{{!empty($university->state)?$university->state->state:'-empty-'}}</p>
					</div>
					
					<div>
					   <label>City:</label>
					   <p>{{!empty($university->city)?$university->city->city:'-empty-'}}</p>
					</div>
					

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
