<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($service) //slug
    {
        //get the category
        $serviceObject = \App\Category::where('slug', '=', $service)->first();
        //make service ID the id of the category
        $service_id = $serviceObject->id;
        //get an object of providers who have the service id 
        $providers = \App\User::where('role', 'provider')->where('category_id', $service_id)->get();
       // dd($serviceList[$serviceList->slug]);
       //get service from id that was passed into url
       //$service = \App\Category::find($service_id);
       //get slug of the service
       //$service = $service->slug;
       
       // $service = $serviceList[$service_id - 1];
        return view('services/search', compact('service', 'serviceObject', 'providers'));
    }
}
