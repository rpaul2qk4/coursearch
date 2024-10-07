@extends('layouts.authapp')

@section('content')
<div class="container">
@include('common.flash')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('List of Sections') }}
					<a class="pull-right" href="{{route('sections.create')}}"><i class="fa fa-plus"></i></a>
				</div>
                <div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<td>Exam</td>
								<td>Section</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@forelse($sections as $section)
							<tr>
								<td>{{$section->exam->exam}}</td>
								<td>{{$section->section}}</td>
								<td>
								
									<a href="{{route('sections.show',$section)}}"><i class="fa fa-eye"></i><a>&nbsp;&nbsp;
									<a href="{{route('sections.edit',$section)}}"><i class="fa fa-edit"></i><a>&nbsp;&nbsp;
									<a href="{{route('sections.delete',$section)}}" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i class="fa fa-trash text-danger"></i><a>
									
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
