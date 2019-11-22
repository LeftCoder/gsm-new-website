@extends('layouts.webpage')

@section('title', 'Sprzedaj smartfona - ')
@section('description', 'U nas możesz sprzedać używane urządzenie. Zapytaj o wycenę swojego smartfona.')

@section('page-content')
<header>
  <div class="page-hero">
    @include('partials.websitenavbar')
    <div class="page-header container">
      <div class="left-side"><img src="{{asset('/images/smartphone-icon.svg')}}"></div>
      <div class="right-side"><h1>Zapytaj o wycenę swojego smartfona.</h1></div>
    </div>
  </div>
</header>
<main>
  <div class="trade-content container">
    <div class="trade-wrapper">
      <p>
        Każdy klient jest traktowany indywidualnie.<br>
        Nie mammy sztywno określonych cen.<br>
        U nasz możesz negocjować.
      </p>
    </div>
  </div>
</main>
@endsection