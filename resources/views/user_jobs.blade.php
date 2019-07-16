@extends('layouts.app')

@section('content')

<div class="upcoming">
    <h2>The following jobs have been accepted and are upcoming</h2>
    @foreach ($service_requests as $requests)
        <div class="job">
            <div class="provider">{{$requests->provider_name}}</div>
              @php
                  $unix_time = strtotime($requests->service_date.' '.$requests->service_time);
                  $formatted_date = date('D, j M', $unix_time);
                  $formatted_time = date("G:i", $unix_time);
              @endphp
            <div class="date">{{$formatted_date}}</div>
            <div class="time">{{$formatted_time}}</div>
            <div class="location">{{$requests->service_location}} {{$requests->house_number}}</div>
            <div class="description">{{$requests->description}}</div>
            <div class="email">{{$requests->provider_email}}</div>
            <div class="telephone">{{$requests->provider_phone}}</div>
        </div>
    @endforeach
</div>

<div class="denied">
        <h2>The following jobs have been denied</h2>
        @foreach ($service_denied as $denied)
            <div class="job">
                <div class="provider">{{$denied->provider_name}}</div>
                  @php
                      $unix_time = strtotime($denied->service_date.' '.$denied->service_time);
                      $formatted_date = date('D, j M', $unix_time);
                      $formatted_time = date("G:i", $unix_time);
                  @endphp
                <div class="date">{{$formatted_date}}</div>
                <div class="time">{{$formatted_time}}</div>
                <div class="location">{{$denied->service_location}} {{$denied->house_number}}</div>
                <div class="description">{{$denied->description}}</div>
            </div>
        @endforeach
    </div>


<div class="finished">
    <h2>The following jobs are completed.</h2>
    @foreach ($service_finished as $finished)
        <div class="job">
            <div class="provider">{{$finished->provider_name}}</div>
              @php
                  $unix_time = strtotime($finished->service_date.' '.$finished->service_time);
                  $formatted_date = date('D, j M', $unix_time);
                  $formatted_time = date("G:i", $unix_time);
              @endphp
            <div class="date">{{$formatted_date}}</div>
            <div class="time">{{$formatted_time}}</div>
            <div class="location">{{$finished->service_location}} {{$finished->house_number}}</div>
            <div class="description">{{$finished->description}}</div>
            <div class="email">{{$finished->provider_email}}</div>
            <div class="telephone">{{$finished->provider_phone}}</div>
            @if (!$finished->is_reviewed)
                <div class='review'>
                    <h3>You can now review this provider.</h3>
                    <form action="" method='post'>
                        @csrf
                        <input type="hidden" name="provider_id" value="{{$finished->provider_id}}">
                        <input type="hidden" name="service_id" value="{{$finished->id}}">
                        <label for="rating">Leave a rating between 1 and 5</label>
                        <input type="number" name="rating" id="rating">
                        <textarea name="text" id="" cols="30" rows="5">Leave a review</textarea>
                        <input type="submit" value="Review">
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>

@endsection