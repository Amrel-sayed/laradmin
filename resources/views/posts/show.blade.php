@extends('partials.master')

@section('content')
	<div class="col-sm-8">
		
		<h3 class="text-capitalize">{{ $posts->title }}</h3>
	
		<p class="text-danger">{{ $posts->created_at->toFormattedDateString()." by ".$posts->user->name}}</p>

		<p>{{ $posts->body }}</p>
		<ul>
			@php
				$tags=$posts->tags;
				  	foreach($tags as $tag){
		       			echo "<li>".$tag->name."</li>"; }
			@endphp
		</ul>

		<a href="/posts/{{ $posts->id }}/edit" class="btn btn-success">Edit</a>
			<form id="myform" action=" " method="POST">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
			
			</form>
			 <button type="submit" id="delete" class="btn btn-danger">Delete</button>
		<hr>
		<h3 class="text-capitalize">Comments</h3>
		<ul class="list-group">
			@forelse ($posts->comments as $comment)
				<li class="list-group-item">
				<span class="text-danger">{{ $comment->user->name .",".$comment->created_at->diffForHumans() }} :</span>
				<span>{{ $comment->body }}</span>
				</li>
			@empty
				<p class="text-capitalize text-success">{{ "there no comment for this Pos " }}</p>
			@endforelse
		</ul>
	<hr>
	@guest

		 <div class="alert alert-danger">
				<p class="text-danger"> you Must login first   <a href="login"> login</a>  <a href="register">\Reg</a> </p>

			</div>

	@else

	<form  method="POST" action="/posts/{{ $posts->id }}/comments" >
			{{ csrf_field() }}
		  <input type="hidden" name="commentable" class="form-control" value="App\posts">
		<div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
		    <label for="title">Add Comment</label>
		    <textarea name="body" class="form-control" id="body"  placeholder="Explain Here" required>{{ old('body') }}</textarea>
		    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
		  </div>
 	 	<div class="form-group ">
		  	<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
			
	@include('partials.errors')

	@endguest
</div>
@endsection