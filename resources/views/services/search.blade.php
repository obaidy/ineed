@extends('layouts.ineed')
{{-- The list of available providers in a category --}}
@section('content')
    
    <div>{{ $serviceObject->name }}s</div>

    <div>
        @foreach($providers as $provider)
            <div>
                <a href="{{ action('DisplayProfileController@index', $provider->id) }}">
                <div>{{ $provider->name}}</div>
                <div>{{ $provider->description}}</div>
                <div>{{ $provider->wage}}</div>
                <div>{{ $provider->profile_image}}</div>
                </a>
            </div>
        @endforeach
    </div>


@endsection

