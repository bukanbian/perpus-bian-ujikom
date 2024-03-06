<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('blog',
        [
            "title" => "All Book" . $title,
            "active" => "posts",
            "posts" => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
            // "posts" => Post::all()
        ]);

    }
    public function show(Post $post)  {
        return view('post',[
            "title" => "single Book",
            "active" => "posts",
            "post" => $post,
        ]);
    }
}
