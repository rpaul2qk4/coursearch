
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl">
    <div class="modal-content">
	
		<form action="{{route('search-results.modal-search')}}" method="POST" enctype="multipart/form-data">
		@csrf	
			<div class="row p-5">
			<h2 class="text-center">SEARCH FOR SPECIALIZATIONS</h2>
				<div class="col-md-6 PY-3">
					<label for="countryid" class="form-label">Country</label>
					<select id="country_id" class="form-select" name="country_id" >
						@foreach(App\Helpers\DataHelper::getCountriesOptions() as $key=>$value)
							@if(!empty($filters['country_id']) && ($filters['country_id']==$key))
								<option value="{{$key}}" selected>{{$value}}</option>
							@else
								<option value="{{$key}}">{{$value}}</option>
							@endif
						@endforeach
					</select>
				</div>
				  
				 <div class="col-md-6 PY-3">
					<label for="universityid" class="form-label">University</label>
					<select id="university_id" class="form-select" name="university_id" >
					@if(!empty($state_universities))
						@foreach($state_universities as $key=>$value)
							@if(!empty($filters['university_id']) && ($filters['university_id'] == $key))
								<option value="{{$key}}" selected>{{$value}}</option>
							@else
								<option value="{{$key}}">{{$value}}</option>
							@endif
						@endforeach
					@endif
					</select>
				</div>
				  
				<div class="col-md-6 py-3">
					<label for="stateid" class="form-label">State</label>
					<select id="state_id" class="form-select" name="state_id">
						@if(!empty($states))
							@foreach($states as $key=>$value)
								@if(!empty($filters['state_id']) && ($filters['state_id'] == $key))
									<option value="{{$key}}" selected>{{$value}}</option>
								@else
									<option value="{{$key}}">{{$value}}</option>
								@endif
							@endforeach
						@endif
					</select>
				</div>
				
				 
				<div class="col-md-6 py-3">
					<label for="campusid" class="form-label">Campus</label>
					<select id="campus_id" class="form-select" name="campus_id" >
						@if(!empty($campuses))
							@foreach($campuses as $key=>$value)
								@if(!empty($filters['campus_id']) && ($filters['campus_id'] == $key))
									<option value="{{$key}}" selected>{{$value}}</option>
								@else
									<option value="{{$key}}">{{$value}}</option>
								@endif
							@endforeach
						@endif
					</select>
				</div> 
				
				<div class="col-md-6 py-3">
					<label for="stateid" class="form-label">Specialization</label>
					
						<div class="autocomplete" style="width:600px;">
							<input type="text" id="myInputModel" class="form-control rounded-left-lg placeholder-1" value="{{!empty($filters['specialization'])?$filters['specialization']:null}}" placeholder="Search for specialization" name="specialization" style="height:30px; background-color:#fff !important;" autocomplete="off">
						</div>
				
				</div>
				
			
				
				<div class="col-md-12 py-0 d-flex justify-content-between align-items-center">
					<div><h5>Please select as you whish to search</h5></div>
					<div>
						<a href="#" class="btn btn-secondary btn-sm pull-right" style="margin-left:5px" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" class="btn btn-primary btn-sm  pull-right">Search</button>
					</div>
				</div>
			 
			</div>
		</form>
    </div>
  </div>
</div>

@include('suggessions.specializations-model')
	
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
			
					
	//universities		
			
		 	jQuery('select[name="state_id"]').on('change',function(){
               var stateID = jQuery(this).val();
            // alert(stateID);
               if(stateID)
               {
                  jQuery.ajax({
					url : "{{ url('get-universities') }}" + "/" + stateID,                    
					type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
						  //alert('success');
                        console.log(data);
                        jQuery('select[name="university_id"]').empty();
						$('select[name="university_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="university_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[name="university"]').empty();
               }
            });
	
	//universities		
			
		 	jQuery('select[name="university_id"]').on('change',function(){
               var universityID = jQuery(this).val();
            // alert(universityID);
               if(universityID)
               {
                  jQuery.ajax({
					url : "{{ url('get-campuses') }}" + "/" + universityID,                    
					type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
						  //alert('success');
                        console.log(data);
                        jQuery('select[name="campus_id"]').empty();
						$('select[name="campus_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="campus_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[name="campus"]').empty();
               }
            });
			
	//Specialization		
		
		 	jQuery('select[name="campus_id"]').on('change',function(){
               var campusID = jQuery(this).val();
            // alert(campusID);
               if(campusID)
               {
                  jQuery.ajax({
					url : "{{ url('get-specializations') }}" + "/" + campusID,                    
					type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
						  //alert('success');
                        console.log(data);
                        jQuery('select[name="specialization_id"]').empty();
						$('select[name="specialization_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="specialization_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[name="specialization"]').empty();
               }
            });//courses		
			
		 	jQuery('select[name="specialization_id"]').on('change',function(){
               var specializationID = jQuery(this).val();
            // alert(specializationID);
               if(specializationID)
               {
                  jQuery.ajax({
					url : "{{ url('get-courses') }}" + "/" + specializationID,                    
					type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
						  //alert('success');
                        console.log(data);
                        jQuery('select[name="course_id"]').empty();
						$('select[name="course_id"]').append('<option value="">Select</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="course_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
				   //alert('fail');
                  $('select[name="course"]').empty();
               }
            }); 
			 
    });
</script>