<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['category','writer'])->orderBy('published_at','desc')->paginate(6);
        return view('courses.index', compact('courses'));
    }

    public function show($slug)
    {
        $course = Course::with(['category','writer'])->where('slug',$slug)->firstOrFail();
        $course->increment('views');
        return view('courses.show', compact('course'));
    }

    public function create()
    {
        $categories = Category::all();
        $writers = Writer::all();
        return view('courses.create', compact('categories','writers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required|exists:categories,id',
            'writer_id'=>'required|exists:writers,id',
            'description'=>'nullable|string',
            'content'=>'nullable|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses','public');
            $validated['image'] = '/storage/'.$path;
        }

        $validated['slug'] = Str::slug($validated['title']).'-'.rand(100,999);
        $validated['published_at'] = now();

        Course::create($validated);

        return redirect()->route('courses.index')->with('success','Course berhasil ditambahkan!');
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        $writers = Writer::all();
        return view('courses.edit', compact('course','categories','writers'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required|exists:categories,id',
            'writer_id'=>'required|exists:writers,id',
            'description'=>'nullable|string',
            'content'=>'nullable|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses','public');
            $validated['image'] = '/storage/'.$path;
        }

        $course->update($validated);

        return redirect()->route('courses.index')->with('success','Course berhasil diperbarui!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success','Course berhasil dihapus!');
    }

    // Popular method (challenge)
    public function popular(Request $request)
    {
        $popular = Course::with(['category','writer'])->orderBy('views','desc')->paginate(3)->withQueryString();
        return view('courses.popular', compact('popular'));
    }
}
