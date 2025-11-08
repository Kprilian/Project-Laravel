<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $latest = Course::with('writer','category')->orderBy('published_at','desc')->take(5)->get();
        return view('home', compact('latest'));
    }
}
