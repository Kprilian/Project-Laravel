@extends('layouts.app')

@section('title', 'Category: ' . ($category->name ?? 'Category'))

@section('content')
<div class="container mt-4">
  <a href="{{ route('category.index') }}" class="btn btn-secondary mb-3">← Back to Categories</a>

  <div class="card mb-4 shadow-sm p-3">
    <h3>{{ $category->name }}</h3>
    <p class="text-muted small">Total courses: {{ $category->courses()->count() }}</p>
  </div>

  <h4>Courses in {{ $category->name }}</h4>

  @if ($courses->count() === 0)
    <div class="alert alert-info">No courses in this category.</div>
  @else
    <div class="row">
      @foreach($courses as $course)
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            @if($course->image)
              <img src="{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
            @endif
            <div class="card-body">
              <h5 class="card-title">
                <a href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
              </h5>
              <p class="small text-muted">By {{ $course->writer->name ?? '-' }}</p>
              <p class="text-muted">{{ \Illuminate\Support\Str::limit($course->description, 120) }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-center">
      {{ $courses->links() }}
    </div>
  @endif
</div>
@endsection
