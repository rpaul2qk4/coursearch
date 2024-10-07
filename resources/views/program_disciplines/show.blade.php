@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('program_disciplines.index',$program_discipline->campus_program_id)}}" class="no-decoration">{{$program_discipline->campus->campus}} - <span style="color:red" href="{{route('campus_programs.index',$program_discipline->campus->id)}}">{{$program_discipline->program->program}}</span> disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit discipline
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
					   <span>{{$program_discipline->discipline->discipline}}</span>
					</div>
			    </div> 
				<div class="card-body">
					<div>
					   <label>Code&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$program_discipline->discipline->code}}</span>
					</div>
			    </div>
				<div class="card-body">
					<div>
					   <label>Icon&nbsp;:&nbsp;&nbsp;</label>
					   <span><i class="{{$program_discipline->discipline->icon}} fa-3x"></i></span>
					</div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
