@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('bank_loans.index')}}" class="no-decoration">Bank</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
	Create
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Bank') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bank_loans.store') }}" file="true" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="bank_name1" class="col-md-4 col-form-label text-md-end">{{ __('Bank Name') }}</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}" required autocomplete="bank_name" autofocus>

                                @error('bank_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						 <div class="row mb-3">
                            <label for="loan_amount1" class="col-md-4 col-form-label text-md-end">{{ __('Loan Amount') }}</label>

                            <div class="col-md-6">
                                <input id="loan_amount" type="number" class="form-control @error('loan_amount') is-invalid @enderror" name="loan_amount" value="{{ old('loan_amount') }}" required autocomplete="loan_amount" autofocus>

                                @error('loan_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						 <div class="row mb-3">
                            <label for="interest_rate1" class="col-md-4 col-form-label text-md-end">{{ __('Interest Rate') }}</label>

                            <div class="col-md-6">
                                <input id="interest_rate" type="number" step="any" class="form-control @error('interest_rate') is-invalid @enderror" name="interest_rate" value="{{ old('interest_rate') }}" required autocomplete="interest_rate" autofocus>

                                @error('interest_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="process_time1" class="col-md-4 col-form-label text-md-end">{{ __('Process Time') }}</label>

                            <div class="col-md-6">
                                <input id="process_time" type="text" class="form-control @error('process_time') is-invalid @enderror" name="process_time" value="{{ old('process_time') }}" required autocomplete="process_time" autofocus>

                                @error('process_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="docs_type1" class="col-md-4 col-form-label text-md-end">{{ __('Docs Type') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="docs_type">
								@foreach(DataHelper::getDocsType() as $key=>$value)
									<option value="{{$key}}">{{$value}}</option>
								@endforeach	
								</select>
								@error('docs_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="docs_required1" class="col-md-4 col-form-label text-md-end">{{ __('Documents Required') }}</label>

                            <div class="col-md-6  item">
								<div class="row">
									<div class="col-sm-12 item d-flex justify-content-between">
										<input id="docs_required1" type="text" class="form-control @error('docs_required') is-invalid @enderror mr-5" name="docs_required[]" value="{{ old('docs_required') }}" required autocomplete="docs_required" autofocus>
									
										<button id="add" type="button" class="btn btn-primary ">Add</button>
									</div>
								</div>                              
                           
								<div id="items"></div>	
						
							</div>
						   							
						</div>
						
						
						<script>
							$(document).ready(()=>{
								
								let template ="<div class='row pt-3'><div class='col-sm-12 item d-flex justify-content-between'><input id='docs_required1' type='text' class='form-control @error('docs_required') is-invalid @enderror mr-5' name='docs_required[]' value='{{ old('docs_required') }}' required autocomplete='docs_required' /><button type='button' class='remove btn btn-danger'>Rem</button></div></div>";
																
								$("#add").on("click", ()=>{
									$("#items").append(template);
								})
								$("body").on("click", ".remove", (e)=>{
									$(e.target).parent("div").remove();
								})
							});
						</script>
							
						<div class="row mb-3">
                            <label for="upload_docs1" class="col-md-4 col-form-label text-md-end">{{ __('Upload Info Documents( pdf,jpeg,jpg,png )') }}</label>

                            <div class="col-md-6">
                                <input id="upload_docs" type="file" class="form-control @error('upload_docs') is-invalid @enderror" name="upload_docs[]" value="{{ old('upload_docs') }}" required autocomplete="upload_docs" multiple autofocus>

                                @error('upload_docs')
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
						
						<!--
						<div class="row mb-3">
                            <label for="state_id1" class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

                            <div class="col-md-6">
								<select id="state_id" class="form-select" name="state_id">
									
								</select>
                                @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						-->
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
</script>
@endsection
