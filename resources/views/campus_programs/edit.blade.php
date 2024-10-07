@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('campus_programs.index',$campus_program->campus_id)}}" class="no-decoration">{{$campus_program->campus->campus}} - Programs</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit {{$campus_program->campus->campus}} - <span style="color:red" href="{{route('campus_programs.index',$campus_program->campus_id)}}">{{$campus_program->program->program}}</span> discipline
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Campus Program') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('campus_programs.update' ,$campus_program->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="program" class="col-md-4 col-form-label text-md-end">{{ __('Campus Program') }}</label>

                            <div class="col-md-6">
                        		<select class="form-select" name="program_id">
								@foreach(DataHelper::getProgramsArray() as $key=>$value)
									@if($campus_program->program_id == $key)
										<option value="{{$key}}" selected>{{$value}}</option>
									@else
										<option value="{{$key}}">{{$value}}</option>
									@endif
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
