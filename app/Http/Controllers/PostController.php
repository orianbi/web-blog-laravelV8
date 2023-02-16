<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();

        return view('post.posts',[
            'title' => 'All Posts',
            'posts' => $posts
        ]);
    }

    public function show(Post $post){
        return view('post.post',[
            'title' => 'Detail Post',
            'post' => $post
        ]);
    }
}
