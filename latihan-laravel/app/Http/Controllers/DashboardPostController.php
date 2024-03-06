<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Post;
use App\Models\Category;
use App\Models\rent;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id',auth()->user()->id)->get(),
            'post' => Post::all(),
            'books' => rent::where('UserID',auth()->user()->id)->get(),
            'book' => rent::where('UserID',auth()->user()->id)->first(),
            'book_r' => rent::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' =>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'Published_at' => 'required|max:255',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }


        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100 ,'...');

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success','New book has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' =>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];


        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100 ,'...');

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success','Post has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success','New post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }

    public function print()
    {
        return view('dashboard.posts.print',[
            'posts' => Post::where('user_id',auth()->user()->id)->get()
        ]);
    }
}
