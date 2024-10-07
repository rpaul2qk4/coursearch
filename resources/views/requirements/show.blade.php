@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('requirements.index')}}" class="no-decoration">Requirements</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		 <span class="text-danger">Requirement</span> details
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
					   <label>Requirement:</label>
					   <p>{{$requirement->requirement}}</p>
					</div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
