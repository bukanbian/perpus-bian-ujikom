<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\rent;
use App\Models\User;
use App\Models\Kelas;
use App\Models\tb_jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Post $post)
    {
        return view('pinjam.index',[
            'title' => 'Pinjam buku',
            'active' => '',
            'post' => $post,
            'user' => User::where('id',auth()->user()->id)->get(),
            'jurusan' => tb_jurusan::all(),
            'kelas' => Kelas::all(),
            'tanggal' => Carbon::now()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'BukuID' => 'required|max:255',
            'date_rent' => 'required',
            'date_back' => 'required',
        ]);


        $validatedData['UserID'] = Auth::user()->id;

        DB::transaction(function () use ($request) {
            // DB::table('rents')->update(['actually_date'=> Carbon::now()]);
            // DB::table('posts')->update(['status'=> 'in stock']);


            post::where("id", $request->BukuID)->update([
                "status" => 'not avaible',
            ]);
        });
        rent::create($validatedData);

        return redirect('/dashboard')->with('success','New book has been rent!');



    }


    public function update(Request $request, post $post)
    {
        $rules = [
            'status' => 'required|max:255',
            'actually_date' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);

        Post::where('id', $post->id)
            ->update($validatedData);
        rent::where('id', $post->rent_book->BukuID)
            ->update($validatedData);


        return redirect('/dashboard/posts')->with('success','Book has been edited!');
    }
}
