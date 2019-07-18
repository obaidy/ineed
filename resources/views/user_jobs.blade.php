@extends('layouts.ineed')

@section('content')

<div class="upcoming container mt-5">
    <h2 class='text-white bg-dark  p-2 rounded mb-3 text-center mt-5'>The following jobs have been accepted and are upcoming</h2>
    @foreach ($service_requests as $requests)
        <div class="row font-weight-bold job">
            <div class="col provider">{{$requests->provider_name}}</div>
              @php
                  $unix_time = strtotime($requests->service_date.' '.$requests->service_time);
                  $formatted_date = date('D, j M', $unix_time);
                  $formatted_time = date("G:i", $unix_time);
              @endphp
            <div class="col date">{{$formatted_date}}</div>
            <div class="col time">{{$formatted_time}}</div>
            <div class="col location">{{$requests->service_location}} {{$requests->house_number}}</div>
            <div class="col description">{{$requests->description}}</div>
            <div class="col email">{{$requests->provider_email}}</div>
        </div>
    @endforeach
</div>

<div class="denied container mt-5">
        <h2 class='text-white bg-dark  p-2 rounded mb-3 text-center'>The following jobs have been denied</h2>
        @foreach ($service_denied as $denied)
            <div class="row font-weight-bold job">
                <div class="col provider">{{$denied->provider_name}}</div>
                  @php
                      $unix_time = strtotime($denied->service_date.' '.$denied->service_time);
                      $formatted_date = date('D, j M', $unix_time);
                      $formatted_time = date("G:i", $unix_time);
                  @endphp
                <div class="col date">{{$formatted_date}}</div>
                <div class="col time">{{$formatted_time}}</div>
                <div class="col location">{{$denied->service_location}} {{$denied->house_number}}</div>
                <div class="col description">{{$denied->description}}</div>
            </div>
        @endforeach
    </div>


<div class="finished container mt-5">
    <h2 class='text-white bg-dark  p-2 rounded mb-3 text-center'>The following jobs are completed.</h2>
    @foreach ($service_finished as $finished)
        <div class="job row bg-white rounded m-3 font-weight-bold">
            <div class="col provider">{{$finished->provider_name}}</div>
              @php
                  $unix_time = strtotime($finished->service_date.' '.$finished->service_time);
                  $formatted_date = date('D, j M', $unix_time);
                  $formatted_time = date("G:i", $unix_time);
              @endphp
            <div class="col date">{{$formatted_date}}</div>
            <div class="col time">{{$formatted_time}}</div>
            <div class="col location">{{$finished->service_location}} {{$finished->house_number}}</div>
            <div class="col description">{{$finished->description}}</div>
            <div class="col email">{{$finished->provider_email}}</div>
            <div class="col telephone">{{$finished->provider_phone}}</div>
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