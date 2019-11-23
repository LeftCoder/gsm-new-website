<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index() {
    $twoLatestPosts = (new \App\Queries\PostQueries)->getLatest(2);
    $shopCounter = (new \App\Shop)->shopCounter();
    $partListCounter = (new \App\Part)->partListCounter();
    $citiesCounter = (new \App\Queries\ShopQueries)->getCitiesCounter();

    return 
          view('pages.index', 
          compact('shopCounter', 'partListCounter', 'twoLatestPosts', 'citiesCounter'));
  }

  public function news() {
    return view('pages.news');
  }

  public function shops() {
    return view('pages.shops');
  }

  public function trade() {
    return view('pages.trade');
  }

  public function gallery() {
    $stores = (new \App\Queries\ShopQueries)->getShopsArray();
    $shops = (new \App\Queries\ShopQueries)->getAllShops();
    
    return view('pages.gallery', compact('stores', 'shops'));
  }

  public function service() {
    return view('pages.service');
  }

  public function career() {
    return view('pages.career');
  }

  public function contact() {
    return view('pages.contact');
  }
}

