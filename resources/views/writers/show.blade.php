@extends('layouts.app')

@section('title', 'Writer: ' . ($writer->name ?? 'Writer'))

@section('content')
<div class="container mt-4">
  <a href="{{ route('writers.index') }}" class="btn btn-secondary mb-3">← Back to Writers</a>

  <div class="card mb-4 shadow-sm p-3">
    <h3>{{ $writer->name }}</h3>
    <p class="text-muted small">{{ $writer->bio }}</p>
  </div>

  <h4>Courses by {{ $writer->name }}</h4>

  @if ($courses->count() === 0)
    <div class="alert alert-info">No courses found for this writer.</div>
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
              <p class="small text-muted">Category: {{ $course->category->name ?? '-' }}</p>
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
