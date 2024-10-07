@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('universities.index')}}" class="no-decoration">Universities</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('campuses.index',$campus->university_id)}}" class="no-decoration">Campuses</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('campus_programs.index',$campus->id)}}" class="no-decoration">{{$campus->campus}} programs</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Create <span class="no-decoration text-danger">{{$campus->campus}}</span> campus program
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Program') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('campus_programs.store',$campus->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="program" class="col-md-4 col-form-label text-md-end">{{ __('Campus Program') }}</label>

                            <div class="col-md-6">
                        		<select class="form-select" name="program_id">
								@foreach(DataHelper::getProgramsArray() as $key=>$value)
								  <option value="{{$key}}">{{$value}}</option>
								 @endforeach 
								</select>

                                @error('program')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
