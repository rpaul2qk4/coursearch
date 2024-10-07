@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('universities.index')}}" class="no-decoration">Universities</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('campuses.index',$university->id)}}" class="no-decoration">Campuses</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Create <span class="no-decoration text-danger">{{$university->university}}</span> campus
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('campuses.store',$university->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="campus1" class="col-md-4 col-form-label text-md-end">{{ __('Campus') }}</label>

                            <div class="col-md-6">
                                <input id="campus" type="text" class="form-control @error('campus') is-invalid @enderror" name="campus" value="{{ old('campus') }}" required autocomplete="campus" autofocus>
                                @error('campus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code1" class="col-md-4 col-form-label text-md-end">{{ __('Campus Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="code" maxlength="5" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code">

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="description1" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" ></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="row mb-3">
                            <label for="website1" class="col-md-4 col-form-label text-md-end">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="country_id1" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
								<select id="country_id" class="form-select" name="country_id" required>
									@foreach($countries as $key=>$value)
										<option value="{{$key}}">{{$value}}</option>
									@endforeach
								</select>
                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="state_id1" class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

                            <div class="col-md-6">
								<select id="state_id" class="form-select" name="state_id" required>
									
								</select>
                                @error('state_id')
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="country_id"]').on('change',function(){
               var countryID = jQuery(this).val();
			  //alert(countryID);
               if(countryID)
               {
                  jQuery.ajax({
					 url : "{{ url('get-states') }}" + "/" +countryID,									 
					 type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
					    jQuery('select[name="state_id"]').empty();
						       $('select[name="state_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="state_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     },
					 error:function(data)
                     {
						alert("err");
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[name="state"]').empty();
               }
            });
			
					
	//courses		
			
			/* jQuery('select[name="state_id"]').on('change',function(){
               var stateID = jQuery(this).val();
            // alert(stateID);
               if(stateID)
               {
                  jQuery.ajax({
					url : "{{ url('get-cities') }}" + "/" + stateID,                    
					type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
						  //alert('success');
                        console.log(data);
                        jQuery('select[name="city_id"]').empty();
						$('select[name="city_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[name="city"]').empty();
               }
            }); */
			
    });
</script>
@endsection
