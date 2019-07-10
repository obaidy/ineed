<?php

namespace App\Http\Controllers;

use App\Availability;
use Illuminate\Http\Request;

class ProviderInfo extends Controller
{
    public function index()
    {
        $days_of_week = ["Monday", "Tuesday", "Wednesday", "Thursday", 'Friday', "Saturday", "Sunday"];
        $times_of_day = ["Early Morning", "Late Morning", 'Early Afternoon', "Late Afternoon", "Early Evening", "Late Evening"];
        
        $user = \Auth::user();
        //plucks only days (and hours) available from availability of user, and puts in array
        $days_available = Availability::where('user_id', '=', $user->id)->pluck('day');
        
        $hours_available = Availability::where('user_id', '=', $user->id)->pluck('hour');
        
        //put into format of checkbox value
        $full_availability = [];
        foreach ($days_available as $key => $day_available) {
            $full_availability[] = $day_available . '-' . $hours_available[$key];
        }
       
        $categories = \App\Category::all();

        return view('form', compact('categories', 'user', 'full_availability', 'days_of_week', "times_of_day"));
    }

    public function store(Request $request)
    {
        //save availability
        $days_of_week = ["Monday", "Tuesday", "Wednesday", "Thursday", 'Friday', "Saturday", "Sunday"];
        $times_of_day = ["Early Morning", "Late Morning", 'Early Afternoon', "Late Afternoon", "Early Evening", "Late Evening"];

        $user = \Auth::user();
        $id = \Auth::user()->id;
        $provider = \App\User::where('id', $id)->first();
        
        // foreach($days_of_week as $day){
        //     foreach($times_of_day as $time){
        //         if(null !== $request->$day."-".$time){
        //             $avail = new Availability();
        //             $avail->day = $day;

        //             $avail->hour = $request->$day."-".$time;

        //             $avail->is_available = true;
        //             $avail->user_id = $id;
        //             $avail->save();
        //         }
        //     }
        // }
        //go through each checked box and save it to the database.
        foreach ($request->avail as $free) {
            //if availability is new, create new one.
            //if($free){
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

        $provider->name = $request->name;
        $provider->description = $request->description;
        $provider->category_id = $request->category;
        $provider->save();

        return redirect(action('HomeController@index'));

    }
}
