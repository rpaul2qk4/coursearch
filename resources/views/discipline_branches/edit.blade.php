@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('discipline_branches.index',$discipline_branch->discipline->id)}}" class="no-decoration">{{$discipline_branch->campus->campus}} - <span style="color:red">{{$discipline_branch->program->program}}</span> disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit <span class="text-danger">{{$discipline_branch->discipline->discipline}} </span> discipline branch
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('discipline_branches.update',$discipline_branch->id) }}">
                        @csrf

                       <div class="row mb-3">
                            <label for="branch_id" class="col-md-4 col-form-label text-md-end">{{ __('Discipline Branch') }}</label>

                            <div class="col-md-6">
                        		<select class="form-select" name="branch_id">
								@foreach($program_discipline->discipline->branches->pluck('branch','id')->prepend('Select','')->toArray() as $key=>$value)
									@if($discipline_branch->branch_id==$key)
										<option value="{{$key}}" selected>{{$value}}</option>
									@else
										<option value="{{$key}}">{{$value}}</option>
									@endif
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
