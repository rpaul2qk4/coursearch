@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
	@can('isAdmin')
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	@endcan
	@can('isUser')
		<a href="{{route('user-home')}}" class="no-decoration">Home</a>
	@endcan
	@can('isAgent')
		<a href="{{route('agent-home')}}" class="no-decoration">Home</a>
	@endcan
	</li>

	<li class="breadcrumb-item active" aria-current="page">
		Profile
	</li>
@endsection
@section('content')
<div class="container">
@include('common.flash')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Details') }}
					<a class="btn btn-primary pull-right" href="{{route('users.profile-edit',$user->id)}}"><i class="fa fa-edit"></i></a>
				</div>

                <div class="card-body">
					<div>
					   <label>Name:</label>
					   <p>{{$user->name}}</p>
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
