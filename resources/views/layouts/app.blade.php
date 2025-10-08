<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biblioteca</title>
  @vite('resources/css/app.css')
  <style>
    body{font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Helvetica, Arial, sans-serif; background:#0b0f14; color:#e6edf3;}
    a{color:#7aa2f7} input,select,button{background:#111827;color:#e6edf3;border:1px solid #374151;border-radius:8px;padding:.5rem .75rem}
    table{width:100%;border-collapse: collapse;} th,td{padding:.5rem;border-bottom:1px solid #30363d} th{text-align:left;color:#9ca3af}
    .container{max-width:1000px;margin:2rem auto;padding:0 1rem}
    .card{background:#0d1117;border:1px solid #30363d;border-radius:12px;padding:1rem}
    .row{display:flex;gap:1rem;flex-wrap:wrap}
  </style>
</head>
<body>
  <div class="container">
    <div class="row" style="justify-content:space-between;align-items:center">
      <h1 style="margin:0">📚 Biblioteca</h1>
      <nav style="display:flex;gap:.75rem">
        <a href="{{ url('/books') }}">Libros</a>
        <a href="{{ url('/loans/new') }}">Nuevo préstamo</a>
        <a href="{{ url('/dashboard') }}">Dashboard</a>
      </nav>
    </div>
    <div class="card" style="margin-top:1rem">
      @yield('content')
    </div>
  </div>
  @vite('resources/js/app.js')
  @stack('scripts')
</body>
</html>
