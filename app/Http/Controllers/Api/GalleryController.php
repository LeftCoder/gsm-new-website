<?php

namespace App\Http\Controllers\Api;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController
{
    public function index(Request $request)
    {    
      
      $gallery = new Gallery('main');
    
      return response()->json([
        'images' => $gallery->getFilesPath(),
        'overlays' => $gallery->getProperFileNames()
      ]);
    }

    public function city(Request $request)
    {
      $shops = (new \App\Queries\ShopQueries)->getShopsFor($request->city);
      
      return response()->json([
        'images' => $this->getImagesFor($shops), 
        'overlays' => $this->getOverlaysFor($shops)
      ]);
    }

    private function getImagesFor($shops) {
     
      $images = [];

      foreach ($shops as $shop) {
        $gallery = new Gallery(slugify($shop));       
        
        $images = array_merge($images, $gallery->getFilesPath());
      }
      
      return $images;
    }
    
    private function getOverlaysFor($shops) {

      $overlay = [];

      foreach ($shops as $shop) {
        $gallery = new Gallery(slugify($shop));
        $overlays = $this->makeOverlays($shop, $gallery);
        $overlay = array_merge($overlay, $overlays);
      }
    
      return $overlay;
    }
    
    private function makeOverlays($shop, $gallery) {
      $result = [];

      for($i =1; $i <= $gallery->countImages(); $i++){
        $result[] = $shop;
      }

      return $result;
    }
}