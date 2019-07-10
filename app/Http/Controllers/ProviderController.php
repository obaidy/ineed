<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProviderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        //$form_view = view('form')
        return view('layouts.admin', compact('user'));
    }

    public function storeInfo(Request $request)
    {
        $id = \Auth::user()->id;
        $provider = \App\User::where('id', $id)->first();
        $provider->name = $request->name;
        $provider->description = $request->description;
        $provider->save();

    }
}
