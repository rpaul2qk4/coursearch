@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
	<button  class="btn close" aria-label="Close" data-bs-dismiss="alert">
	  <span class="h4 text-danger" aria-hidden="true">&times;</span>
	</button>
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif