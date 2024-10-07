@extends('layouts.authapp')

@section('bar-content')
<div class="container mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('exams.show',['exam'=>$section->exam])}}">Sections</a></li>
    <li class="breadcrumb-item active  text-white" aria-current="page">Edit Section</li>
  </ol>
</nav>
</div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Section') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sections.update',$section) }}">
                        @csrf

                   
                        <div class="row mb-3" hidden>
                            <label for="exam_id" class="col-md-4 col-form-label text-md-end">{{ __('Exam') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" name="exam_id" id="exampleFormControlSelect1">
								@forelse($exams as $key=>$value)
									@if($section->exam_id==$key)
										<option value="{{$key}}" selected>{{$value}}</option>
									@else
										<option value="{{$key}}">{{$value}}</option>	
									@endif
								 @empty
								   <option>No data found</option>
								 @endforelse
								</select>
                                @error('exam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="section" class="col-md-4 col-form-label text-md-end">{{ __('Section') }}</label>

                            <div class="col-md-6">
                             	<select class="form-select" aria-label="Default select example" name="section">
									@foreach(App\Helpers\AppHelper::options('Sections') as $key=>$value)
										@if($key==$section->section)
										<option value="{{$key}}" selected>{{$value}}</option>
										@else
										<option value="{{$key}}">{{$value}}</option>
										@endif
									@endforeach							  
								</select>
                                @error('section')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="exam_time" class="col-md-4 col-form-label text-md-end">{{ __('Exam Time') }}</label>

                            <div class="col-md-6">
                                <input id="exam_time" type="number" class="form-control @error('exam_time') is-invalid @enderror" name="exam_time" value="{{ old('exam_time',$section->exam_time) }}" autocomplete="exam_time" autofocus>

                                @error('exam_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>	
							<div class="row mb-3">
                            <label for="num_of_sub_sections" class="col-md-4 col-form-label text-md-end">{{ __('Total Sub Sections') }}</label>

                            <div class="col-md-6">
                                <input id="num_of_sub_sections" type="number" class="form-control @error('num_of_sub_sections') is-invalid @enderror" name="num_of_sub_sections" value="{{ old('num_of_sub_sections',$section->num_of_sub_sections) }}" autocomplete="num_of_sub_sections" autofocus>

                                @error('num_of_sub_sections')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="num_of_questions" class="col-md-4 col-form-label text-md-end">{{ __('Number of Questions') }}</label>

                            <div class="col-md-6">
                                <input id="num_of_questions" type="text" class="form-control @error('num_of_questions') is-invalid @enderror" name="num_of_questions" value="{{ old('num_of_questions',$section->num_of_questions) }}" autocomplete="num_of_questions" autofocus>

                                @error('num_of_questions')
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
@endsection
