@extends('layouts.ineed')
{{-- The list of available providers in a category --}}
@section('content')
    
    <div>{{ $serviceObject->name }}s</div>

    <div>
        @foreach($providers as $provider)
            <div>
                <a href="{{ action('DisplayProfileController@index', $provider->id) }}">
                <div>{{ $provider->name}}</div>
                <div>{{ $provider->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, fugit.</div>
                <div>{{ $provider->wage}}400/hr</div>
                <div>{{ $provider->profile_image}}</div>
                </a>
            </div>
        @endforeach
    </div>


@endsection

