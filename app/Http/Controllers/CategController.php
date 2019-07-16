<?php

namespace App\Http\Controllers;

class CategController extends Controller
{
    public function index()
    {
        $serviceList = \App\Category::all();

        return view('Categories/categ', compact('services'));
    }
}
