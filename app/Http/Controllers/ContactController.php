<?php

namespace App\Http\Controllers;
use auth;
class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function contact(){
        return view('contact.contact-index');
    }

}
