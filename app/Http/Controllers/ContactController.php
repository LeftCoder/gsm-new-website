<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMade;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function make(Request $request)
    {
        Mail::to('k.d.graczyk@gmail.com')
            ->send(new ContactMade($this->validateEmail()));
    
        return response(['status' => 'mail sent']);
    }

    public function validateEmail() {
        return request()->validate([
          'name' => 'required',
          'email' => 'required|email',
          'body' => 'required'
        ]);
    }
}