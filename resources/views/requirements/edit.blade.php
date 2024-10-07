@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('requirements.index')}}" class="no-decoration">Requirements</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Edit <span class="text-danger">Requirement</span> 
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('requirements.update' ,$requirement->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="requirement" class="col-md-4 col-form-label text-md-end">{{ __('Requirement') }}</label>

                            <div class="col-md-6">
                                <input id="requirement" type="text" class="form-control @error('requirement') is-invalid @enderror" name="requirement" value="{{ old('requirement',$requirement->requirement) }}" required autocomplete="requirement" autofocus>

                                @error('requirement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						 <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code',$requirement->code) }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Discription') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Discription" >{{$requirement->description}}</textarea>

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
