<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $serviceList = \App\ServiceList::all();
        return view('services/search');
    }
}
