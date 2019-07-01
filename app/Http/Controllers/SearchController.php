<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($service_id)
    {
        
        $serviceList = \App\Category::all();
        $providers = \App\User::where('role', 'provider')->where('category_id', $service_id)->get();
        
        $service = $serviceList[$service_id - 1];
        return view('services/search', compact('service', 'providers'));
    }
}
