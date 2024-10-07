

<!-- Modal -->
<div class="modal fade" id="bankLoanModal{{$bnkln->id}}" tabindex="-1" aria-labelledby="bankLoanModalLabel{{$bnkln->id}}" aria-hidden="true">
	<div class="modal-dialog modal-xl12">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="bankLoanModalLabel{{$bnkln->id}}">{{$bank_loan->bank_name}} required the documents below</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row1 row-cols-1 row-cols-md-3 g-4">
				<ol>
					@foreach($bank_loan->req_docs as $req_doc)
						<li>{{$req_doc->document}}</li>
					@endforeach  
				</ol>	
					<!-- 
						@foreach($bank_loan->req_docs as $req_doc)			
							<div class="col">				
								<div class="card">
								@if(in_array($req_doc->doc_type,['jpg','jpeg']))
									<iframe src="{{ asset('uploads/'.$req_doc->document) }}" width="100%" height="200px"></iframe>
								@endif
								@if(in_array($req_doc->doc_type,['pdf']))
									<iframe src="{{ asset('uploads/'.$req_doc->document) }}" width="100%" height="200px"></iframe>
								@endif
								  <div class="card-body">
									<h5 class="card-title">{!! $req_doc->document !!}</h5>
									 <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
								  </div>
								</div>
							</div>	
						@endforeach  
					-->
				</div>	   
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>