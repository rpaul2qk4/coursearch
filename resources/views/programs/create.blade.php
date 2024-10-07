@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('programs.index')}}" class="no-decoration">Programs</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Create
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Program') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('programs.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="program" class="col-md-4 col-form-label text-md-end">{{ __('Program') }}</label>

                            <div class="col-md-6">
                                <input id="program" type="text" class="form-control @error('program') is-invalid @enderror" name="program" value="{{ old('program') }}" required autocomplete="program" autofocus>

                                @error('program')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						 <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" maxlength="5" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Discription" ></textarea>

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
