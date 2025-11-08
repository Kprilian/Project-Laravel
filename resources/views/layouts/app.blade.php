<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','EduFun')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{background:#f8f9fa}
    .hero{height:320px;object-fit:cover;border-radius:.5rem}
    .card-excerpt{max-height:5.2rem;overflow:hidden;text-overflow:ellipsis}
  </style>
</head>
<body>
  @include('partials.navbar')
  <main class="container my-4">
    @yield('content')
  </main>
  <footer class="bg-white border-top mt-5">
    <div class="container text-center py-3"><small>© {{ date('Y') }} EduFun</small></div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
