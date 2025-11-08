@extends('layouts.app')
@section('title','Popular Courses')
@section('content')
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Popular Courses</h3>
    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary btn-sm">All Courses</a>
  </div>

  @if($popular->count()===0)
    <div class="alert alert-info">Belum ada course.</div>
  @else
    <div class="row">
      @foreach($popular as $course)
        <div class="col-md-6 mb-4">
          <div class="card h-100 shadow-sm">
            @if($course->image)<img src="{{ $course->image }}" class="card-img-top">@endif
            <div class="card-body d-flex flex-column">
              <h5><a href="{{ route('courses.show', $course->slug) }}" class="text-decoration-none text-dark">{{ $course->title }}</a></h5>
              <p class="small text-muted mb-1">Kategori: {{ $course->category->name ?? '-' }} • Penulis: {{ $course->writer->name ?? '-' }}</p>
              <p class="mb-2 text-muted">{{ Str::limit($course->description,120) }}</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <small class="text-muted">{{ $course->views }} views</small>
                <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-sm btn-primary">Detail</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-center">
      {{ $popular->links() }}
    </div>
  @endif
</div>
@endsection
