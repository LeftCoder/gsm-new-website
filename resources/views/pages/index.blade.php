@extends('layouts.webpage')

@section('description', 'Zajmujemy się sprzedażą telefonów i akcesoriów oraz oferujemy usługi serwisowe. Świat GSM to ponad 10 lat doświadczenia w branży.')

@section('page-content')
<header>
  <div class="hero-wrapper">
    @include('partials.websitenavbar')
    <div class="home-header container">
      <div class="header-description">
        <h1>Zobacz&nbsp;jak<br>wyglądają nasze sklepy</h1>
        <a href="/galeria">
          <button type="button" class="btn btn-outline-light">wejdź</button>
        </a>
      </div>
      
      <carousel-3d :autoplay="true" :autoplay-timeout="4000">
        <slide :index="0">
          <img src="/images/slider/3.jpg" style="height: 100%">
        </slide>
        <slide :index="1">
          <img src="/images/slider/2.jpg" style="height: 100%">
        </slide>
        <slide :index="2">
          <img src="/images/slider/1.jpg" style="height: 100%">
        </slide>
      </carousel-3d>
    </div>
  </div>
</header>
  
<main>
  <section id="offer">
    <div class="offer-wrapper container">
      <div class="tile">
        <img class="tile-image" src="{{asset('/images/home-icon.svg')}}">
        <count :to="13"></count>
        <p>miast w Polsce</p>
      </div>
      <div class="tile">
        <img class="tile-image" src="{{asset('/images/map-pins-icon.svg')}}">
        <count :to="{{ $shopCounter }}"></count>
        <p>punktów sprzedaży</p>
      </div>
      <div class="tile">
        <img class="tile-image" src="{{asset('/images/cogwheels-icon.svg')}}">
      <count :to="{{ $partListCounter }}"></count>
        <p>usług serwisowych</p>
      </div>
    </div>
  </section>

  <section id="gallery">
    <div class="gallery-wrapper container">
      <div class="section-title">
        <h2>Galeria</h2>
      </div>
      
      <gallery-preview></gallery-preview>

      <div class="cta" data-aos="fade-up">
        <a href="/galeria">
          <button type="button" class="btn btn-outline-light">zobacz więcej</button>
        </a>
      </div>
    </div>
  </section>

  <section id="news">
    <div class="news-wrapper container">
      <div class="section-title">
        <h2>Aktualności</h2>
      </div>
      <div class="articles">
        @foreach ($twoLatestPosts as $post)
        <div class="single-article" data-aos="zoom-in">
          <span class="latest">{{ $post->created_at->diffForHumans() }}</span>
          <h3>{{ $post->title }}</h3>
          {!! @$post->body !!}
        </div>
        @endforeach
      </div>
      <div class="cta" data-aos="fade-up">
        <a href="aktualnosci">
          <button type="button" class="btn btn-outline-light">zobacz więcej</button>
        </a>
      </div>
    </div>
  </section>

  <section id="service">
    <div class="service-wrapper container">
      <div class="section-title">
        <h2>Serwis</h2>
      </div>
      <div class="service-content">
        <div class="service-image" data-aos="fade-right"></div>
        <div class="service-text" data-aos="fade-left">
          <h2>Trzy kroki do<br>naprawy smartfona</h2>
          <p><strong>1.</strong> Zlokalizuj ustrkę.</p>
          <p><strong>2.</strong> Sprawdź ile koszuję naprawa.</p>
          <p><strong>3.</strong> Skontaktuj się z naszym serwisem.</p>
        </div>
      </div>
      <div class="cta" data-aos="fade-up">
        <a href="serwis">
          <button type="button" class="btn btn-outline-light">zobacz więcej</button>
        </a>
      </div>
    </div>
  </section>
</main>
@endsection