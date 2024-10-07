@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('discipline_branches.index',$program_discipline->discipline->id)}}" class="no-decoration">{{$program_discipline->campus_program->campus->campus}} - <span style="color:red" href="{{route('campus_programs.index',$program_discipline->campus_program->campus_id)}}">{{$program_discipline->campus_program->program->program}}</span> disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Create <span class="text-danger">{{$program_discipline->discipline->discipline}} </span> discipline branch
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('discipline_branches.store',$program_discipline->id) }}">
                        @csrf

                       <div class="row mb-3">
                            <label for="branch_id" class="col-md-4 col-form-label text-md-end">{{ __('Discipline Branch') }}</label>

                            <div class="col-md-6">
                        		<select class="form-select" name="branch_id">
								@foreach($program_discipline->discipline->branches->pluck('branch','id')->prepend('Select','')->toArray() as $key=>$value)
								  <option value="{{$key}}">{{$value}}</option>
								 @endforeach 
								</select>

                                @error('branch_id')
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
