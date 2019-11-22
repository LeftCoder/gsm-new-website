@extends('layouts.webpage')

@section('title', 'Serwis - ')
@section('description', 'Serwis Centralny Świat GSM z siedzibą w Bydgoszczy. To tu naprawisz swój telefon.')

@section('page-content')
<header>
  <div class="page-hero">
    @include('partials.websitenavbar')
    <div class="page-header container">
      <div class="left-side"><img src="{{asset('/images/cogwheels-icon.svg')}}"></div>
      <div class="right-side"><h1>Znajdź usługę serwisową dla swojego urządzenia.</h1></div>
    </div>
  </div>
</header>
<main>
  <div class="service-content container">
    <parts></parts>
  </div>
</main>
@endsection