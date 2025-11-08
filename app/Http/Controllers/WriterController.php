<?php

namespace App\Http\Controllers;

use App\Models\Writer;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::all();
        return view('writers.index', compact('writers'));
    }

    public function show($id)
    {
        $writer = Writer::findOrFail($id);
        $courses = $writer->courses()->with('category')->paginate(6);
        return view('writers.show', compact('writer','courses'));
    }
}
