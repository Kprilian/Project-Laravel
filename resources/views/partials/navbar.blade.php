<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">EduFun</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('writers.index') }}">Writers</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('courses.popular') }}">Popular</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
      </ul>
    </div>
  </div>
</nav>
