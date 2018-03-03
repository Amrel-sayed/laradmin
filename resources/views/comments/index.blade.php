@extends('partials.master')
@section('content')
<div class="col-sm-8">
{{-- 	@if (!is_array($comments))
	
		<h3><a href="/posts/{{ $comments->posts->id}}">{{ $comments->posts->title }}</a></h3>
		<p class="text-danger">{{ $comments->created_at->toFormattedDateString() ." by ".$comments->user->name }}</p>
		<p>{{ $comments->body }}</p>

		<hr>
	@else --}}	


	@foreach ($comments as $comment)

 	@php
		$post=App\posts::find($comment[0]['posts_id']);
		
	@endphp
		<h3><a href="/posts/{{ $post['id'] }}">{{$post['title']}}</a></h3>
		@foreach ($comment as $com)
			
			{{-- <h3>{{ $comment->posts['user']['name']}}</h3> --}}
		<p class="text-danger">{{ $com->created_at->toFormattedDateString()  }}</p>
		<p>{{ $com->body }}</p>
		@endforeach
		
		

		<hr>
	@endforeach
	{{-- @endif --}}
</div>


@endsection