@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('countries.index')}}" class="no-decoration">Countries</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('states.index',$state->country->id)}}" class="no-decoration">States</a>
	</li>	
	<li class="breadcrumb-item active" aria-current="page">
	Edit <span class="text-danger">{{$state->country->country}}</span> - state
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
					   <label>State:</label>
					   <p>{{$state->state}}</p>
					</div>
					<div>
					   <label>Code:</label>
					   <p>{{$state->code}}</p>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
