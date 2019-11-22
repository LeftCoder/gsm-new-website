@extends('layouts.admin')

@section('main-panel')
{{ Breadcrumbs::render('home') }}
<div class="cards-wrapper">
  <div class="card">
    <div class="card-header">
      <strong>Opublikowanych postów</strong>
    </div>
    <div class="card-body">
      <count :to="{{ $postCounter }}"></count>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <strong>Punktów na mapie</strong>
    </div>
    <div class="card-body">
      <count :to="{{ $shopCounter }}"></count>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <strong>Zdjęć w galerii</strong>
    </div>
    <div class="card-body">
      <count :to="{{ $photoCounter }}"></count>
    </div>
  </div>
</div>
@endsection
