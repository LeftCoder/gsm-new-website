@extends('app')

@section('content')
  @include('partials.navbar')
  
  <div class="container-fluid admin-backend">
    <div class="side-panel">
      @include('partials.adminmenu')
    </div> 

    <div class="main-panel">
      @yield('main-panel')
    </div>
  </div>

  <back-to-top bottom="50px" right="50px">
    <button type="button" class="btn btn-secondary btn-to-top"><i class="fa fa-chevron-up"></i></button>
  </back-to-top>

  <flash message="{{ session('flash') }}"></flash>
@endsection