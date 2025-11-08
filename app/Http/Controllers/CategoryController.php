<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail();
        $courses = $category->courses()->with('writer')->paginate(6);
        return view('category.show', compact('category','courses'));
    }
}
