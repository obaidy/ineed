@extends('layouts.ineed')
{{-- The list of available providers in a category --}}
@section('content')
<head>
    <style>
        .service {
            text-align: center;
            width: 200px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            font-size: 35px;
            background-color: white;
            border-radius: 20px;
            
        }
        .container {
            display: flex;
            flex-direction: column;
            background-color: rgba(255, 255, 255, 0.805);
            margin-top: 25px;
            margin-bottom: 50px;
            margin-left: auto;
            margin-right: auto;
            width: 60%;
            font-size: 20px;
            height: 100px;
            border-radius: 10px;
            text-decoration: none;
        }
        .container>a{
            text-decoration: none;
        }
    </style>
</head>
    
    <div class="service">{{ $serviceObject->name }}s</div>

    <div>
        @foreach($providers as $provider)
            <div class="container">
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

