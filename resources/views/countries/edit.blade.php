@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('countries.index')}}" class="no-decoration">Countries</a>
	</li>	
	<li class="breadcrumb-item active" aria-current="page">
	Edit country
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('countries.update',$country->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country',$country->country) }}" required autocomplete="country" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="code" maxlength="5" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code',$country->code) }}" required autocomplete="code">

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="currency" class="col-md-4 col-form-label text-md-end">{{ __('Currency') }}</label>

                            <div class="col-md-6">
                             
								<select class="form-control" name="currency" id="currency">
									@forelse(AppHelper::options('Currency') as $key=>$value)
										@if($country->currency==$key)
										  <option value="{{$key}}" selected>{{strtoupper($value)}}</option>								  
										@else
											<option value="{{$key}}">{{strtoupper($value)}}</option>								  
										@endif
									@empty
									   <option>No data found</option>
									@endforelse
								</select>
                                @error('currency')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="currency_icon" class="col-md-4 col-form-label text-md-end">{{ __('Currency Icon') }}</label>
							<div class="col-md-6">
								<span id="curr_icon"><i style="font-size:24px" class="fa fa-{{$country->currency_icon}}"></i></span>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

	$(document).ready(function(){
	  
		$("select").change(function(){ 	
			var crncy=$('#currency').val();
			$("#curr_icon").html('<i style="font-size:24px" class="fa fa-'+crncy+'"></i><input type="hidden" value="'+crncy+'" name="currency_icon">');
		});
	 
	});
	
</script>
@endsection
