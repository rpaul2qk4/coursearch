@extends('layouts.auth_app')
@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{route('home')}}" class="no-decoration">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('add_clients.index')}}" class="no-decoration">Client Adds</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">
		Edit <span class="text-danger">{{$add_client->add_client}}</span> Add
	</li>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Client') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add_clients.update',$add_client->id) }}" file="true" enctype="multipart/form-data">
                        @csrf
              						
						<div class="row mb-3">
                            <label for="add_client" class="col-md-4 col-form-label text-md-end">{{ __('Client') }}</label>

                            <div class="col-md-6">
                                <input id="add_client" type="text" class="form-control @error('add_client') is-invalid @enderror" name="add_client" value="{{ old('add_client',$add_client->add_client) }}" autocomplete="add_client" autofocus>

                                @error('add_client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{$add_client->description}}</textarea>
                             @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>	
						
						<div class="row mb-3">
                            <label for="max_adds" class="col-md-4 col-form-label text-md-end">{{ __('Max Adds') }}</label>

                            <div class="col-md-6">
                                <input id="max_adds" type="number" class="form-control @error('max_adds') is-invalid @enderror" name="max_adds" value="{{ old('max_adds',$add_client->max_adds) }}" autocomplete="max_adds" autofocus>

                                @error('max_adds')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="advertisements" class="col-md-4 col-form-label text-md-end">{{ __('Advertisements') }}</label>

                            <div class="col-md-6">
                                <input id="image_upload" type="file" class="form-control" name="advertisements[]" multiple />

                                @error('advertisements')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>	
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="submit" type="submit" class="btn btn-primary">
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
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
$(function() {
// Define maximum number of files.
//alert('sss');
  var max_file_number = <?php echo $add_client->max_adds;?>,
      // Define your form id or class or just tag.
      $form = $('form'),
      // Define your upload field class or id or tag.
      $file_upload = $('#image_upload', $form),
      // Define your submit class or id or tag.
      $button = $('#submit', $form);

  // Disable submit button on page ready.
  $button.prop('', '');

  $file_upload.on('change', function () {
    var number_of_images = $(this)[0].files.length;
    if (number_of_images > max_file_number) {
      alert(`You can upload maximum ${max_file_number} files.`);
      $(this).val('');
      $button.prop('', '');
    } else {
      $button.prop('', false);
    }
  });
});
</script>
@endsection
