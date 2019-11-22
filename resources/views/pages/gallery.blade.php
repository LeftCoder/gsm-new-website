@extends('layouts.webpage')

@section('title', 'Galeria - ')
@section('description', 'Zobacz na zdjęciach jak prezentują się nasze wyspy i salony sprzedażowe.')

@section('page-content')
<header>
  <div class="page-hero">
    @include('partials.websitenavbar')
    <div class="page-header container">
      <div class="left-side"><img src="{{asset('/images/gallery-icon.svg')}}"></div>
      <div class="right-side"><h1>Zobacz wszystkie zdjęcia w galerii.</h1></div>
    </div>
  </div>
</header>
<main>
  <div class="gallery-content container">
    <div class="gallery-cities">
      @foreach ($stores as $store)
        <a href="#" v-scroll-to="'#{{ slugify($store) }}'">{{ $store }}</a>
      @endforeach
    </div>

    @foreach ($stores as $store)
    <div class="single-gallery">
      <h3 id="{{ slugify($store) }}">
        {{$store}}
      </h3>
      <gallery-preview city="{{$store}}"></gallery-preview>
    </div>
    @endforeach
  </div>
</main>
<back-to-top bottom="50px" right="50px">
  <button type="button" class="btn btn-secondary btn-to-top"><i class="fa fa-chevron-up"></i></button>
</back-to-top>
@endsection