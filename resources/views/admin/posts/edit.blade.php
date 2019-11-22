@extends('layouts.admin')

@section('main-panel')
{{ Breadcrumbs::render('edit_post', $post->title) }}

<div class="container post-edit">
  <form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PATCH')
    
    <div class="form-group">
      <input 
        name="title" 
        value="{{ $post->title }}" 
        type="text" 
        class="form-control @error('title') is-invalid @enderror" 
        autofocus
      >
      @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
      <wysiwyg name="body" value="{{ $post->body }}" class="@error('body') is-invalid @enderror"></wysiwyg>
      @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edytuj</button>
    <a href="/posts"><button type="button" class="btn btn-secondary">Anuluj</button></a>
  </form>
</div>
@endsection