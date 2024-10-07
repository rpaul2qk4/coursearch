@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('roles.index')}}" class="no-decoration">Roles</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Role Details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
			
                <div class="card-header">{{ __('Details') }}</div>

                <div class="card-body">
					<p>
					   <label>Role&nbsp;:&nbsp;</label>
					   <span>{{$role->role}}</span>
					</p>
			    </div>
				
            </div>
        </div>
    </div>
</div>
@endsection
