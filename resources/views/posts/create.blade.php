@extends('partials.master')
@section('content')
	
<div class="col-sm-8">
		<form  method="POST" action="/posts" enctype="multipart/form-data" >
			{{ csrf_field() }}
		  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		    <label for="title">title</label>
		    <input type="text" name="title" class="form-control " id="title" placeholder="Enter Title" value="{{ old('title') }}" required>
		    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
		  </div>

		  <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
		    <label for="body">body</label>
		    <textarea name="body" class="form-control  " id="body"  placeholder="Explain Here" required>{{ old('body') }}</textarea>

		  </div>
 		<div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
		    <label for="title">Tag</label>
		      <input type="text" name="tag" class="form-control tags " id="title" placeholder="Enter Tag" value="{{ old('tag') }}" required>
		  </div>
 	 <div class="form-group ">
		<input type="file" name="image" id="fileToUpload">
   
		</div> 
	<div class="form-group ">
		  <button type="submit" class="btn btn-primary">Submit</button>
		</div>
		</form>
			
		@include('partials.errors')
</div>
@endsection
 