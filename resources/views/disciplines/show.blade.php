@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('disciplines.index')}}" class="no-decoration">Disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Details
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Discipline Details') }}</div>

                <div class="card-body">
					<div>
					   <label>Discipline&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$discipline->discipline}}</span>
					</div>
			    </div> 
				<div class="card-body">
					<div>
					   <label>Code&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$discipline->code}}</span>
					</div>
			    </div>
				<div class="card-body">
					<div>
					   <label>Icon&nbsp;:&nbsp;&nbsp;</label>
					   <span><i class="{{$discipline->icon}} fa-3x"></i></span>
					</div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
