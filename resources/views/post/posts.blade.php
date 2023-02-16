@extends('layouts.main')

@section('container')

<h1 class="mb-5 text-center">{{ $title }}</h1>

@if ($posts->count())
    
      <div class="card mb-3">
        @if ($posts[0]->image)
        <div style="max-height: 450px; overflow: hidden;">
            <img src="{{ asset('storage/'. $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        </div>
        @else
            
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        
        @endif

        <div class="card-body text-center">
          <h3 class="card-title"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            <small class="text-muted"> <p>By. <a href="/authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a href="/categories/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>  </p></small>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            

            <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
      </div>


      <div class="row">

      @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="position-absolute px-3 py-2" style="background-color:rgba(0,0,0,0.7) "><a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
          @if ($post->image)      
              
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
          @else
              
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
          @endif
          
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <small class="text-muted"> <p>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }} </p></small>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more...</a>
          </div>
        </div>
    </div>
      @endforeach
     


      </div> <!-- end row -->



@else
    <p class="text-center fs-4">No post found.</p>
@endif
    

    
@endsection