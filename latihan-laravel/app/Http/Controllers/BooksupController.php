<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'status' => 'required|max:255',
            'actually_date' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);

        // Post::where('id', $post->id)
        //     ->update($validatedData);
        // rent::where('id', $post->rent_book->BukuID)
        //     ->update($validatedData);

        DB::transaction(function () use ($request) {
            // DB::table('rents')->update(['actually_date'=> Carbon::now()]);
            // DB::table('posts')->update(['status'=> 'in stock']);

            rent::where("id", $request->id)->update([
                "actually_date" => Carbon::now(),
               ]);

               post::where("id", $request->BukuID)->update([
                   "status" => 'in stock',
                  ]);
        });

        return redirect('/dashboard/posts')->with('success','Book has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
