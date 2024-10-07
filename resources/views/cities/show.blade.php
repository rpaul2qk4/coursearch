@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('countries.index')}}" class="no-decoration">Countries</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('states.index',$city->state->country->id)}}" class="no-decoration">States</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('cities.index',$city->state->id)}}" class="no-decoration">Cities</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit	<span class="text-danger">{{$city->state->country->country}}</span> - <span class="text-success">{{$city->state->state}}</span> city
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
					   <label>Coty:</label>
					   <p>{{$city->city}}</p>
					</div>
					<div>
					   <label>Code:</label>
					   <p>{{$city->code}}</p>
					</div>
					

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
