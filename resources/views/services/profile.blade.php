@extends('layouts.app')

@section('content')
    <div>{{ $provider->name }}</div>
    <div>{{ $provider->category_id }}</div>
    <div>{{ $provider->description }}</div>

    @foreach($availability as $time)
        <div>{{$time->day}}</div>
        <div>{{$time->hour}}</div>

    @endforeach

    {{-- request --}}
    <div>Request this provider at one of his available times.</div>
    <form action="" method='post'>
        @csrf
        <span>Date: </span>
        <input type="date" name="service_date" value="">
        <span>Time: </span>
        <input type="time" name="service_time" value="">
        <span>Location: </span>
        <input type="text" name="service_location" value="Street">
        <input type="text" name="house_number" value="House Number">
        <span>Estimated Length: </span>
        <input type="text" name="service_length" value="">
        <label for="description">Description of your needs: </label>
        <textarea name="description" id="description" cols="30" rows="5"></textarea>
        <input type="submit" name="submit" value="Request!">



    </form>
@endsection
