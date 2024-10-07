@extends('layouts.auth_app')

@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('program_disciplines.index',$campus_program->id)}}" class="no-decoration">{{$campus_program->campus->campus}} - <span style="color:red" href="{{route('campus_programs.index',$campus_program->campus_id)}}">{{$campus_program->program->program}}</span> disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Create discipline
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('program_disciplines.store',$campus_program->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="disciplineid" class="col-md-4 col-form-label text-md-end">{{ __('Discipline') }}</label>

                            <div class="col-md-6">
                        		<select class="form-select" name="discipline_id">
								@foreach(DataHelper::getDisciplinesArray() as $key=>$value)
								  <option value="{{$key}}">{{$value}}</option>
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
