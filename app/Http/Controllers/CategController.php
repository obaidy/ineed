<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategController extends Controller
{
    public function index(){
        return view('Categories/categ');
    }
}
