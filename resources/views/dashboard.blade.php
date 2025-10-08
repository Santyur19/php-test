@extends('layouts.app')
@section('content')

  <h2>Dashboard</h2>

  <div class="row">

    <div class="card" style="flex:1">
      <h3 style="margin-top:0">Libros sin stock</h3>
      <ul id="noStock"></ul>
    </div>

    <div class="card" style="flex:1">
      <h3 style="margin-top:0">Usuarios con préstamos activos</h3>
      <ul id="activeUsers"></ul>
    </div>
  </div>
  @push('scripts')
    <script>
      async function loadNoStock() {
        const r = await fetch('/api/v1/books?q=');

        const data = await r.json();

        const items = (data.data ?? data).filter(b => (b.stock ?? 0) <= 0);
        document.getElementById('noStock').innerHTML = items.map(b => `<li>${b.title}</li>`).join('') || '<li>Todos tienen stock</li>';
      }
      async function loadActiveUsers() {
        const r = await fetch('/api/v1/loans');

        const data = await r.json();
        const items = data.data ?? data;

        const grouped = {};

        items.forEach(l => { if (l.status !== 'devuelto') { grouped[l.user?.name || ('User#' + l.user_id)] = true; } });
        document.getElementById('activeUsers').innerHTML = Object.keys(grouped).map(n => `<li>${n}</li>`).join('') || '<li>Sin préstamos activos</li>';
      }
      loadNoStock(); loadActiveUsers();
    </script>
  @endpush
@endsection