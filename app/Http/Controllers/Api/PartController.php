<?php

namespace App\Http\Controllers\Api;

use App\Part;
use Illuminate\Http\Request;

class PartController
{
    public function allParts(Request $request) {

        return Part::search($request->filter, null, true)->get();
        
    }
}