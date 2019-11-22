<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stores = (new \App\Queries\ShopQueries)->getShopsArray();
      $shops = (new \App\Queries\ShopQueries)->getAllShops();
      
      return view('admin.gallery.index', compact('shops', 'stores'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($folder)
    {
        $gallery = new Gallery($folder);
        
        $fileNames = $gallery->getFilenames();

        if(request()->expectsJson()) {
            return response(['message'=> 'Images fetched', 'images' => $fileNames]);
        }

        return view('admin.gallery.show', compact('folder', 'fileNames'));
    }
}
