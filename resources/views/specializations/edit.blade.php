@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('specializations.index',$specialization->discipline_id)}}" class="no-decoration">Specializations</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit <span class="text-danger">{{$discipline->discipline}}</span> specialization
	</li>
@endsection
@section('content')

<div class="container">
@include('common.flash')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit <span class="text-danger">{{$discipline->discipline}}</span> specialization</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('specializations.update',$specialization->id) }}"  file="true" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="specialization" class="col-md-4 col-form-label text-md-end">{{ __('Specialization') }}</label>

                            <div class="col-md-6">
                                <input id="specialization" type="text" class="form-control @error('specialization') is-invalid @enderror" name="specialization" value="{{ old('specialization',$specialization->specialization) }}" required autocomplete="specialization" autofocus>

                                @error('specialization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Specialization Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="code" maxlength="5" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code',$specialization->code) }}" required autocomplete="code">

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
                                <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" >{{$specialization->description}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="sp_pdf" class="col-md-4 col-form-label text-md-end">{{ __('Upload Pdf') }}</label>

                            <div class="col-md-6">
                                <input id="sp_pdf" type="file" class="form-control @error('sp_pdf') is-invalid @enderror" name="sp_pdf" placeholder="Description" >

                                @error('sp_pdf')
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
