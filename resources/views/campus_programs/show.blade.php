@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('campus_programs.index',$campus_program->campus_id)}}" class="no-decoration">{{$campus_program->campus->campus}} - Programs</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit {{$campus_program->campus->campus}} - <span style="color:red" href="{{route('campus_programs.index',$campus_program->campus_id)}}">{{$campus_program->program->program}}</span> discipline
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Campus Program Details') }}</div>

                <div class="card-body">
					<div>
					   <label>Campus Program:</label>
					   <p>{{$campus_program->program->program}}</p>
					</div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
