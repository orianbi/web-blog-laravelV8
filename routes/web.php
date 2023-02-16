<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterContoroller;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('categories/{category:slug}', [CategoryController::class, 'show']);

Route::get('authors/{author:username}', function(User $author){

    return view('post.posts',[
        'title' => "Post By Authors : $author->name",
        'posts' => $author->posts->load('category','author')
    ]);
});

Route::get('/about', function () {
    return view('about',[
        'title' => 'About Me'
    ]);
});
    
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterContoroller::class, 'index'])->middleware('guest');
Route::post('register', [RegisterContoroller::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index',[
            'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/dashboard/posts', DashboardPostController::class);
});

Route::group(['middleware' => ['auth','admin']], function(){

    
    Route::get('/dashboard/categories/checkSlugCategory', [DashboardCategoryController::class, 'checkSlugCategory']);
    Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show');
});
// Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('admin');

