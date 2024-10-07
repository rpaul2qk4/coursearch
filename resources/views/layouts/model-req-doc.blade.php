

<!-- Modal -->
<div class="modal fade" id="recDocModal{{$req_doc->id}}" tabindex="-1" aria-labelledby="recDocModalLabel{{$req_doc->id}}" aria-hidden="true">
	<div class="modal-dialog modal-xl12">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="recDocModalLabel{{$req_doc->id}}">Update <span style="color:red">{{$req_doc->document}}</span> document below</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST" action="{{ route('req_docs.update',$req_doc->id) }}" file="true" enctype="multipart/form-data">
                @csrf
				
				<div class="modal-body">
					<div class="row col-md-12 mb-3">
							<label for="document1" class="col-md-4 col-form-label text-md-end">{{ __('Document') }}</label>

							<div class="col-md-6">
								<input id="document" type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document',$req_doc->document) }}" required autocomplete="document" autofocus>

								@error('document')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							
						</div>				
				</div>
				
				<div class="modal-footer">
					<button type="submit" id="reqDoc{{$req_doc->id}}" class="btn btn-primary">Update</button> 
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>				
				</div>
				
			</form>
		</div>
	</div>
</div>