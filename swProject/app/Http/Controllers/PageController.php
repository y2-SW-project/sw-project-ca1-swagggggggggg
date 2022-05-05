<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //remove l8r
    public function welcome()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }    
}
