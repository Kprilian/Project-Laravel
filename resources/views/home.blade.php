@extends('layouts.app')
@section('title','Home - EduFun')
@section('content')
<div class="row g-4">
  <div class="col-lg-8">
    <div class="mb-4"><img src="https://picsum.photos/1200/420" class="w-100 hero shadow-sm"></div>
    <h4>Latest Courses</h4>
    @foreach($latest as $course)
      <div class="card mb-3 shadow-sm">
        <div class="row g-0">
          <div class="col-md-4"><img src="{{ $course->image }}" class="img-fluid rounded-start"></div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $course->title }}</h5>
              <p class="card-text card-excerpt text-muted">{{ $course->description }}</p>
              <p class="card-text"><small class="text-muted">By {{ $course->writer->name }} • {{ \Carbon\Carbon::parse($course->published_at)->format('d M Y') }}</small></p>
              <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-primary btn-sm">Read</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <aside class="col-lg-4">
    <div class="card mb-3 p-3 shadow-sm">
      <h6>Top Popular</h6>
      <ul class="list-group list-group-flush">
        @foreach(\App\Models\Course::orderBy('views','desc')->take(5)->get() as $p)
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div><a href="{{ route('courses.show', $p->slug) }}" class="text-decoration-none">{{ Str::limit($p->title,40) }}</a><div class="small text-muted">by {{ $p->writer->name }}</div></div>
            <span class="badge bg-secondary rounded-pill">{{ $p->views }}</span>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="card shadow-sm p-3"><h6>About EduFun</h6><p class="small text-muted mb-0">Demo Laravel + Bootstrap project.</p></div>
  </aside>
</div>
@endsection
