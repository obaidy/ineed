<?php

namespace App\Http\Controllers;

use App\Review;
use App;
use App\User;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $service_requests = App\Service_Request::where('user_id', $user->id)->where('is_accepted', "1")->whereNull('is_done')->get();
        $service_denied = App\Service_Request::where('user_id', $user->id)->where('is_accepted', "0")->whereNull('is_done')->get();
        $service_finished = App\Service_Request::where('user_id', $user->id)->whereNotNull('is_done')->get();
        //dd($service_finished);
        return view('user_jobs', compact('service_requests', 'service_finished', 'service_denied'));
    }

    public function review(Request $request)
    {

        $user = \Auth::user();
        $provider = User::where('id', $request->provider_id)->first();
        
        $service = App\Service_Request::where('id', $request->service_id)->first();
        $review = new Review();
        $service->is_reviewed = true;
        $service->save();
        $review->rating = (int) $request->rating;
        $review->text = $request->text;
        $review->user_id = $user->id;
        $review->user_name = $user->name;
        $review->provider_name = $provider->name;
        $review->provider_id = $provider->id;
        $review->save();

        return redirect(action('UserRequestController@index'));
    }
}
