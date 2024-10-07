@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('durations.index')}}" class="no-decoration">Durations</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		<span class="text-danger">Duration</span> details
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
					   <label>Duration:</label>
					   <p>{{$duration->duration}}</p>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
