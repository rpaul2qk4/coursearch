@extends('layouts.authapp')

@section('bar-content')
<div class="container mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('sections.show',['section'=>$task->section_id])}}">Sections</a></li>
    <li class="breadcrumb-item active  text-white" aria-current="page">Task</li>
  </ol>
</nav>
</div>
@endsection
@section('content')
<div class="container">
@include('common.flash')
<div class="row">
  <div class="col-sm-6" @if($task->sub_tasks->count()==8) hidden @endif>
    <div class="card">
      <div class="card-header">
        Prepare the Sub Tasks for <span class="text-danger">{{ $task->task }}</span>
		</div>
     	<div class="card-body">
			<form method="POST" action="{{ route('sub_tasks.store') }}">
			@csrf
				<p class="card-text">
				<input class="form-control" name="task_id" value="{{old('task_id',$task->id)}}" hidden />
						
				
				<div class="row mb-3">
					<label for="sub_task" class="col-md-4 col-form-label text-md-end">{{ __('Sub Task') }}</label>
					 <div class="col-md-6">
						<input class="form-control" name="sub_task" value="{{old('sub_task')}}"  />
				
						 @error('sub_task')
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
				</p>
			</form>		
      </div>
    </div>
  </div>
  <div class="@if($task->sub_tasks->count()==8) col-sm-12 @else col-sm-6 @endif ">
    <div class="card">
	  <div class="card-header">
       <span class="text-danger">{{ $task->task }}</span> &nbsp;<span class="text-danger1">{{ __(' Sub Tasks') }}</span>
		</div>
      <div class="card-body">
       <table class="table table-striped">
						<thead>
							<tr>						
								<td>Sub Task</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@forelse($task->sub_tasks as $sub_task)
							<tr>
							
								<td><a href="{{route('sub_tasks.show',$sub_task)}}">{{$sub_task->sub_task}}</a></td>
								<td>
								
									<a href="{{route('sub_tasks.edit',$sub_task)}}"><i class="fa fa-edit"></i><a>&nbsp;&nbsp;
									<a href="{{route('sub_tasks.delete',$sub_task)}}"><i class="fa fa-trash text-danger"></i><a>
									
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
