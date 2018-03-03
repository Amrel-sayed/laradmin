@extends('partials.master')
@section('content')


 @if ($flash=session('msg'))

 <div class="alert col-sm-12 {{ session('alert') }} alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{ $flash }}
</div>
                        
 @endif

<div class="col-sm-8">
		<form  method="POST" action="/posts/{{  $post->id }}" >
			{{ csrf_field() }}
		  <input type="hidden" name="_method" value="put">
		  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		    <label for="title">title</label>
		    <input type="text" name="title" class="form-control " id="title" placeholder="Enter Title" value="{{ $errors->has('tittle') ? old('title') : $post->title }}" required>
		    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
		  </div>

		  <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
		    <label for="body">body</label>
		    <textarea name="body" class="form-control  " id="body"  placeholder="Explain Here" required> {{ $errors->has('body') ? old('body') :$post->body }} </textarea>

		  </div>

		
 		<div class="form-group {{ $errors->has('tag') ? ' has-error' : '' }}">
		    <label for="title">Tag</label>
		      <input type="text" name="tag" class="form-control tags" id="title" placeholder="Enter Tag" 
		      value="@php
		       	if($errors->has('tag') ){ 
		       	echo old('tag') ;
		       }else{
		         $tags=$post->tags;
		  	 foreach($tags as $tag){
		       			echo $tag->name.",";
		       		}
		       	 }
		       @endphp " required>
		  </div>
 	 <div class="form-group ">
		  <button type="submit" class="btn btn-primary">Submit</button>
		</div>
		</form>
			
		@include('partials.errors')
</div>
@endsection
 