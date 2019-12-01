@extends('layouts.webpage')

@section('title', 'Nasze sklepy - ')
@section('description', 'Mamy swoje punkty między innymi w takich miastach jak Bydgoszcz, Toruń, Poznań, Gdańsk. Znajdź swój sklep.')

@section('page-content')
<header>
  <div class="page-hero">
    @include('partials.websitenavbar')
    <div class="page-header container">
      <div class="left-side"><img src="{{asset('/images/map-pins-icon.svg')}}"></div>
      <div class="right-side"><h1>Zanjdź sklep w Twojej okolicy.</h1></div>
    </div>
  </div>
</header>
<main>
  <div class="shops-content container">
    <my-google-map></my-google-map>
  </div>
</main>
@endsection