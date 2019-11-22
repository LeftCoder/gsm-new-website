@extends('layouts.admin')

@section('main-panel')
  {{ Breadcrumbs::render('album', $folder) }}

  <image-uploader folder="{{$folder}}"></image-uploader>

  <gallery 
    folder="{{$folder}}" 
    path="{{ asset('/photos/'.$folder) }}" 
    :images="{{json_encode($fileNames)}}">
  </gallery>
@endsection