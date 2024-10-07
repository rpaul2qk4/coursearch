@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('bank_loans.index')}}" class="no-decoration">Bank Loans</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Edit
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		@include('common.flash')
            <div class="card">
                <div class="card-header">{{ __('Edit Bank Loan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bank_loans.update',$bank_loan->id) }}" file="true" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="bank_name1" class="col-md-4 col-form-label text-md-end">{{ __('Bank Name') }}</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name',$bank_loan->bank_name) }}" required autocomplete="bank_name" autofocus>

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
                                <input id="loan_amount" type="number" class="form-control @error('loan_amount') is-invalid @enderror" name="loan_amount" value="{{ old('loan_amount',$bank_loan->loan_amount) }}" required autocomplete="loan_amount" autofocus>

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
                                <input id="interest_rate" type="number" step="any" class="form-control @error('interest_rate') is-invalid @enderror" name="interest_rate" value="{{ old('interest_rate',$bank_loan->interest_rate) }}" required autocomplete="interest_rate" autofocus>

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
                                <input id="process_time" type="text" class="form-control @error('process_time') is-invalid @enderror" name="process_time" value="{{ old('process_time',$bank_loan->process_time) }}" required autocomplete="process_time" autofocus>

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
									@if($bank_loan->docs_type==$key)
										<option value="{{$key}}" selected>{{$value}}</option>
									@else
										<option value="{{$key}}">{{$value}}</option>
									@endif
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
                            <label for="upload_docs1" class="col-md-4 col-form-label text-md-end">{{ __('Upload Info Documents') }}</label>

                            <div class="col-md-6">
                                <input id="upload_docs" type="file" class="form-control @error('upload_docs') is-invalid @enderror" name="upload_docs[]"  autocomplete="upload_docs" multiple autofocus>
									<small>( Please upload pdf,jpeg,jpg,png formatted files only )</small>
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
										@if($bank_loan->id==$key)
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
				
		<div class="col-md-4">
		
			<div class="mb-3">
			<div class="card">
				<div class="card-header">Documents Required:</div>
			
				<div class="card-body item">
				
					<div class="row">
						@foreach($bank_loan->req_docs as $id=>$req_doc)
						<span>{{$id+1}}&nbsp;&nbsp;.&nbsp;&nbsp;{{ucfirst($req_doc->document)}}&nbsp;&nbsp;<i class="fa fa-edit text-primary" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#recDocModal{{$req_doc->id}}"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger" style="cursor:pointer" onclick="location.href='{{route('req_docs.delete',$req_doc->id)}}'"></i></span>
						@include('layouts.model-req-doc',['req_doc_text'=>$req_doc])
						@endforeach
					</div>
					
					<div class="row">
						<div class="col-sm-12 item d-flex justify-content-between">
							<input id="docs_required1" type="text" class="form-control @error('docs_required') is-invalid @enderror mr-5" name="docs_required[]" value="{{ old('docs_required') }}" placeholder="documents" autocomplete="docs_required" >
						
							<button id="add" type="button" class="btn btn-primary ">Add</button>
						</div>
					</div>                              
			   
					<div id="items"></div>	
			
				</div>
										
			</div>
			</div>
			
			<div class="card">
				<div class="card-header">Uploaded Documents:</div>

				<div class="card-body mx-auto">
					<div class="row">
						@foreach($bank_loan->upload_docs as $upload_doc)
							@if(!empty($upload_doc->document))
								@if(!empty($upload_doc->doc_type) && $upload_doc->doc_type=='pdf')
									<div class="col-sm-6 p-2" style="border:1px solid black">
										<iframe src="{{ asset('uploads/'.$upload_doc->document) }}" style="width:150px;height:150px;padding:3px" ></iframe>
										<i class="fa fa-edit text-primary mr-3" style="cursor:pointer"  data-bs-toggle="modal" data-bs-target="#uploadDocModal{{$upload_doc->id}}"></i><i class="fa fa-trash text-danger" style="cursor:pointer"  onclick="location.href='{{route('upload_docs.delete',$upload_doc->id)}}'"></i>
									</div>
								@else
									<div class="col-sm-6 p-2" style="border:1px solid black">
										<img src="{{ asset('uploads/'.$upload_doc->document) }}" style="width:150px;height:150px;padding:3px" >
										<i class="fa fa-edit text-primary mr-3 textPointere"style="cursor:pointer"  data-bs-toggle="modal" data-bs-target="#uploadDocModal{{$upload_doc->id}}"></i><i class="fa fa-trash text-danger" style="cursor:pointer"  onclick="location.href='{{route('upload_docs.delete',$upload_doc->id)}}'"></i>
									</div>
								@endif
								@include('layouts.model-upload-doc',['upload_doc'=>$upload_doc])
					
							@endif
						@endforeach
					</div>
				</div>
			</div>
		
		</div>
		
		
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
	$(document).ready(()=>{
		
		let template ="<div class='row'><div class='col-sm-12 item d-flex justify-content-between pt-3'><input id='docs_required1' type='text' class='form-control @error('docs_required') is-invalid @enderror mr-5' name='docs_required[]' value='{{ old('docs_required') }}' autocomplete='docs_required' /><button type='button' class='remove btn btn-danger'>Rem</button></div></div>";
										
		$("#add").on("click", ()=>{
			$("#items").append(template);
		})
		$("body").on("click", ".remove", (e)=>{
			$(e.target).parent("div").remove();
		})
	});
</script>

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
