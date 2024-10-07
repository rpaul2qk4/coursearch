@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('users.index')}}" class="no-decoration">Users</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		User Details
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
					   <label>Name:</label>
					   <p>{{$user->name}}</p>
					</div>
					<div>
					   <label>Email:</label>
					   <p>{{$user->email}}</p>
					</div>
					<div>
					   <label>Mobile Number :</label>
					   <p>{{$user->mobile}}</p>
					</div>
					
					<div>
					   <label>Photo:</label>
					   <p><img src="{{asset('storage/'.$user->photo)}}" style="width:250px;height:250px"></p>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
