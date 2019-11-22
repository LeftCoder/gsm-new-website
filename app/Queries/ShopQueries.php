<?php
namespace App\Queries;

use \App\Shop;

class ShopQueries {
  
  public function getShopsArray() {
    return array_unique(Shop::select('city_name')
      ->where('published', '=', 1)
      ->orderBy('city_name', 'ASC')
      ->pluck('city_name')
      ->toArray());
  }

  public function getAllShops() {
    return Shop::selectRaw('shop_name, city_name')
      ->where('published', '=', 1)
      ->orderBy('city_name', 'ASC')
      ->get();
  }

  public function getShopsFor($city) {
    return Shop::selectRaw('shop_name')->where('city_name', '=', $city)
      ->where('published', '=', 1)
      ->orderBy('shop_name', 'ASC')
      ->pluck('shop_name')
      ->toArray();
  }
}