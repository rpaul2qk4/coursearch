@extends('layouts.auth_app')

@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('program_disciplines.index',$program_discipline->campus_program_id)}}" class="no-decoration">{{$program_discipline->campus->campus}} - <span style="color:red" href="{{route('campus_programs.index',$program_discipline->campus->id)}}">{{$program_discipline->program->program}}</span> disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit discipline
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}
				</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('program_disciplines.update',$program_discipline->id) }}">
                        @csrf

                       <div class="row mb-3">
                            <label for="disciplineid" class="col-md-4 col-form-label text-md-end">{{ __('Discipline') }}</label>

                            <div class="col-md-6">
                        		<select class="form-select" name="discipline_id">
								@foreach(DataHelper::getDisciplinesArray() as $key=>$value)
									@if($program_discipline->discipline->id==$key)
										<option value="{{$key}}" selected>{{$value}}</option>
									@else
										<option value="{{$key}}">{{$value}}</option>
									@endif
								 @endforeach 
								</select>

                                @error('discipline_id')
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
<script>
$(document).ready(function(){
	$('select').change(function(){
		var iconval=$(this).val();
		$('#icon_display').prop("class", iconval+'  fa-3x' );
		//alert(iconval);
	});
});
</script>
@endsection
