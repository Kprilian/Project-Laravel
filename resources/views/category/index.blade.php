@extends('layouts.app')
@section('title','Categories')
@section('content')
<h4>Categories</h4>
<div class="row">
  @foreach($categories as $cat)
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">{{ $cat->name }}</h5>
          <p class="card-text small text-muted">Total course: {{ $cat->courses()->count() }}</p>
          <a href="{{ route('category.show', $cat->slug) }}" class="mt-auto btn btn-outline-primary btn-sm">Lihat</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
