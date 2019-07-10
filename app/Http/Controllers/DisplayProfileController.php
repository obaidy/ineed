<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayProfileController extends Controller
{
    public function index($provider_id)
    {
        $provider = \App\User::where('id', $provider_id)->first();
        return view('services/profile', compact('provider'));
    }
}
