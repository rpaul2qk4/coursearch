@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('courses.index',$course->specialization->id)}}" class="no-decoration">Courses</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Data
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
					   <label>Course:</label>
					   <p>{{$course->course}}</p>
					</div>
					<div>
					   <label>Course code:</label>
					   <p>{{$course->code}}</p>
					</div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
