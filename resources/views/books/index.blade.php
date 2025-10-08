@extends('layouts.app')
@section('content')
  <div class="row" style="align-items:center;justify-content:space-between">
    <h2 style="margin:0">Libros</h2>
    <input id="q" placeholder="Buscar título/autor/año..." />
  </div>
  <div style="overflow:auto;margin-top:1rem">
    <table id="tbl">
      <thead>
        <tr>
          <th>Título</th>
          <th>ISBN</th>
          <th>Año</th>
          <th>Páginas</th>
          <th>En stock</th>
          <th>Autores</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
  @push('scripts')
    <script>
      async function loadBooks(q = '') {
        const resp = await fetch(`/api/v1/books${q ? `?q=${encodeURIComponent(q)}` : ''}`);
        const data = await resp.json();
        const items = data.data ?? data;

        const tbody = document.querySelector('#tbl tbody');
        tbody.innerHTML = '';

        items.forEach(b => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
              <td>${b.title}</td>
              <td>${b.isbn ?? ''}</td>
              <td>${b.published ?? ''}</td>
              <td>${b.pages ?? ''}</td>
              <td>${b.stock ?? 0}</td>
              <td>${(b.authors || []).map(a => a.firstName + ' ' + a.lastName).join(', ')}</td>
            `;
          tbody.appendChild(tr);
        });
      }
      document.getElementById('q').addEventListener('input', (e) => loadBooks(e.target.value));
      loadBooks();
    </script>
  @endpush
@endsection