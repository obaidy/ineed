<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($service_id)
    {
        
        $serviceList = \App\Categorie::all();
        $service = $serviceList[$service_id];
        return view('services/search', compact('service'));
    }
}
