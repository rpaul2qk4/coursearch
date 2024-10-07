@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('formats.index')}}" class="no-decoration">Formats</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Edit <span class="text-danger">Format</span> 
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Format') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('formats.update',$format->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="format" class="col-md-4 col-form-label text-md-end">{{ __('Format') }}</label>

                            <div class="col-md-6">
                                <input id="format" type="text" class="form-control @error('format') is-invalid @enderror" name="format" value="{{ old('format',$format->format) }}" required autocomplete="format" autofocus>

                                @error('format')
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
