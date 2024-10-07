@extends('layouts.authapp')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Section') }}
					<a class="pull-right" href="{{route('sections.index')}}"><i class="fa fa-arrow-left"></i></a>
				</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sections.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="exam_id" class="col-md-4 col-form-label text-md-end">{{ __('Exam') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" name="exam_id" id="exampleFormControlSelect1">
								@forelse($exams as $key=>$value)
								  <option value="{{$key}}">{{$value}}</option>								  
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
                                <input id="section" type="text" class="form-control @error('section') is-invalid @enderror" name="section" value="{{ old('section') }}" autocomplete="section" autofocus>

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
                                <input type="Time" class="form-control @error('exam_time') is-invalid @enderror" name="exam_time" value="{{ old('exam_time') }}" autocomplete="exam_time" autofocus>
                             @error('exam_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>	
						
						<div class="row mb-3">
                            <label for="num_of_questions" class="col-md-4 col-form-label text-md-end">{{ __('Number of Questions') }}</label>

                            <div class="col-md-6">
                                <input id="num_of_questions" type="text" class="form-control @error('num_of_questions') is-invalid @enderror" name="num_of_questions" value="{{ old('num_of_questions') }}" autocomplete="num_of_questions" autofocus>

                                @error('num_of_questions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
							
						<div class="row mb-3">
                            <label for="num_of_sub_sections" class="col-md-4 col-form-label text-md-end">{{ __('Number of Sub Sections') }}</label>

                            <div class="col-md-6">
                                <input id="num_of_sub_sections" type="text" class="form-control @error('num_of_sub_sections') is-invalid @enderror" name="num_of_sub_sections" value="{{ old('num_of_sub_sections') }}" autocomplete="num_of_sub_sections" autofocus>

                                @error('num_of_sub_sections')
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
