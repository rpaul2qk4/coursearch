@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="#" class="no-decoration">Branches</a>
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
                <div class="card-header">{{ __('Details') }}
					<a class="btn btn-primary pull-right" href="{{route('branches.index',$branch->discipline->id)}}"><i class="fa fa-arrow-left"></i></a>
				</div>

                <div class="card-body">
					<div>
					   <label>Branch:</label>
					   <p>{{$branch->branch}}</p>
					</div>
					<div>
					   <label>Branch code:</label>
					   <p>{{$branch->code}}</p>
					</div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
