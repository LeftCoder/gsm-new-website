@extends('layouts.admin')

@section('main-panel')
{{ Breadcrumbs::render('add_shop') }}

<div class="container shop-create">
  <form action="/shops" method="POST">
    @csrf
    <div class="form-group">
      <label for="shop_name">Nazwa Sklepu</label>
    <input value="{{ old('shop_name') }}" name="shop_name" type="text" class="form-control @error('shop_name') is-invalid @enderror" id="shop_name">
      @error('shop_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="city_name">Miasto</label>
      <input value="{{ old('city_name') }}" name="city_name" type="text" class="form-control @error('city_name') is-invalid @enderror" id="city_name">
      @error('city_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="postal_code">Kod pocztowy</label>
      <input value="{{ old('postal_code') }}" name="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code">
      @error('postal_code')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="street">Ulica</label>
      <input value="{{ old('street') }}" name="street" type="text" class="form-control @error('street') is-invalid @enderror" id="street">
      @error('street')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="lat">Szerokość geograficzna</label>
      <input value="{{ old('lat') }}" name="lat" type="text" class="form-control @error('lat') is-invalid @enderror" id="lat">
      @error('lat')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="lng">Długość geograficzna</label>
      <input value="{{ old('lng') }}" name="lng" type="text" class="form-control @error('lng') is-invalid @enderror" id="lng">
      @error('lng')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="email">e-mail</label>
      <input value="{{ old('email') }}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email">
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="telephone">Numer telefonu</label>
      <input value="{{ old('telephone') }}" name="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone">
      @error('telephone')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Dodaj</button>
    <a href="/shops"><button type="button" class="btn btn-secondary">Anuluj</button></a>
  </form>
</div>
@endsection