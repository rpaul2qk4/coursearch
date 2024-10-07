@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		<span class="text-danger">Banks</span> List for loans
	</li>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Banks<span class="badge bg-danger justify-content-start ml-2">{{$bank_loans->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('bank_loans.create')}}"><i class="fa fa-plus"></i></a>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped">
						            <input type="text" id="myInput" style="width:25%" class="form-control pull-right mr-3" placeholder="Search">
      
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th>Bank</th>
									<th>Docs Type</th>
									<th>Docs Submitted</th>
									<th>Country</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php $sno=1;?>
							<tbody id="myTable">
								@forelse($bank_loans as $bank_loan)
									<tr>
										<td class="text-center">{{$sno++}}</td>
										<td><a href="#" style="text-decoration:none">{{$bank_loan->bank_name}}</a></td>
										<td><a href="#" style="text-decoration:none">{{$bank_loan->docs_type}}</a></td>
										<td><a href="#" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#bankLoanModal{{$bank_loan->id}}">@if(!empty($bank_loan->req_docs) && $bank_loan->req_docs->count()) <span class="text-success">{{$bank_loan->req_docs->count()}} types of docs required </span> @else <span class="text-danger">not required</span> @endif</a></td>
										<td><a href="#" style="text-decoration:none">{{$bank_loan->country->country}}</a></td>
										<td class="text-center">
											<a class="" href="{{route('bank_loans.show',$bank_loan->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp; 
											<a class="" href="{{route('bank_loans.edit',$bank_loan->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
											<a class="" href="{{route('bank_loans.delete',$bank_loan->id)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
										</td>
									</tr>									
									
									@include('layouts.model-view',['bnkln'=>$bank_loan])
									
								@empty
									<tr><td colspan="6">No data found!</td></tr>
								@endforelse	
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() { 
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });
	});
</script>
@endsection
