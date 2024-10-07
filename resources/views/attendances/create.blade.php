@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('attendances.index')}}" class="no-decoration">Attendances</a>
	</li>

	<li class="breadcrumb-item active" aria-current="page">
	Create Attendance
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('attendances.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="attendance" class="col-md-4 col-form-label text-md-end">{{ __('Attendance') }}</label>

                            <div class="col-md-6">
                                <input id="attendance" type="text" class="form-control @error('attendance') is-invalid @enderror" name="attendance" value="{{ old('attendance') }}" required autocomplete="attendance" autofocus>

                                @error('attendance')
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
