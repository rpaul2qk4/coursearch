@extends('layouts.auth_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}
					<a class="pull-right" href="{{route('universities.index')}}"><i class="fa fa-arrow-left"></i></a>
				</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('universities.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="university" class="col-md-4 col-form-label text-md-end">{{ __('University') }}</label>

                            <div class="col-md-6">
                                <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" required autocomplete="university" autofocus>

                                @error('university')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="code" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code">

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date">

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="apply_deadline" class="col-md-4 col-form-label text-md-end">{{ __('Apply Deadline') }}</label>

                            <div class="col-md-6">
                                <input id="apply_deadline" type="date" class="form-control @error('apply_deadline') is-invalid @enderror" name="apply_deadline" value="{{ old('apply_deadline') }}" required autocomplete="apply_deadline">

                                @error('apply_deadline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="acceptance_rate" class="col-md-4 col-form-label text-md-end">{{ __('Acceptance Rate') }}</label>

                            <div class="col-md-6">
                                <input id="acceptance_rate" type="text" class="form-control @error('acceptance_rate') is-invalid @enderror" name="acceptance_rate" value="{{ old('acceptance_rate') }}" required autocomplete="acceptance_rate">

                                @error('acceptance_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="gpa_req_rate" class="col-md-4 col-form-label text-md-end">{{ __('GPA Required Rate') }}</label>

                            <div class="col-md-6">
                                <input id="gpa_req_rate" type="text" class="form-control @error('gpa_req_rate') is-invalid @enderror" name="gpa_req_rate" value="{{ old('gpa_req_rate') }}" required autocomplete="gpa_req_rate">
                                @error('gpa_req_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="scholorship" class="col-md-4 col-form-label text-md-end">{{ __('Scholorship') }}</label>

                            <div class="col-md-6">
                                <input id="scholorship" type="text" class="form-control @error('scholorship') is-invalid @enderror" name="scholorship" value="{{ old('scholorship') }}" required autocomplete="scholorship">
                                @error('scholorship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="duration" class="col-md-4 col-form-label text-md-end">{{ __('Duration') }}</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" required autocomplete="duration">
                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="annual_fees" class="col-md-4 col-form-label text-md-end">{{ __('Annual Fees') }}</label>

                            <div class="col-md-6">
                                <input id="annual_fees" type="text" class="form-control @error('annual_fees') is-invalid @enderror" name="annual_fees" value="{{ old('annual_fees') }}" required autocomplete="annual_fees">
                                @error('annual_fees')
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
