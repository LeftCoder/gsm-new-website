<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postCounter = (new \App\Post)->postCounter();
        $shopCounter = (new \App\Shop)->shopCounter();
        $photoCounter = \App\Gallery::photoCounter();
        
        return view('admin.home', compact('postCounter', 'shopCounter', 'photoCounter'));
    }
}
