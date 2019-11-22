@extends('layouts.webpage')

@section('title', 'Aktualności - ')
@section('description', 'Tutaj znajdziesz informacje m.in. o tym gdzie i kiedy otworzył się nasz nowy punkt.')

@section('page-content')
<header>
  <div class="page-hero">
    @include('partials.websitenavbar')
    <div class="page-header container">
      <div class="left-side"><img src="{{asset('/images/newspaper-icon.svg')}}"></div>
      <div class="right-side"><h1>Tutaj pojawiają się najnowsze informacje.</h1></div>
    </div>
  </div>
</header>
<main>
  <div class="news-content container">
    <news></news>
  </div>
</main>
@endsection