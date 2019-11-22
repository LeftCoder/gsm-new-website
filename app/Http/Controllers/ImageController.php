<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class ImageController extends Controller
{
    protected $mainFolder = "photos";
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $path = "/".$this->mainFolder."/".$request->folder;

      if(count($request->images)) {
        foreach ($request->images as $image) {
          $imageName = time().'.'.$image->getClientOriginalExtension();
          $image->move(public_path($path), $imageName);
        }
      };
      
      return response()->json(['message' => 'Done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        \File::delete(public_path()."/".$this->mainFolder."/".$request->folder. "/" . $request->image);

        return response(['message' => 'Image deleted']);
    }
}