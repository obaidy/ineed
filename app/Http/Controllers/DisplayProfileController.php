<?php

namespace App\Http\Controllers;

use App\Service_Request;
use Illuminate\Http\Request;

class DisplayProfileController extends Controller
{
    public function index($provider_id)
    {
        $provider = \App\User::where('id', $provider_id)->first();
        $availability = \App\Availability::where('user_id', $provider_id)->get();

        return view('services/profile', compact('provider', "availability"));
    }

    public function store_request(Request $request, $provider_id)
    {
        $user_id = \Auth::user()->id;
        $user_name = \Auth::user()->name;
        $provider = \App\User::where('id', $provider_id)->first();
        $service_request = new Service_Request();
        $service_request->user_id = $user_id;
        $service_request->provider_id = $provider_id;
        $service_request->user_name = $user_name;
        $service_request->provider_name = $provider->name;
        $service_request->service_date = $request->service_date;
        $service_request->service_time = $request->service_time;
        $service_request->service_location = $request->service_location;
        $service_request->house_number = $request->house_number;
        $service_request->service_length = $request->service_length;
        $service_request->description = $request->description;
        $service_request->save();

        return redirect(action('HomeController@index'));
    }
}
