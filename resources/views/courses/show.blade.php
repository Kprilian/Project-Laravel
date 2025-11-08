@extends('layouts.app')
@section('title',$course->title)
@section('content')
<div class="container mt-4">
  <a href="{{ route('courses.index') }}" class="btn btn-secondary mb-3">← Kembali</a>
  <div class="card shadow-sm p-4">
    <h2>{{ $course->title }}</h2>
    <p class="text-muted">Kategori: {{ $course->category->name }} | Penulis: {{ $course->writer->name }} | Views: {{ $course->views }}</p>
    @if($course->image)<img src="{{ $course->image }}" class="img-fluid rounded mb-3">@endif
    <p class="lead">{{ $course->description }}</p>
    <div>{!! nl2br(e($course->content)) !!}</div>
  </div>
</div>
@endsection
