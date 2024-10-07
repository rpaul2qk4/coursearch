@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('courses.index',$course->specialization->id)}}" class="no-decoration">Courses</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Edit <span class="text-danger">{{$course->specialization->specialization}}</span> course
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('courses.update',$course->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="course" class="col-md-4 col-form-label text-md-end">{{ __('Course') }}</label>

                            <div class="col-md-6">
                                <input id="course" type="text" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course',$course->course) }}" required autocomplete="course" autofocus>

                                @error('course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Course code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" maxlength="5" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code',$course->code) }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Course description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" >{{ old('description',$course->description) }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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
