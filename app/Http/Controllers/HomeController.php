<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //we commented this out to create a link to the dashboard from the provider section:
        
        // if(Auth::user()->role == 'provider'){
        //     return redirect(action('ProviderController@index'));
        // }

        
        $serviceList = \App\Category::all();
        $services = view('service_list', compact('serviceList'));


        return view('home', compact('services'));
    }
    
}
