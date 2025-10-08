@extends('layouts.app')
@section('content')
<h2>Nuevo préstamo</h2>
<form id="loanForm" class="row">
  <div style="flex:1;min-width:220px">
    <label>Usuario</label>
    <select id="user"></select>
  </div>
  <div style="flex:1;min-width:220px">
    <label>Libro</label>
    <select id="book"></select>
  </div>
  <div style="flex:1;min-width:220px">
    <label>Fecha devolución estimada</label>
    <input type="date" id="due" />
  </div>
  <div style="display:flex;align-items:flex-end">
    <button type="submit">Crear préstamo</button>
  </div>
</form>
<p id="msg"></p>
@push('scripts')
<script>
async function loadUsers(){
  const r = await fetch('/api/v1/users');
  const data = await r.json();
  const items = data.data ?? data;
  const sel = document.getElementById('user');
  sel.innerHTML = items.map(u=>`<option value="${u.id}">${u.name} (${u.email})</option>`).join('');
}
async function loadBooks(){
  const r = await fetch('/api/v1/books');
  const data = await r.json();
  const items = data.data ?? data;
  const sel = document.getElementById('book');
  sel.innerHTML = items.map(b=>`<option value="${b.id}">${b.title}</option>`).join('');
}
document.getElementById('loanForm').addEventListener('submit', async (e)=>{
  e.preventDefault();
  const payload = { user_id: +document.getElementById('user').value, book_id: +document.getElementById('book').value, stimated_delivery_date: document.getElementById('due').value };
  const r = await fetch('/api/v1/loans', { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify(payload) });
  const ok = r.ok;
  const msg = document.getElementById('msg');
  if(ok){ msg.textContent = '✅ Préstamo creado'; document.getElementById('loanForm').reset(); }
  else { const j = await r.json().catch(()=>({})); msg.textContent = '❌ Error: ' + (j.message || r.statusText); }
});
loadUsers(); loadBooks();
</script>
@endpush
@endsection
