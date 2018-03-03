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
<a href="/posts/create" class="btn btn-primary col-12">+new post</a>
	<div class="col-sm-8">
		

		@foreach ($posts as $post)
	    <div class="col-md-12">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">World</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="/posts/{{ $post->id}}">{{ $post->title }}</a>
              </h3>
              <div class="mb-1 text-muted">{{ $post->created_at->toFormattedDateString() ." by ".$post->user['name']}}</div>
              <p class="card-text mb-auto" style="height: 50px; overflow: hidden">{{ $post->body }}</p>
              <a href="/posts/{{ $post->id}}">Continue reading</a>
            </div>
            <a href="/images/{{ $post->image}}" download="{{ $post->image_title }}"><img src="images/{{ $post->image}}" class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap" height="200" width="250"></a>
          </div>
        </div>    
	@endforeach
	

</div>
@endsection