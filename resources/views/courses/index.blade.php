@extends('layouts.app')
@section('title','Courses')
@section('content')
<div class="container mt-4">
  <h2 class="mb-3">Daftar Courses</h2>
  <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">+ Tambah Course</a>
  <div class="row">
    @foreach($courses as $course)
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          @if($course->image)<img src="{{ $course->image }}" class="card-img-top">@endif
          <div class="card-body">
            <h5>{{ $course->title }}</h5>
            <p class="small text-muted">Kategori: {{ $course->category->name }} • Penulis: {{ $course->writer->name }}</p>
            <p>{{ Str::limit($course->description,80) }}</p>
            <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-outline-primary btn-sm">Detail</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{ $courses->links() }}
</div>
@endsection
