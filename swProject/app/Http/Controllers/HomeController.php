<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// for role verification
use Auth;

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
        $home= 'home';
        $user= Auth::user();

        if($user->hasRole('admin')){
            $home= 'admin.home';
        }
        else if($user->hasRole('user')){
            $home= 'user.home';
        }
        return redirect()->route($home);
        // return view('home');
    }
}
