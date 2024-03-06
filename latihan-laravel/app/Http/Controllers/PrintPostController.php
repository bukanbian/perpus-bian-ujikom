<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PrintPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.print',[
            'posts' => Post::where('user_id',auth()->user()->id)->get()
        ]);
    }
}
