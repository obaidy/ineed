<?php

namespace App\Http\Controllers;

use App\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $days_of_week = ["Monday", "Tuesday", "Wednesday", "Thursday", 'Friday', "Saturday", "Sunday"];
        $times_of_day = ["Morning", 'Afternoon', "Evening", "All Day"];

        $user = \Auth::user();
        //plucks only days (and hours) available from availability of user, and puts in array
        $days_available = Availability::where('user_id', '=', $user->id)->pluck('day');

        $hours_available = Availability::where('user_id', '=', $user->id)->pluck('hour');

        //put into format of checkbox value
        $full_availability = [];
        foreach ($days_available as $key => $day_available) {
            $full_availability[] = $day_available . '-' . $hours_available[$key];
        }
        $new_requests = \App\Service_Request::where('provider_id', $user->id)->where('is_accepted', null)->get();
        $upcoming_requests = \App\Service_Request::where('provider_id', $user->id)->where('is_accepted', true)->get();
        $categories = \App\Category::all();
        //switched from view('form)
        return view('layouts.admin', compact('categories', 'user', 'full_availability', 'days_of_week', "times_of_day", "new_requests", 'upcoming_requests'));

        //return view('layouts.admin', compact('user'));
    }

    public function store(Request $request)
    {
        if ($request->has('category')) {
            $days_of_week = ["Monday", "Tuesday", "Wednesday", "Thursday", 'Friday', "Saturday", "Sunday"];
            $times_of_day = ["Morning", 'Afternoon', "Evening", "All Day"];

            $user = \Auth::user();
            $id = \Auth::user()->id;
            $provider = \App\User::where('id', $id)->first();

            $days_available = Availability::where('user_id', '=', $id)->pluck('day');
            $hours_available = Availability::where('user_id', '=', $id)->pluck('hour');

            //put into format of checkbox value
            $full_availability = [];
            foreach ($days_available as $key => $day_available) {
                $full_availability[] = $day_available . '-' . $hours_available[$key];
            }

            //delete times provider is no longer available.
            foreach ($full_availability as $old_avail) {
                //if availability is new, create new one.
                if (!in_array($old_avail, $request->avail)) {
                    //get old availability
                    //
                    $day_and_time = preg_match("#^([a-z]+)\-([a-z\s]+)$#i", $old_avail, $matches);
                    $old_day = $matches[1];
                    $old_hour = $matches[2];
                    $to_delete = Availability::where('day', $old_day)->where('hour', $old_hour)->where('user_id', $id)->delete();

                }
            }

            //save new availability
            foreach ($request->avail as $free) {
                //if availability is new, create new one.
                if (!in_array($free, $full_availability)) {
                    //use regex to take out day and time.
                    $new_time = new Availability();
                    //next time: figure out regular expression;
                    $day_and_time = preg_match("#^([a-z]+)\-([a-z\s]+)$#i", $free, $matches);
                    $new_time->day = $matches[1];
                    $new_time->hour = $matches[2];
                    $new_time->is_available = true;
                    $new_time->user_id = $id;
                    $new_time->save();
                }
            }
            //delete times provider is no longer available.

            $provider->description = $request->description;
            $provider->category_id = $request->category;
            $provider->save();

            return redirect(action('ProviderController@index'));
        }

        if ($request->has('is_accepted')) {
            $service_id = \App\Service_Request::where('id', $request->service_id)->first();
            if ($request->is_accepted === "Accept") {
                $service_id->is_accepted = true;

            } else {
                $service_id->is_accepted = false;
            }
            $service_id->save();
            return redirect(action('ProviderController@index'));
        }

        if ($request->has('is_done')) {
            $service_id = \App\Service_Request::where('id', $request->service_id)->first();
            
                $service_id->is_done = true;

            $service_id->save();
            
            return redirect(action('ProviderController@index'));
        }


    }
}
