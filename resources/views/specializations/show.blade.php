@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('specializations.index',$specialization->discipline_id)}}" class="no-decoration">Specializations</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	<span class="text-danger">{{$specialization->specialization}}</span> specialization details
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
					   <label>Specialization&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$specialization->specialization}}&nbsp;({{$specialization->code}})</span>
					</div>
				
					<div>
					   <label>Description&nbsp;:&nbsp;&nbsp;</label>
					   <span>{{$specialization->description}}</span>
					</div>	
						@if(!empty($specialization->sp_pdf))
							<iframe src="{{ asset('storage/'.$specialization->sp_pdf) }}" width="100%" height="600px"></iframe>
						@endif
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
