	@if(count($errors))
	<div class="form-group ">
		
			<div class="alert alert-danger">
				<UL>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach

				</UL>

			</div>
			  
	</div>
	@endif	