@extends('layouts.admin')

@section('main-panel')
{{ Breadcrumbs::render('add_post') }}

<div class="container post-create">
  <form action="/posts" method="POST">
    @csrf
    <div class="form-group">
      <label for="title">Tytuł</label>
      <input 
        value="{{ old('title') }}" 
        name="title" type="text" 
        class="form-control @error('title') is-invalid @enderror" 
        id="title"
        autofocus
      >
      @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
      <wysiwyg name="body" class="@error('body') is-invalid @enderror"></wysiwyg>
      @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Stwórz</button>
    <a href="/posts"><button type="button" class="btn btn-secondary">Anuluj</button></a>
  </form>
</div>
@endsection