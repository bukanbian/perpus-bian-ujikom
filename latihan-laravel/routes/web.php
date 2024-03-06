<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PrintPostController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\BooksupController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->middleware('auth');
Route::get('/about',[AboutController::class,'index']);


Route::get('/blog', [PostController::class, 'index']);
Route::get('/pinjam/{post:slug}', [BookController::class, 'index'])->middleware('auth');
//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories',function(){
    return view('categories',[
        'title' => 'Book Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');

Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');

Route::post('/register',[RegisterController::class,'store']);

Route::get('/dashboard',function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/Books',BooksupController::class)->middleware('auth');
Route::resource('/dashboard/posts',DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware('is_admin');

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::get('/dashboard/print',[PrintPostController::class,'index'])->middleware('is_admin');
Route::post('/pinjam/create/',[BookController::class,'store'])->middleware('is_user');
Route::post('/dashboard/book/{{post}}/edit',[BookController::class,'update'])->middleware('is_admin');
