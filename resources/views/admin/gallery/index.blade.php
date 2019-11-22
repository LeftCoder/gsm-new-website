@extends('layouts.admin')

@section('main-panel')
{{ Breadcrumbs::render('gallery') }}

<div class="gallery-wrapper">
  <div class="cities">
  &compfn;
  @foreach ($stores as $store)
    <a href="#" v-scroll-to="'#{{ slugify($store) }}'">{{ $store }}</a>&compfn;
  @endforeach
  </div>
  
  @php $prev_city = '' @endphp
  @foreach ($shops as $shop)
  
    @if($shop->city_name !== $prev_city)
      <div id="{{ slugify($shop->city_name) }}" class="city-name"><h2>{{$shop->city_name}}</h2></div>
    @endif
  
    <a href="/gallery/{{ slugify($shop->shop_name) }}">  
      <div class="folder">
        <i class="fas fa-folder"></i>
        <span>{{ $shop->shop_name }}</span>
      </div>
    </a>
    @php $prev_city = $shop->city_name @endphp
  @endforeach
</div>
@endsection