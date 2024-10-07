@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('programs.index')}}" class="no-decoration">Programs</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	<span class="text-danger">{{$program->program}}</span> Details
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
					   <label>Program:</label>
					   <p>{{$program->program}}</p>
					</div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
