@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('visa-processes.index')}}" class="no-decoration">Upload scholorship documents</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Upload
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Upload scholorship Document') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('scholorships.store') }}" file="true" enctype="multipart/form-data">
                        @csrf
                      	
						<div class="row mb-3">
                            <label for="country_id1" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
								<select id="country_id" class="form-select" name="country_id" required>
									@foreach(DataHelper::getCountriesOptions() as $key=>$value)
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
                            <label for="discipline_id1" class="col-md-4 col-form-label text-md-end">{{ __('Discipline') }}</label>

                            <div class="col-md-6">
								<select id="discipline_id" class="form-select" name="discipline_id" required>
									@foreach(DataHelper::getDisciplineOptions() as $key=>$value)
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
						<div class="row mb-3">
                            <label for="specialization_id1" class="col-md-4 col-form-label text-md-end">{{ __('Specialization') }}</label>

                            <div class="col-md-6">
								<select id="specialization_id" class="form-select" name="specialization_id" required>
								
								</select>
                                @error('specialization_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="scholorship_documents1" class="col-md-4 col-form-label text-md-end">{{ __('Sholorship Info Documents') }}</label>

                            <div class="col-md-6">
								<input type="file" id="scholorship_documents" class="form-control" name="scholorship_documents[]" multiple required>
											
								
                                @error('scholorship_documents')
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
    });
	 jQuery(document).ready(function ()
    {
		jQuery('select[name="discipline_id"]').on('change',function(){
		   var disciplineID = jQuery(this).val();
		  //alert(disciplineID);
		   if(disciplineID)
		   {
			  jQuery.ajax({
				 url : "{{ url('get-disp-specializations') }}" + "/" +disciplineID,									 
				 type : "GET",
				 dataType : "json",
				 success:function(data)
				 {
					jQuery('select[name="specialization_id"]').empty();
						   $('select[name="specialization_id"]').append('<option value="">Select</option>');
					jQuery.each(data, function(key,value){
					   $('select[name="specialization_id"]').append('<option value="'+ key +'">'+ value +'</option>');
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
			  $('select[name="specialization"]').empty();
		   }
		});	
    });
</script>
@endsection
