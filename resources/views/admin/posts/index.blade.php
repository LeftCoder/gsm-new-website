@extends('layouts.admin')

@section('main-panel')
  {{ Breadcrumbs::render('posts') }}

  <cms-table
    table-name="posts"
    search-placeholder="Wyszukaj tytuł..."
    modal-text="Na pewno chcesz usunąć ten post?"
  >
  </cms-table>
@endsection