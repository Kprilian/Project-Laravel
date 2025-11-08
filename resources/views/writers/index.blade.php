@extends('layouts.app')
@section('title','Writers')
@section('content')
<h4>Writers</h4>
<div class="row">
  @foreach($writers as $w)
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h5>{{ $w->name }}</h5>
          <p class="small text-muted">{{ Str::limit($w->bio,120) }}</p>
          <a href="{{ route('writers.show', $w->id) }}" class="btn btn-sm btn-primary">View</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
