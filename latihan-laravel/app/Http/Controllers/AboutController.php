<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            "title" => "about",
            "name" => "Syahrul Abrian Ramadhan",
            "email" => "sahrulabrian@gmail.com",
            "active" => "about",
            "image" => "freya.jpg"
        ]);
    }
}
