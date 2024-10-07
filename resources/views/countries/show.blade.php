@extends('layouts.auth_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Details') }}
					<a class="btn btn-primary pull-right" href="{{route('countries.index')}}"><i class="fa fa-arrow-left"></i></a>
				</div>

                <div class="card-body">
					<div>
					   <label>Country:</label>
					   <p>{{$country->country}}</p>
					</div>
					<div>
					   <label>Code:</label>
					   <p>{{$country->code}}</p>
					</div>
					

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
