
<style>
#rcorners {
  
  display:flex;
  justify-content:center;
  align-items:center;
  border-radius: 15px;
  background: #e0ebeb;
  padding: 15px;
  margin:35px;
 
}
.table{
	margin-bottom:0rem !important;
}
</style>




    <!--<h3 class="w-100">Option {{$specialization->id}}</h3>-->
<div id="rcorners">
    
	<div  class="table table-responsive ">
	<table class="table table-bordered table-striped bg-info1" style="font-size:14px;background:#e0ebeb;">			
		
		<tr>
			<th class="text-dark text-center" style="font-weight:bold">University</th>
			<th colspan="8" style="font-weight:bold;color:red">{{$specialization->university->university}}</th>
		</tr>
		<tr>
			<th class="text-dark text-center" style="font-weight:bold">Course</th>
			<th colspan="8" style="font-weight:bold;color:red">{{$specialization->specialization->specialization}}</th>
		</tr>

		<tr class="text-muted text-center">
			<th>Country</th>
			<th>State</th>
			<th>Campus</th>
			<th>Program</th>
			<th>Tution Fee</th>
			<th>Application Fee</th>
			<th>Duration</th>
			<th>Deadline</th>
			<th>Start Date</th>
		</tr>
		
		<tr class="text-center text-dark" style="font-weight:bold">
			<td>{{$specialization->university->country->country}}</td>
			<td>{{$specialization->university->state->state}}</td>
			<td>{{$specialization->campus->campus}}</td>
			<td>{{$specialization->program->program}}</td>
			<td>@foreach($specialization->branch_specialization_fees as $id=>$sp_format) 										
									 @if($id>0) / @endif <i style="font-size:16px;color:red1" class="fa fa-{{$specialization->country_currency}}"></i>&nbsp;{{!empty($sp_format->fees)?$sp_format->fees:'***'}}
							@endforeach</td>
			<td><i style="font-size:16px;color:red1" class="fa fa-{{$specialization->country_currency}}"></i>&nbsp;{{$specialization->apply_fee}}</td>
			<td>{{$specialization->duration->duration}}</td>
			<td>{{$specialization->apply_deadline}}</td>
			<td>{{$specialization->start_date}}</td>					
		</tr>
		
		<tr>
			<th class="text-dark" colspan="9" style="font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Requirements</th>
		</tr>
		
		<tr class="text-muted text-center" >
			<th>TOFEL</th>
			<th>IELTS</th>
			<th>PTE</th>
			<th>GRE</th>
			<th>GPA</th>
			<th>ACCEPTANCE RATE</th>
			<th>WORLD RANK</th>
			<th>COUNTRY RANK</th>
			<th>COURSE RANK</th>
		</tr>
		<tr class="text-center text-dark"  style="font-weight:bold">
			
			@if(!empty($specialization->branch_specialization_requirements->count())) 
				
					
				<td>{{$specialization->getSpecifiedRequirementText("TOEFL")}}</td>
			
	
		
				<td>{{$specialization->getSpecifiedRequirementText("IELTS")}}</td>
			

				<td>{{$specialization->getSpecifiedRequirementText("PTE")}}</td>
			
		
		
				<td>{{$specialization->getSpecifiedRequirementText("GRE")}}</td>
			
					
			@else 
				<td>NA</td> 
				<td>NA</td> 
				<td>NA</td> 
				<td>NA</td> 
			@endif
			
			<td>{{$specialization->gpa_req_rate}}</td>
			<td>{{$specialization->acceptance_rate}}%</td>
			<td>{{$specialization->university->world_ranking}}</td>
			<td>{{$specialization->university->country_ranking}}</td>
			<td>{{!empty($specialization->course_ranking)?$specialization->course_ranking:'***'}}</td>					
		</tr>
		
	</table>
</div>
</div>
