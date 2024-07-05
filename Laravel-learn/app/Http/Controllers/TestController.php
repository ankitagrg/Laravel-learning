<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller

{
    public function index()
    {
        return view('about'); 
    }
    public function info()
    {
        return view('welcome'); 
    }
    public function information()
    {
        return view('gces'); 
    }
    
    //
}

    

