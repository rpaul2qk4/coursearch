@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('disciplines.index')}}" class="no-decoration">Disciplines</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Discipline') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('disciplines.update',$discipline->id) }}" file="true" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="discipline" class="col-md-4 col-form-label text-md-end">{{ __('Discipline') }}</label>

                            <div class="col-md-6">
                                <input id="discipline" type="text" class="form-control @error('discipline') is-invalid @enderror" name="discipline" value="{{ old('discipline',$discipline->discipline) }}" required autocomplete="discipline" autofocus>

                                @error('discipline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Discipline code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" maxlength="5" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code',$discipline->code) }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="disp_image" class="col-md-4 col-form-label text-md-end">{{ __('Discipline Image') }}</label>

                            <div class="col-md-6">
                                <input id="disp_image" type="file" class="form-control @error('disp_image') is-invalid @enderror" name="disp_image" value="{{ old('disp_image') }}" required autocomplete="disp_image" autofocus>

                                @error('disp_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<!--<div class="row mb-3">
                            <label for="icon" class="col-md-4 col-form-label text-md-end">{{ __('Icon') }}</label>

                            <div class="col-md-6">
								<div class="d-flex justify-content-between">
									 <div class="col-md-10">
										<select class="form-select" name="icon">
											@foreach(AppHelper::options('Icons') as $key=>$value)
												@if($discipline->icon == $key)
												<option value="{{$key}}" selected>{{$value}}</option>
												@else
												<option value="{{$key}}">{{$value}}</option>
												@endif
											@endforeach	
										</select>
										@error('icon')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>	
									<div class="col-md-10">
										&nbsp;&nbsp;&nbsp;<span id="icon_display"><i  class="{{$discipline->icon}} fa-3x"></i></span>
									</div>
								</div>
                            </div>
						
                        </div>-->
						<div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Discipline description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" >{{ old('description',$discipline->description) }}</textarea>

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
