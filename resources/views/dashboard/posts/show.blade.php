@extends('dashboard.layouts.main')

@section('container')
    
<div class="row my-3">
    <div class="col-lg-8 ">
    <h1 class="mb-3">{{ $post->title }}</h1>
    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to posts</a>
    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
     
    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
          <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
    </form>

    @if ($post->image)
        
        <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">
    @else
        
        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">
    @endif
    <article class="my-3 fs-5"> 
     <p>{!! $post->body !!}</p>

    </article>
    

    </div>
</div>

@endsection