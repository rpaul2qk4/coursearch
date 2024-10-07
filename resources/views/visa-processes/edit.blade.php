@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('visa-processes.index')}}" class="no-decoration">Country wide visa processing documents</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Edit visa processing document
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Document') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visa-processes.update',$visa_process->id) }}" file="true" enctype="multipart/form-data">
                        @csrf
                   
						<div class="row mb-3">
                            <label for="country_id1" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
								<select id="country_id" class="form-select" name="country_id" required>
									@foreach(DataHelper::getCountriesOptions() as $key=>$value)
										@if($visa_process->country_id==$key)
											<option value="{{$key}}" selected>{{$value}}</option>
										@else
											<option value="{{$key}}">{{$value}}</option>
										@endif
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
                            <label for="document1" class="col-md-4 col-form-label text-md-end">{{ __('Upload Info Documents') }}</label>

                            <div class="col-md-6">
								<input type="file" id="document" class="form-control" name="visa_documents[]" multiple >
							    @error('document')
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
				 url : "{{ url('get-agents') }}" + "/" +countryID,									 
				 type : "GET",
				 dataType : "json",
				 success:function(data)
				 {
					jQuery('select[name="user_id"]').empty();
						   $('select[name="user_id"]').append('<option value="">Select</option>');
					jQuery.each(data, function(key,value){
					   $('select[name="user_id"]').append('<option value="'+ key +'">'+ value +'</option>');
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
			  $('select[name="user"]').empty();
		   }
		});	
    });
</script>
@endsection
