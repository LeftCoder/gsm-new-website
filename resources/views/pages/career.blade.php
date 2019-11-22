@extends('layouts.webpage')

@section('title', 'Kariera - ')
@section('description', 'Zacznij pracę w naszej firmie już dziś. Znajdź ofertę dla siebie.')

@section('page-content')
<header>
  <div class="page-hero">
    @include('partials.websitenavbar')
    <div class="page-header container">
      <div class="left-side"><img src="{{asset('/images/user-icon.svg')}}"></div>
      <div class="right-side"><h1>Dołącz do naszego zespołu.</h1></div>
    </div>
  </div>
</header>
<main>
  <div class="career-content container">
    <div class="career-wrapper">
      <p>
        w tej chwili nie mamy dla Ciebie oferty pracy
      </p>
    </div>
  </div>
</main>
@endsection