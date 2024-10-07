@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('universities.index')}}" class="no-decoration">Universities</a>
	</li>	
	<li class="breadcrumb-item active" aria-current="page">
	Create <span class="no-decoration text-danger">University</span>
	</li>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('universities.store') }}">
                        @csrf

						<div class="row p-1">
							<div class="col-4">
								<input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" placeholder="University name" required autocomplete="university" autofocus>
								@error('university')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							
							<div class="col-4">
								<input id="code" type="text" maxlength="5" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" placeholder="University code" required autocomplete="code">
								@error('code')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							
							<div class="col-4">
								<input id="website" type="website" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" placeholder="University website" required autocomplete="website">
								@error('website')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							
						</div>

						<div class="row p-1">

							<div class="col-4">
								<input id="world_ranking" type="text" maxlength="5" class="form-control @error('world_ranking') is-invalid @enderror" name="world_ranking" value="{{ old('world_ranking') }}" placeholder="World ranking" required autocomplete="world_ranking">
								@error('world_ranking')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-4">
								<input id="qs_ranking" type="text" maxlength="5" class="form-control @error('qs_ranking') is-invalid @enderror" name="qs_ranking" value="{{ old('qs_ranking') }}" placeholder="QS ranking" required autocomplete="qs_ranking">
								@error('qs_ranking')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-4">
								<input id="the_ranking" type="text" maxlength="5" class="form-control @error('the_ranking') is-invalid @enderror" name="the_ranking" value="{{ old('the_ranking') }}" placeholder="Times heigher eduction ranking" required autocomplete="the_ranking">
								@error('the_ranking')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							
						</div>
						
						<div class="row p-1">

							<div class="col-4">
								<input id="country_ranking" type="text" maxlength="5" class="form-control @error('country_ranking') is-invalid @enderror" name="country_ranking" value="{{ old('country_ranking') }}" placeholder="Country ranking" required autocomplete="country_ranking">
								@error('country_ranking')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-4">
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
							<div class="col-4">
								<select id="state_id" class="form-select" name="state_id" required></select>
								@error('state_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							
						</div>
						<div class="row p-3">
							<div class="col-4">
								<label class="" >Semisters : </label>
							</div>
							<table >								 
								@foreach(AppHelper::options('Semisters') as $key=>$value )
									<tr class="">									
										<td class="col-1">									
											<div class="form-check form-check-inline">
											  <input class="form-check-input" id="semister{{$key}}" name="sem[{{$key}}][semister]" type="checkbox" id="inlineCheckbox1" value="{{$value}}">
											  <label class="form-check-label" for="inlineCheckbox1">{{$value}}</label>
											</div>	
										</td>
									
										<td class="col-1" style="text-align:right">Dead Line</td>
									
										<td class="col-1">
											<input id="app_end_date{{$key}}" type="date" class="form-control @error('app_end_date') is-invalid @enderror"  name="sem[{{$key}}][app_end_date]" value="{{ old('app_end_date') }}"  placeholder="End date"  autocomplete="app_end_date">
											@error('app_end_date')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</td>
										
										
										<td class="col-1" style="text-align:right">Start Date</td>
									
										<td class="col-1">
											<input id="app_start_date{{$key}}" type="date" class="form-control @error('app_start_date') is-invalid @enderror"  name="sem[{{$key}}][app_start_date]" value="{{ old('app_start_date') }}"  placeholder="Start date" autocomplete="app_start_date">
											@error('app_start_date')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</td>
									
									
										<td class="col-1" style="text-align:right">	
											Early
										</td>
										<td class="col-2">	
											<input id="university_early_decision_date{{$key}}" type="date" class="form-control @error('university_early_decision_date') is-invalid @enderror" name="sem[{{$key}}][university_early_decision_date]" value="{{ old('university_early_decision_date') }}"  autocomplete="university_early_decision_date">
										</td>
									
										<td class="col-1" style="text-align:right">	
											Regular
										</td>
										<td class="col-2">	
											<input id="university_regular_decision_date{{$key}}" type="date" class="form-control @error('university_regular_decision_date') is-invalid @enderror" name="sem[{{$key}}][university_regular_decision_date]" value="{{ old('university_regular_decision_date') }}"  autocomplete="university_regular_decision_date">
										</td>
										
										
									</tr>
								@endforeach
							</table>
						
						</div>
						
							
															
                        <div class="row p-1">
                            <div class="col-4">
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
<!--
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
			
		/* 	jQuery('select[name="state_id"]').on('change',function(){
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
            });
			 */
    });
	
	function enforceMinMax(el) {
		if (el.value != "") {
			if (parseInt(el.value) < parseInt(el.min)) {
			  el.value = el.min;
			}
			if (parseInt(el.value) > parseInt(el.max)) {
			  el.value = el.max;
			}
		}
	}	
	
	function stFun(stdt){
		var dt=document.getElementById("app_start_date"+stdt);
		//alert(dt);
		var fd = new Date(dt.value),
			fmonth = '' + (fd.getMonth() + 1),
			fday = '' + fd.getDate(),
			fyear = fd.getFullYear();
		return [fyear, fmonth, fday].join('-');
	}
		
	function dateDiffFun(enddt){
		
		var sdt=document.getElementById("app_start_date"+enddt);
		
		var edt=document.getElementById("app_end_date"+enddt);
		
		const 	a = new Date(sdt.value),
				b = new Date(edt.value),
				difference = dateDiffInDays(a, b);
		
			if(difference<0){
				alert("* start date must be lesser than the end date!");
				sdt.value=null;
				edt.value=null;			
			}
			
	}
	
	// a and b are javascript Date objects
	function dateDiffInDays(a, b) {
	  const _MS_PER_DAY = 1000 * 60 * 60 * 24;
	  // Discard the time and time-zone information.
	  const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
	  const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

	  return Math.floor((utc2 - utc1) / _MS_PER_DAY);
	}
		
	
</script>
@endsection
