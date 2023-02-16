<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.categories',[
            'title' => 'All Categories',
            'categories' => $categories
        ]);
    }

    public function show(Category $category){
        return view('post.posts',[
            'title' => "Posts By Category : $category->name",
            'posts' => $category->posts->load('category', 'author')
        ]);
    }
}
