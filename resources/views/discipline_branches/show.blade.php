@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('discipline_branches.index',$discipline_branch->discipline->id)}}" class="no-decoration">{{$discipline_branch->campus->campus}} - <span style="color:red">{{$discipline_branch->program->program}}</span> disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	 <span class="text-danger">{{$discipline_branch->discipline->discipline}} </span> discipline branch details
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
					   <label>Branch:</label>
					   <p>{{$discipline_branch->branch->branch}}</p>
					</div>
					<div>
					   <label>Branch code:</label>
					   <p>{{$discipline_branch->branch->code}}</p>
					</div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
