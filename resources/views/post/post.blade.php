@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-8">
        <h1 class="mb-3">{{ $post->title }}</h1>
        <p>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        @if ($post->image)
                            
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
        @else
            
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
        @endif
        
        <article class="my-3 fs-5">
            <p>{!! $post->body !!}</p>

           </article>
           
        <a href="/posts" class="text-decoration-none">Back to posts</a>

    </div>
</div>
    
@endsection