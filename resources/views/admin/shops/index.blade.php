@extends('layouts.admin')

@section('main-panel')
  {{ Breadcrumbs::render('shops') }}

  <cms-table
    table-name="shops"
    search-placeholder="Nazwa lub miasto..."
    modal-text="Na pewno chcesz usunąć ten sklep z mapy?"
  >
  </cms-table>
@endsection