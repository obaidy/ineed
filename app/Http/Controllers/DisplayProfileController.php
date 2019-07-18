<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Category;
use App\Service_Request;
use Illuminate\Http\Request;

class DisplayProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($provider_id)
    {
        $provider = \App\User::where('id', $provider_id)->first();
        //$availability = \App\Availability::where('user_id', $provider_id)->get();
        $reviews = \App\Review::where('provider_id', $provider->id)->get();
        $categ_id = $provider->category_id;
        $categ = \App\Category::where('id', $provider->category_id)->first();
        $days_available = Availability::where('user_id', '=', $provider->id)->pluck('day');
        $hours_available = Availability::where('user_id', '=', $provider->id)->pluck('hour');
        $days_of_week = ["Monday", "Tuesday", "Wednesday", "Thursday", 'Friday', "Saturday", "Sunday"];
        $times_of_day = ["Morning", 'Afternoon', "Evening", "All Day"];

        //put into format of checkbox value
        $full_availability = [];
        foreach ($days_available as $key => $day_available) {
            $full_availability[] = $day_available . '-' . $hours_available[$key];
        }

        return view('services/profile', compact('provider', 'categ', 'days_of_week', 'times_of_day', "full_availability", 'reviews'));
    }

    public function store_request(Request $request, $provider_id)
    {
        //request service
        $user = \Auth::user();
        $user_name = \Auth::user()->name;
        $provider = \App\User::where('id', $provider_id)->first();
        $service_request = new Service_Request();
        $service_request->user_id = $user->id;
        $service_request->provider_id = $provider_id;
        $service_request->user_name = $user_name;
        $service_request->provider_name = $provider->name;
        $service_request->service_date = $request->service_date;
        $service_request->service_time = $request->service_time;
        $service_request->service_location = $request->service_location;
        $service_request->house_number = $request->house_number;
        $service_request->service_length = $request->service_length;
        $service_request->description = $request->description;
        $service_request->user_email = $user->email;
        $service_request->provider_email = $provider->email;
        $service_request->user_phone = $user->telephone_number;
        $service_request->provider_phone = $provider->telephone_number;

        $service_request->save();

        return redirect(action('DisplayProfileController@index', $provider_id));
    }

}
