<table class="table table-bordered">
	<tbody>
		<tr>
			<td colspan="3">
				<a href="{{route('branch_specializations.course-view',$course->id)}}" target="_blank"> 
					{{$course->specialization->specialization}}
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<a href="{{route('branch_specializations.course-view',$course->id)}}" target="_blank"> 
					{{$course->course->course}}						
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="3"> 
				 @if(!empty(Auth::user()) && in_array(Auth::user()->role->role,['Admin']))
					<small><a class="font-size-sm" href="{{$course->university->formatted_website}}" target="_blank" style="cursor:pointer;color:black"><span data-bs-toggle="tooltip" data-bs-title="{{$course->campus->campus}}" data-bs-placement="top">{{$course->campus->campus}}</span>&nbsp;(&nbsp;<span style="color:green !important;font-weight:bold" data-bs-toggle="tooltip" data-bs-title="{{$course->university->university}}" data-bs-placement="top" >{{$course->university->university}}</span>&nbsp;)</a></small><br>
				@else
					<small><a class="font-size-sm" href="#" style="cursor:pointer;color:black"><span data-bs-toggle="tooltip" data-bs-title="{{$course->campus->campus}}" data-bs-placement="top">{{$course->campus->campus}}</span>&nbsp;(&nbsp;<span style="color:green !important;font-weight:bold" data-bs-toggle="tooltip" data-bs-title="{{$course->university->university}}" data-bs-placement="top" >{{$course->university->university}}</span>&nbsp;)</a></small><br>
				@endif
									
			
			</td>
		</tr>
		<tr>
			<td colspan="3">
			<small class="font-size-sm"><span data-bs-toggle="tooltip" data-bs-title="{{$course->university->country->country}}" data-bs-placement="top">{{$course->university->country->country}}</span>&nbsp;/&nbsp;<span data-bs-toggle="tooltip" data-bs-title="{{$course->university->state->state}}" data-bs-placement="top">{{$course->university->state->state}}</span></small>
			
			</td>
		</tr>
		<tr>
			<td>
				<small>
																
						Fees : 
						@foreach($course->branch_specialization_fees as $id=>$sp_format) 										
								 @if($id>0) / @endif <a href="#"> <i style="font-size:12px;color:red" class="fa fa-{{$course->country_currency}}"></i>&nbsp;{{$sp_format->fees}}</a>
						@endforeach
					
				</small>
			</td>
			
			<td  colspan="2" style="text-align:right">
				<div class=" custom-checkbox1 m-1">
					<input type="checkbox" class="custom-control-input1" id="comparison{{$course->id}}" name="comparisons[]" value="{{$course->id}}" style="height:15px;width:15px;position:relative">
					<label class="custom-control-label1 font-size-base" for="comparison{{$course->id}}">
						<button class="btn-outline-white" id="compare_now{{$course->id}}" type="button">Add to Compare</button>
					</label>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<table class="table table-bordered">
					<tr>
						<td>Sem</td>
						<td>StDt</td>
						<td>End</td>
					</tr>					
				</table>
			</td>
			<td>
				<table class="table table-bordered">
					<tr>
						<td>Requirements</td>
					</tr>					
				</table>			
			</td>
			<td>
				<table class="table table-bordered">
					<tr>
						<td><a href="#" > <i class="far fa-heart"></i> </a>	</td>
					</tr>					
				</table>				
			</td>
		</tr>
		
		<tr>
			<td>
				<table class="table table-bordered">
				
				
					
							@if(!empty($course->spc_semisters->count()))
								@if(!empty($course_list_data['semisters'][0]))
									@foreach($course->spc_semisters as $spc_semister)											
										@if(!empty($course_list_data['semisters'][0]) &&  in_array($spc_semister->semister,$course_list_data['semisters']))
										<tr><td>{{substr($spc_semister->semister,0,3)}}</td><td><span style="font-size:8px">{{!empty($spc_semister->app_start_date)?$spc_semister->app_start_date:'***'}}</span></td><td><span style="font-size:8px">{{!empty($spc_semister->app_end_date)?$spc_semister->app_end_date:'***'}}</span></td></tr>
										@endif
									@endforeach
								@else
									@foreach($course->spc_semisters as $spc_semister)
										<tr><td>{{substr($spc_semister->semister,0,3)}}</td><td><span style="font-size:8px">{{!empty($spc_semister->app_start_date)?$spc_semister->app_start_date:'***'}}}</span></td><td><span style="font-size:8px">{{!empty($spc_semister->app_end_date)?$spc_semister->app_end_date:'***'}}</span></td></tr>
									@endforeach
								@endif
							
							@elseif(!empty($course->university))						
								
								@if(!empty($course->university->semisters->count()))
									@if(!empty($course_list_data['semisters'][0]))
										@foreach($course->university->semisters as $semister)
											@if(!empty($course_list_data['semisters'][0]) &&  in_array($semister->semister,$course_list_data['semisters']))
												<tr><td>{{substr($semister->semister,0,3)}}</td><td><span style="font-size:8px">{{!empty($semister->app_start_date)?$semister->app_start_date:'***'}}</span></td><td><span style="font-size:8px">{{!empty($semister->app_end_date)?$semister->app_end_date:'***'}}</span></td></tr>
											@endif
										@endforeach
									@else
										@foreach($course->university->semisters as $semister)
											<tr><td>{{substr($semister->semister,0,3)}}</td><td><span style="font-size:8px">{{!empty($semister->app_start_date)?$semister->app_start_date:'***'}}</span></td><td><span style="font-size:8px">{{!empty($semister->app_end_date)?$semister->app_end_date:'***'}}</span></td></tr>
										@endforeach
									@endif
									
								@endif
								
						@else
							<tr><td colspan="3"><h6 class=" text-primary small" >Nod data present!</h6><td></tr>
						@endif	
					
				</table>
			</td>
			<td colspan="2">						
				<table class="table table-bordered"><tr>
					@if(!empty($course->branch_specialization_requirements)) 
						@foreach($course->branch_specialization_requirements as $id=>$branch_specialization_requirement) 
						
						<td>{{$branch_specialization_requirement->requirement->requirement}}</td> <td><span style="color:red">{{$branch_specialization_requirement->score}}</span> </td>
						@endforeach 
					@else 
						<tr><td class="4">***</td></tr> 
					@endif
					</tr>
					
				</table>	
			</td>
			
		</tr>			
		
	</tbody>
</table>