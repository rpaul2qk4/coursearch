@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>

	<li class="breadcrumb-item active" aria-current="page">
	<span class="text-danger">Client </span> Adds
	</li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
		@include('common.flash')
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center"><span>Clients<span class="badge bg-danger justify-content-start ml-2">{{$add_clients->count()}}</span></span>
					<a class="btn btn-primary pull-right" href="{{route('add_clients.create')}}"><i class="fa fa-plus"></i></a>
				</div>
                <div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<td>Client Name</td>
								<td>Max Adds</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@forelse($add_clients as $add_client)
							<tr>
								<td>{{$add_client->add_client}}</td>
								<td>{{$add_client->max_adds}}</td>
								<td>
								
									<a href="{{route('add_clients.show',$add_client->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
									<a href="{{route('add_clients.edit',$add_client->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<a href="{{route('add_clients.delete',$add_client->id)}}"><i class="fa fa-trash text-danger"></i></a>
									
								</td>
							</tr>
							@empty
							
							<tr>
								<td colspan="3">No data found</td>
							</tr>
							@endforelse
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
