@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('universities.index')}}" class="no-decoration">Universities</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('campuses.index',$campus->university->id)}}" class="no-decoration">Campuses</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	<span class="no-decoration text-danger">{{$campus->university->university}}</span> campus details
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
					   <label>University:</label>
					   <p>{{$campus->campus}}</p>
					</div>
					<div>
					   <label>Code:</label>
					   <p>{{$campus->code}}</p>
					</div>
					
					<div>
					   <label>Country:</label>
					   <p>{{$campus->country->country}}</p>
					</div>
					
					<div>
					   <label>State:</label>
					   <p>{{!empty($campus->state)?$campus->state->state:'-empty-'}}</p>
					</div>
					
					<div>
					   <label>City:</label>
					   <p>{{!empty($campus->city)?$campus->city->city:'-empty-'}}</p>
					</div>
					

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
