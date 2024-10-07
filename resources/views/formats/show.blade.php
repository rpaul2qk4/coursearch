@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('formats.index')}}" class="no-decoration">Formats</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		<span class="text-danger">Format</span> details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Format Details') }}</div>

                <div class="card-body">
					<div>
					   <label>Format:</label>
					   <p>{{$format->format}}</p>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
