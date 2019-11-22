@extends('layouts.admin')

@section('main-panel')
{{ Breadcrumbs::render('edit_shop', $shop->shop_name) }}

<div class="container shop-edit">
  <form action="/shops/{{$shop->id}}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
      <label for="shop_name">Nazwa Sklepu</label>
      <input 
      name="shop_name" 
      value="{{ $shop->shop_name }}" 
      type="text" 
      class="form-control @error('shop_name') is-invalid @enderror" 
      id="shop_name"
      >
      @error('shop_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="city_name">Miasto</label>
      <input 
        name="city_name" 
        value="{{ $shop->city_name }}" 
        type="text" 
        class="form-control @error('city_name') is-invalid @enderror" 
        id="city_name"
      >
      @error('city_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="postal_code">Kod pocztowy</label>
      <input 
        name="postal_code" 
        value="{{$shop->postal_code}}" 
        type="text" 
        class="form-control 
        @error('postal_code') is-invalid @enderror" 
        id="postal_code"
      >
      @error('postal_code')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="street">Ulica</label>
      <input name="street" value="{{$shop->street}}" type="text" class="form-control @error('street') is-invalid @enderror" id="street">
      @error('street')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="lat">Szerokość geograficzna</label>
      <input name="lat" value="{{$shop->lat}}" type="text" class="form-control @error('lat') is-invalid @enderror" id="lat">
      @error('lat')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="lng">Długość geograficzna</label>
      <input name="lng" value="{{$shop->lng}}" type="text" class="form-control @error('lng') is-invalid @enderror" id="lng">
      @error('lng')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="email">e-mail</label>
      <input name="email" value="{{$shop->email}}" type="text" class="form-control @error('email') is-invalid @enderror" id="email">
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="telephone">Numer telefonu</label>
      <input name="telephone" value="{{$shop->telephone}}" type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone">
      @error('telephone')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Edytuj</button>
    <a href="/shops"><button type="button" class="btn btn-secondary">Anuluj</button></a>
  </form>
</div>
@endsection