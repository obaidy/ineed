@extends('layouts.app')
{{-- The list of available providers in a category --}}
@section('content')
    
    <div>{{ $serviceObject->name }}s</div>

    @foreach($providers as $provider)
    {{var_dump($provider->id) }}
        <a href="{{ action('DisplayProfileController@index', $provider->id) }}">{{ $provider->name}}</div>

    @endforeach


@endsection

